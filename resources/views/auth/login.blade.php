
@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>


<div class="flex justify-center mb-20">
    <div
        class="flex flex-col justify-center items-center md:flex-row shadow rounded-xl max-w-7xl w-[50%] h-[670px] md:h-[460px] m-2">
        <div class="h-[100%] w-full md:w-3/4  bg-center  bg-cover rounded-lg"
            style="background-image: url('{{ asset('/img/login.png') }}');">
            <div class="text-lg lg:text-xl text-center mt-16 space-x-5">
               
                <a href="#">
                    <i class="fa-brands fa-facebook-f text-blue-500  bg-white rounded-full px-[14px] py-[10px] " ></i>
                </a>
               <a href="#">
                   <i class="fa-brands fa-twitter text-cyan-400 bg-white rounded-full px-[10px] py-[10px] "></i>
               </a>
               <a href="#">
                   <i class="fa-brands fa-google-plus-g text-red-500 bg-white rounded-full px-[10px] py-[10px] "></i>
               </a>
            </div>
            <div class="text-white text-base font-semibold text-center my-10 space-y-2">
                <h1 class="">Don't have an account ?</h1>
                <h3> <a href="{{ route('register') }}" class="underline underline-offset-4 tracking-wide hover:text-blue-400">Signup</a> </h3>
            </div>

        </div>
        <div class="h-[90%] w-full md:w-3/4">
            <div class="text-2xl cursor-pointer flex flex-col justify-center items-center mt-5 md:mt-0">
              <h1 class="font-semibold text-gray-600">Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="flex flex-col justify-center items-center mt-10 md:mt-14 space-y-6 md:space-y-8">
                <div class="">
                    <input type="text" class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-blue-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px] @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                </div>
                <div class="">
                    <input type="password" 
                        class=" bg-gray-100 rounded-lg px-5 py-2 focus:border border-blue-600 focus:outline-none text-black placeholder:text-gray-600 placeholder:opacity-50 font-semibold md:w-72 lg:w-[340px] @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                <div class="flex space-x-2 -ml-28 md:-ml-40 ">
                    <input class="" type="checkbox" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <h3 class="text-sm font-semibold text-gray-400 cursor-pointer">Remember Me</h3>
                </div>
            </div>
            <div class="text-center mt-7">
                <button type="submit"
                    class="uppercase px-24 md:px-[118px] lg:px-[140px] py-2 rounded-md text-white bg-gray-500 hover:bg-green-600  font-medium ">
                    login
                </button>
                 
            </div>
            <div class="text-center my-6">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-gray-400 hover:text-blue-500 hover:underline">
                    Forgot Password ?
                </a>
            @endif 
                
            </div>
	</form>
            
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
<style>
  
@media screen and (max-width: 767px) {
    .max-w-7xl {
        width: 90%;
    }

   

    .md:flex-row {
        flex-direction: column;
    }

    .h-[670px] {
        height: auto;
    }

    .md:w-3/4 {
        width: 100%;
    }

    .md:h-[460px] {
        height: auto;
    }

    .md:w-1/2 {
        width: 100%;
    }

    .lg:w-[340px] {
        width: 100%;
    }


    .px-24,
    .md:px-[118px],
    .lg:px-[140px] {
        width: 100%;
    }
}



</style>
@endsection