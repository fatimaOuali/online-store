@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')


<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
        <form method="POST" action="{{ route('message.store') }}" class="space-y-8">
    @csrf

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Your email
                </label>
                <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email"  placeholder="name@flowbite.com" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus type="text" required placeholder="Let us know how we can help you"></textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <button type="submit" class="py-3 px-5 justify-center items-center text-sm font-medium text-center rounded-lg bg-gray-400  hover:bg-green-400  ">Send message</button>
        </form>
        @if(session()->has('success'))
    <div class="alert success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
    {{session()->get('success')}}
  </div>
    @endif
    </div>
  </section>
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
