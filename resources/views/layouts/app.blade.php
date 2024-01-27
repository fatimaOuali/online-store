<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
   
    <title>@yield('title', 'online store')</title>
</head>
<body>
    @guest
    <div class="flex justify-center py-1 mb-8 bg-red-500">
        <div class="text-xl font-sans ">
           <span class="font-bold">
            <a href="{{ route('register') }}">
            <button class="bg-transparent hover:bg-red-100 text-white font-semibold hover:text-black py-1 px-4 border border-white hover:border-transparent rounded">
                Register now 
              </button>
            </a>
            </span> 
            and get <span class="font-serif text-gray-800 font-bold ">free shipping</span> 
            on your first purchase
        </div>
    </div>
    @else
    <div class="flex justify-center py-2 mb-8 bg-red-500">
        <div class="text-xl font-sans ">
            <span class="font-bold">
                <a href="{{ route('product.women') }}">
                </span> 
                Discover the biggest discounts in today's big sale
                <span class="font-serif text-gray-800 font-bold ">50% off </span>
                </a>
           </span> 
        </div>
    </div>
    @endguest
    <div class="flex all justify-center mb-8 ">
        <nav class="self-center  w-full max-w-7xl  ">
            <div class="flex flex-col  lg:flex-row justify-around items-center border-b-2">
                <h1 class="uppercase pl-5 py-4 text-xl font-sans font-bold">
                   <a href="{{ route('home.about') }}">OnlineStore</a> </h1>

                <ul class=" navb lg:flex items-center text-[18px] font-semibold pl-10">
                    <li class=" hover:underline  underline-offset-4 decoration-2 decoration-black py-2 rounded-lg px-5">
                        <a href="{{ route('home.about') }}">Home</a>
                    </li>
                
                    
                <li class="hover:underline underline-offset-4 decoration-2 decoration-black py-2 rounded-lg px-5">
                    <a href="{{ route('product.women') }}">
                    Women clothes
                    </a>
            </li>
            <li class="hover:underline underline-offset-4 decoration-2 decoration-black py-2 rounded-lg px-5">
                <a href="{{ route('product.man') }}">
                Men clothes
                </a>
        </li>

        <li class="hover:underline underline-offset-4 decoration-2 decoration-black py-2 rounded-lg px-5">
            <a href="{{ route('product.kids') }}">
            Kids clothes
            </a>
    </li>

                     
                    <li class="hover:underline underline-offset-4 decoration-2 decoration-black py-2 rounded-lg px-5"><a
                        href="{{ route('message.index') }}">Contact</a></li>
                    
                </ul>
                
            @guest           
            <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative">
                
                <div class="flex icons  items-center space-x-2">
                    <a href="{{ route('login') }}" class="w-6 h-6 inline-block rounded-full  hover:text-blue-500">
                        <img src="{{ asset('/img/trolley.png') }}" alt="">
                    </a>
                    <a href="{{ route('login') }}" class="w-6 h-6 inline-block rounded-full hover:text-blue-500">
                        <img src="{{ asset('/img/heart.png') }}" alt="">
                    </a>
                    <button x-on:click="show = !show" type="button" style="z-index: 2;" class="max-w-xs rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true" >
                        <span class="sr-only">Open user menu</span>
                        <img class="h-6 w-6 rounded-full" src="{{ asset('/img/profile.png') }}" alt="">
                    </button>
                </div>
                <div x-show="show" style="z-index: 3;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                        Login</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                        Sign Up</a>
                   

            </div>
            @else

            <!-- Profile dropdown -->
            <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative">
                
                <div class="flex icons space-x-2 items-center ">
                    <a href="{{ route('cart.index') }}" class="w-6 h-6 inline-block rounded-full  hover:text-blue-500">
                        <img src="{{ asset('/img/trolley.png') }}" alt=""></a>
                    <a href="{{ route('wishlist.index') }}" class="w-6 h-6 inline-block rounded-full hover:text-blue-500">
                        <img src="{{ asset('/img/heart.png') }}" alt=""></a>
                   
                        <button x-on:click="show = !show" type="button" style="z-index: 3;" class="max-w-xs rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-6 w-6 rounded-full" src="{{ asset('/img/profile.png') }}" alt="">
                    </button>
                </div>
  
                <div x-show="show" style="z-index: 3;" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
                    <a href="{{ route('myaccount.orders') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">My orders</a>
                    <a href="{{ route('cart.index') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Cart</a>
                    <a href="{{route("wishlist.index")}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">wishlist</a>
                    <hr class="dropdown-divider">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a onclick="document.getElementById('logout').submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
                            Sign out
                        </a>
                        @csrf
                    </form>
                    
              @endguest
            </div>
              </div>
        </nav>
       
    </div>
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
        margin-left: -40px ;
    }
    @media screen and (max-width: 720px){
        .flex {
                    flex-direction: column;
                }
        .search-icon {
              display: none;

       }
       .navb{
        font-size: 15px;
       }
    }
 


    </style>
<form action="{{ url('search')}}" method="GET" role="search">
<div class="flex relative search-container mb-8">
    <div class="flex relative mb-4 flex w-full flex-wrap items-stretch">
      <input
        type="search"
        name="search"
        class="flex relative search m-0 block min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
        placeholder="  Search"
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
    <div>
        @yield('content')
      
      </div>
      
      <div class=" bg-gray-300 flex items-center justify-around mt-8">
        <div class=" m-2 items-start relative w-full flex flex-row justify-between ml-8 mr-4 max-w-7xl">
            <div class="relative">
                <div class=" p-2 space-y-5 md:grid  lg:grid-cols-5">
                    <div class="w-1/2 md:ml-24 md:mt-9 md:w-3/4">
                        <h1 class="text-gray-600 text-xl font-medium">OnlineStore</h1> <br />
                <br />
                        <p class="text-gray-500 font-medium text-base hover:text-gray-600 cursor-pointer"> <strong
                                class="tracking-wide text-gray-600 font-normal">Phone:</strong> +91 7008090111 </p>
                        <p class="text-gray-500 font-medium text-base hover:text-gray-600 cursor-pointer"> <strong
                                class="tracking-wide text-gray-600 font-normal">Email:</strong> info@gmail.com </p>
                    </div>
                    <div class="leading-9 md:w-2/4 md:order-3 md:ml-24">
                        <h1 class="text-gray-600 text-xl font-medium tracking-[0.030rem]"> OnlineStore </h1>
                        <ul class="mt-2 text-gray-500 font-medium">
                            <li><a href="#" class="hover:text-gray-600">
                                    Home</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                    About Us</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                    Services</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                    Contact</a> </li>
                        </ul>
                    </div>
                    <div class="leading-9 md:w-2/4 md:order-3 md:ml-24">
                        <h1 class="text-gray-600 text-xl font-medium tracking-[0.030rem]"> HELP </h1>
                        <ul class="mt-2 text-gray-500 font-medium">
                            <li><a href="#" class="hover:text-gray-600">
                                Shipping Info</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                How To Order</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                How To Track</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                help</a> </li> 
                        </ul>
                    </div>
                    <div class="leading-9 md:w-3/4 md:order-4">
                        <h1 class="text-gray-600 text-xl font-medium tracking-[0.030rem]"> Our Products </h1>
                        <ul class="mt-2 text-gray-500 font-medium">
                            <li><a href="#" class="hover:text-gray-600">
                                    Clothes Women</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                Clothes Men</a> </li>
                            <li><a href="#" class="hover:text-gray-600">
                                Clothes kids</a> </li>
                        </ul>
                    </div>
                    <div class="md:order-2 lg:order-last">
                        <h1 class="text-gray-600 text-xl font-medium tracking-[0.030rem]"> Join Our Newsletter </h1> <br />
                        <p class="text-gray-500 font-medium w-3/5 leading-7 mb-5 md:w-3/4"> 

                            </p> <input type="email"
                            placeholder="Enter E-mail Here"
                            class="py-1 px-2 placeholder-gray-400 rounded-tl-xl focus: outline-none focus:bordermd:w-1/2 lg:w-3/5 border" />
                        <button class="text-white bg-red-600 p-1 -translate-x-1 rounded-br-xl hover:bg-blue-500"> Subscribe
                        </button>
                    </div>
                </div>
                <div
                    class="md:flex hidden bg-gray-700 p-3 flex-col text-center pt-5 space-y-8 md:flex-row md:justify-between md:space-y-0">
                    <div
                        class="flex mx-3 justify-between space-x-20 md:flex-row text-gray-200 md:space-x-28 md:ml-20 lg:ml-24 lg:space-x-[13rem] xl:space-x-72 xl:ml-24">
                        <p>@ Copyright <strong>onlinstore.</strong>All Rights Reserved</p>
                        <p>Designed by <span class="text-gray-400">Fatima Ouali</span></p>
                    </div>
                    <div
                        class="text-white pb-4 text-center text-xl space-x-2 md:w-2/4 md:pb-0 md:pl-2 md:space-x-1 lg:pl-[171px] lg:space-x-2 xl:pl-44">
                        <a href="#"
                            class="w-8 h-8 bg-orange-500 hover:text-orange-500 inline-block rounded-full pt-[3px] hover:bg-gray-200"><i
                                class="fa fa-twitter"></i></a> <a href="#"
                            class="w-8 h-8 bg-orange-500 hover:text-orange-500 inline-block rounded-full pt-[3px] hover:bg-gray-200"><i
                                class="fa fa-instagram"></i></a> <a href="#"
                            class="w-8 h-8 bg-orange-500 hover:text-orange-500 inline-block rounded-full pt-[3px] hover:bg-gray-200"><i
                                class="fa fa-facebook"></i></a> <a href="#"
                            class="w-8 h-8 bg-orange-500 hover:text-orange-500 inline-block rounded-full pt-[3px] hover:bg-gray-200"><i
                                class="fa fa-google"></i></a> <a href="#"
                            class="w-8 h-8 bg-orange-500 hover:text-orange-500 inline-block rounded-full pt-[3px] hover:bg-gray-200"><i
                                class="fa fa-linkedin"></i></a> </div>
                </div>
            </div>
        </div>
        </div> 
       
        
</body>
</html>