@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

@if(session('status'))
<script>
  smal('{{session('status')}}')
</script>
@endif
  
@if(session()->has('message'))
  <div class="alert alert-success">
    {{session('message') }}
  </div>
@endif
<section class="overflow-hidden bg-white py-8 font-poppins dark:bg-gray-800 sticky-section ">
    <div class="max-w-4xl px-2 py-2 mx-auto lg:py-0 md:px-3 product_data product_cart">
        <div class="flex flex-wrap -mx-4 ">
            <div class="w-full px-4 md:w-1/2 ">
                <div class="sticky top-0 z-40 overflow-hidden">
                    <div class="relative mb-1 lg:mb-2 lg:h-85">
                        <img id="largeImage" src="{{ asset($viewData['product']->productImages[0]->image) }}" alt="" class="object-cover lg:w-full h-full">
                    </div>
                    <div class="flex-wrap hidden md:flex">
                        @foreach($viewData['product']->productImages as $image)
                            @if(!$loop->first)
                                <div class="image w-1/2 p-2 sm:w-1/4">
                                    <a href="#" onclick="changeImage('{{ asset($image->image) }}')"
                                        class="block border border-blue-300 dark:border-transparent dark:hover:border-blue-300 hover:border-blue-300">
                                        <img src="{{ asset($image->image) }}" alt="" class="object-cover w-full lg:h-40">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                
                <script>
                    function changeImage(newSrc) {
                        document.getElementById('largeImage').src = newSrc;
                    }
                </script>
                
            </div>
            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <div class="mb-8 ">
                        <span class="text-lg font-medium text-rose-500 dark:text-rose-200"></span>
                        <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                            {{ $viewData["product"]["name"] }} </h2>
                        
                        <p class="max-w-md mb-8 text-gray-700 dark:text-gray-400">
                            {{ $viewData["product"]->getDescription() }}
                        </p>
                        <p class="inline-block mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400 ">
                            <span>${{ $viewData["product"]->getPrice() }}</span>
                            <span
                                class="text-base font-normal text-gray-500 line-through dark:text-gray-400">${{  $viewData["product"]->getSale() }}</span>
                        </p>
                   </div>
  <input type="hidden" value="{{$viewData['product']->getId()}}" class="product_id">           
  <form method="POST" action="{{route('cart.add', ['id'=> $viewData['product']->getId()])}}">
        @csrf
                   
        <div class="mb-8">
            <label for="size" class="block text-xl font-semibold text-gray-700 dark:text-gray-400">Size</label>
            <select name="size" id="size" class="w-full p-2 border border-gray-300 rounded-md dark:border-gray-700 dark:text-gray-400 focus:outline-none focus:border-blue-500">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select> 
          </div>
                    <div class="quantity w-32 mb-8">
                        <label for="" class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">Quantity</label>
                        <div class="relative flex flex-row w-full  mt-4 bg-transparent rounded-lg">
                            <button type="button"
                                class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400"
                                onclick="decrementQuantity()">
                                <span class="m-auto text-2xl font-thin">-</span>
                            </button>
                            <input type="number" id="quantityInput" name="quantity" value="1" min="1"
                                class="flex quantity-input items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black"
                                >
                            <button type="button" 
                                class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400"
                                onclick="incrementQuantity()">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                    </div>
                    
                    <script>
                        function incrementQuantity() {
                            var quantityInput = document.getElementById('quantityInput');
                            if (quantityInput) {
                                var currentValue = parseInt(quantityInput.value);
                                if (!isNaN(currentValue)) {
                                    quantityInput.value = currentValue + 1;
                                } else {
                                    quantityInput.value = 1;
                                }
                            }
                        }
                    
                        function decrementQuantity() {
                            var quantityInput = document.getElementById('quantityInput');
                            if (quantityInput) {
                                var currentValue = parseInt(quantityInput.value);
                                if (!isNaN(currentValue) && currentValue > 1) {
                                    quantityInput.value = currentValue - 1;
                                } else {
                                    quantityInput.value = 1;
                                }
                            }
                        }
                    </script>
                    
                    
                    <div class="flex flex-wrap items-center -mx-4 ">
                        <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                @if (Auth::check()) <!-- Check if the user is logged in -->
                <button type="submit" class="flex items-center justify-center w-full p-2 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-cyan-300 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300">
                    Add to Cart
                </button>
            @else
                <a href="{{ route('login') }}" class="flex addcartlist items-center justify-center w-full p-2 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-cyan-300 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300">
                    Log in to Add to Cart
                </a>
            @endif
                        </div>
                        <div class="w-full px-4 mb-4 lg:mb-0 lg:w-1/2">
                            <button type="button"
                                class="btn btn-sucess me-3 addToWishlist float-start flex items-center justify-center w-full p-2 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300">
                                Add to wishlist
                            </button>
                        </div>
                       
                        
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                         <script>
                            $(document).ready(function() {
                          $('.addToWishlist').click(function(e) {
                        e.preventDefault();
                        var product_id = $(this).closest('.product_data').find('.product_id').val();
                         
                      
                        $.ajax({
                          methode: "POST",
                          url: "/addwishlist",
                          data:{
                            'product_id':product_id,
                          },
                          success:function(response){
                            swal(response.status);
                          }
                        })
                      });
                      });
                          
               
                          </script>
                    </div>

        </form>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .sticky-section {
        position: relative;
        top: -80px;
    }
    
    .addcartlist {
        width: 170px;
    }

    @media (max-width: 420px) {
       
.quantity{
    width: 80px;
}

        
    }
</style>

@endsection
