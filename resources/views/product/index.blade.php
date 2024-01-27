@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="flex all">

 <aside id="cta-button-sidebar" class="top-0 left-0 z-40 w-64  sm:translate-x-0" aria-label="Sidebar">
    <div class="rounded-lg px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
       <ul class="space-y-2 font-medium items-center justify-center">
          <li>
             <p  class="flex items-center justify-center p-2 border bg-yellow-400 text-gray-900 rounded-lg  group">
            
                <span class="ms-3 ">Category</span>
             </p>
          </li>
          @foreach($viewData['categories'] as $category)
          <li>
             <a href="{{ route('product.category', $category->id) }}" class="flex items-center ml-3 p-2  text-gray-900 rounded-lg dark:text-white hover:bg-pink-100 dark:hover:bg-gray-700 group">
                
                <span class="flex-1 ms-3 whitespace-nowrap"> {{ $category->name }}</span>
            </a>
          </li>
          @endforeach

       
       
       </ul>
       <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
        <div class="flex items-center mb-3">
           
                <div class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                    <img src="{{ asset('/img/shope.png') }}" class="rounded-lg" alt="">
                </div>
          
        </div>
    </div>
    
    
    
    
    
 

   
 </aside>
 <script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>
<style>
    .product{
        top: -90px; 
    }
</style>


<main class="flex-1">
<div class="flex-col relative items-center justify-center text-gray-800 text-center product">
          <!-- component -->
          <style>
            .search-container {
                max-width: 400px; 
                margin: 0 auto; 
            }
        
            .search {
                width: calc(100% - 40px);
                max-width: 100%; 
            }
            .search-icon {
            margin-left: -40px; /* للتحكم في التباعد بين حقل الإدخال والرمز */
        }
        </style>
    <form action="{{ url('search')}}" method="GET" role="search">
    <div class="search-container">
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
          <input
            type="search"
            name="search"
            class="relative search m-0 block min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="button-addon2" />
    
            <span
            class="search-icon input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
            id="basic-addon2">
            <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="h-5 w-5">
                <path 
                    fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        </span>
        </div>
      </div>
    </form>
<!-- component --> 
<div class="ml-5 flex flex-wrap justify-center space-x-1 product">
    
        @foreach ($viewData["products"] as $product)
  <div class="w-full max-w-sm bg-white border border-gray-200 w-60 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:text-white scale-90">
    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}">
        @if ($product->productImage->count() > 0)
        <img class="p-5 rounded-t-lg  h-70" src="/{{ $product->productImage->image }}" alt="product image" />
        @endif
    
    </a>
    <div class="px-2 pb-2 ">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
              {{ $product->getName() }}</h5>
        </a>
      
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ $product->getPrice() }}</span>
            <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-6 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                view</a>
        </div>
    </div>
</div>
 
@endforeach
    </div>
</div>

</main>
 </div>
 <style>
  
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