@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="flex all">
 <aside id="cta-button-sidebar" class="top-0 left-0 z-40 w-64  sm:translate-x-0" aria-label="Sidebar">
    <div class="rounded-lg px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
       <ul class="space-y-2 font-medium items-center justify-center">
          <li>
             <p  class="flex text-xl p-2 text-gray-900   group">
            
                <span class="ms-3 ">Category</span>
             </p>
          </li>
          @foreach($viewData['types'] as $type)
          <li>
             <a href="{{ route('product.typewomen', $type->id) }}" class="flex items-center ml-3 p-2  text-gray-900 dark:text-white dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap"> {{ $type->getName() }}</span>
            </a>
          </li>
          @endforeach

       
       
       </ul>
       
   
    
    
    
    
    
 

   
 </aside>
 <script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>
<style>
    .product{
        top: -10px; 
    }
</style>


<main class="flex-1">
<div class="flex-col relative items-center justify-center text-gray-800 text-center product">
      
<div class="ml-5 flex flex-wrap justify-center space-x-2 product">
    
        @foreach ($viewData["products"] as $product)
        @if ($product->category->name === 'women')

        <div class="w-full max-w-sm bg-white mt-10 border border-gray-200 w-60 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:text-white mt-1 ">
          @if ($product->productImage->count() > 0)
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}">
         <img class="p-5 rounded-t-lg  h-60" src="/{{ $product->productImage->image }}" alt="product image" />
        </a>
         @endif
      
      <div class="px-2 pb-2 ">
          <a href="#">
              <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->getName() }}</h5>
          </a>
          <div class="flex items-center mt-2.5 mb-5">
            
         </div>
          <div class="flex items-center justify-between">
              <span class="text-3xl font-bold text-gray-900 dark:text-white">
                ${{ $product->getPrice() }}</span>
              <span class="text-base font-normal text-red-500 line-through dark:text-gray-400">
                ${{ $product->getSale() }}</span>
          </div>
      </div>
  </div>
@endif
@endforeach
    </div>
</div>

</main>
 </div>
 <style>
  .search{
    width: 60%;
  }
    @media (max-width: 720px) {
      .all {
        flex-direction: column;
      }
      
      .product{
        top: -10%;
      }
     
  
      .left-0 {
        left: 0;
      }
  
      .w-64 {
        width: 100%;
      }
  
      .h-screen {
        height: auto;
      }
  
      .transition-transform {
        transition: none;
      }
  
      .sm\:translate-x-0 {
        transform: none;
      }
  
      .product {
        top: 0;
      }
  
      .ml-4 {
        margin-left: 0;
      }
  
      .w-[90%] {
        width: 100%;
      }
  
    }
  </style>

@endsection