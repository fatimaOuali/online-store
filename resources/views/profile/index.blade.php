@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')


@if(session('message'))
<p class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
    {{session('message')}}
</p>
@endif

@if($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li class="text-danger">
        {{$error}}

    </li>
    @endforeach

</ul>
@endif

<form action="{{ url('modifierprofile')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="h-full">
 
    <div class="border-b-2 block md:flex">
  
      <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
        <div class="flex justify-between">
          <span class="text-xl font-semibold block">
            <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control" />
          </span>
          <button type="submit" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">
            Save
          </button>
          <a href="{{route('profile.show')}}" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">
            View
          </a>
        </div>
  
        <span class="text-gray-600">This information is secret so be careful</span>
        <div class="w-full p-8 mx-2 flex justify-center">
          <img src="{{ asset('/storage/'.$viewData["profile"]->image) }}" id="showImage" class="max-w-xs w-32 items-center border"  alt="">                          
          </div>
          <div class="col-lg-10 col-md-6 col-sm-12">
            <input class="form-control" id="profile_image"  type="file" name="image">
            
            <img src="{{ asset('img/'.Auth::user()->image) }}" alt="">
          
          </div>
      </div>
      <div class="col">
        &nbsp;
      </div>
      <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
        <div class="rounded  shadow p-6">
          <div class="pb-6">
            <label for="name" class="font-semibold text-gray-700 block pb-1">phone</label>
            <div class="flex">
                <input type="text" name="phone" value="{{ Auth::user()->phone  }}" class="form-control" />
            </div>
          </div>
          <div class="pb-4">
            <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
           <div class="flex">
            <input type="text" readony  value="{{ Auth::user()->email }}" class="form-control" />
        </div>
        </div>

        <div class="pb-2">
            <label for="name" class="font-semibold text-gray-700 block pb-1">adress</label>
            <div class="flex">
                <textarea type="text" name="address"  class="form-control"  rows="5" >{{ Auth::user()->address  }}</textarea>
            </div>
          </div>

        </div>
      </div>
  
    </div>
   
  </div>

</form>

<style>
    .alert{
width:50%;
margin:20px auto;
padding:30px;
position:relative;
border-radius:5px;
box-shadow:0 0 15px 5px #ccc;
}
.close{
position:absolute;
width:30px;
height:30px;
opacity:0.5;
right:15px;
top:25px;
text-align:center;
font-size:1.6em;
cursor:pointer;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>   

<script>
 $(document).ready(function(){
    $('.close').on('click', function(){
        $(this).closest('.alert').fadeOut();
    });
});
</script>
@endsection