@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<section class="pt-16 bg-blueGray-50">
<div class="w-full lg:w-4/12 px-4 mx-auto">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
    <div class="px-6">
      <div class="flex flex-wrap justify-center">
        <div class="w-full px-4 flex justify-center">
          <div class="relative">
            <img  src="{{ asset('storage/'.$viewData["profile"]->image) }}"  width="160" height="150"  class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
          </div>
        </div>
        <div class="w-full px-4 text-center mt-20">
          <div class="flex justify-center py-4 lg:pt-4 pt-8">
            <div class="mr-4 p-3 text-center">
              <a href="{{ route('wishlist.index') }}">
              <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                <i class="fa fa-heart"></i>
              </span>
              <span class="text-sm text-blueGray-400">Favoris</span>
             </a>
            </div>
            <div class="mr-5 p-4 text-center">
              <a  href="{{ route('cart.index') }}">
              <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                <img src="{{ asset('/img/shopping-cart.png') }}" alt="">
              </span>
              <span class="text-sm text-blueGray-400">Cart</span>
              </a>
            </div>
          
          </div>
        </div>
      </div>
      <div class="text-center mt-12">
        <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
          {{ $viewData["profile"]->name}}
        </h3>
        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
          <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
          {{ $viewData["profile"]->address}} 
        </div>
        <div class="mb-2 text-blueGray-600 mt-10">
          {{ $viewData["profile"]->email}}
        </div>
        <div class="mb-2 text-blueGray-600">
          {{ $viewData["profile"]->phone}}
        </div>
      </div>
      <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
        <div class="flex flex-wrap justify-center">
          <div class="w-full lg:w-9/12 px-4">
            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
            
            </p>
            <a href="{{ route('profile.index') }}" class="font-normal text-pink-500">
              Edit
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
@endsection
