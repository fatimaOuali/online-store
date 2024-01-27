@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
le>
<div class="flex items-center justify-center mb-20 purchase">
    <div class="flex-col space-y-4 text-center">
        <div class="text-fuchsia-600 text-xl font-medium">Thanks!</div>
        <div class="text-5xl font-medium">Purchase completed</div>
        <div class="text-gray-500">Congratulations, purchase completed. Order number is </div>
        <div class="flex items-center justify-center">
           <a href="{{ route('myaccount.orders') }}" > <div class="bg-fuchsia-600 px-4 py-1 text-white font-medium rounded-lg  hover:scale-105 cursor-pointer">{{ $viewData["order"]->getId() }}</div>
           </a>
        </div>
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script> 

@endsection
