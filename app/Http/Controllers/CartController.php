<?php
namespace App\Http\Controllers;
use session;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartController extends Controller
{
public function index(Request $request)
{
$total = 0;
$productsInCart = [];
$productsInSession = $request->session()->get("products");
if ($productsInSession) {
$productsInCart = Product::findMany(array_keys($productsInSession));
$total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
}
$viewData = [];
$viewData["title"] = "Cart - Online Store";
$viewData["subtitle"] = "Shopping Cart";
$viewData["total"] = $total;
$viewData["products"] = $productsInCart;
return view('cart.index')->with("viewData", $viewData);
}


// add to cart
public function add(Request $request, $id)
{
    $products = $request->session()->get("products");

    $products[$id] = [
        'quantity' => $request->input('quantity'),
        'size' => $request->input('size'),
    ];

    $request->session()->put('products', $products);

    return redirect()->route('cart.index');
}



public function delete(Request $request)
{
$request->session()->forget('products');
return back();
}

public function deleteCartItem(Request $request, $product_id)
{
    $cart = $request->session()->get('products', []);

    // Check if the product_id exists in the cart
    if (isset($cart[$product_id])) {
        // Remove the specific product from the cart
        unset($cart[$product_id]);

        // Update the session with the modified cart
        $request->session()->put('products', $cart);

        return back()->with('success', 'Item deleted successfully');
    } else {
        return back()->with('error', 'Item not found in the cart');
    }
}





public function purchase(Request $request)
{
    $productsInSession = $request->session()->get("products");

    if ($productsInSession) {
        $userId = Auth::user()->getId();
        $order = new Order();
        $order->setUserId($userId);
        $order->setTotal(0);
        $order->save();
        $total = 0;

        $productsInCart = Product::findMany(array_keys($productsInSession));

        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()]['quantity']; // Retrieve quantity
            $size = $productsInSession[$product->getId()]['size']; // Retrieve size

            $item = new Item();
            $item->setQuantity($quantity);
            $item->setPrice($product->getPrice());
            $item->setSize($size); // Set size
            $item->setProductId($product->getId());
            $item->setOrderId($order->getId());
            $item->save();

            $total = $total + ($product->getPrice() * $quantity);
        }

        $order->setTotal($total);
        $order->save();

        $newBalance = Auth::user()->getBalance() - $total;
        Auth::user()->setBalance($newBalance);
        Auth::user()->save();

        $request->session()->forget('products');

        $viewData = [];
        $viewData["title"] = "Purchase - OnlineStore";
        $viewData["subtitle"] = "Purchase Status";
        $viewData["order"] = $order;

        return view('cart.purchase')->with("viewData", $viewData);
    } else {
        return redirect()->route('cart.index');
    }
}

}