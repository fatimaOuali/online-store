@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script>
    var cont=0;
function loopSlider(){
  var xx= setInterval(function(){
        switch(cont)
        {
        case 0:{
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
        cont=1;
        break;
        }
        case 1:
        {
        
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
           
        cont=0;
        
        break;
        }
        
        
        }},4000);

}

function reinitLoop(time){
clearInterval(xx);
setTimeout(loopSlider(),time);
}
 $(window).ready(function(){
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-purple-800");
        

        loopSlider();
    
    });

  
  </script>


<body>
  <div class="flex sliderAx ">
    <a href="{{ route('product.women') }}">
      <div id="slider-1" class="container mx-auto">
        <div class="gif bg-cover bg-center  text-white py-40 px-10 object-fill" 
        style="background-image: url('{{ asset('/img/OnlineStore1.gif') }}');">
     
    </div> 
  </a>
      <br>
      </div>
      <a href="{{ route('product.women') }}">
      <div id="slider-2" class="container mx-auto">
        <div class="gif bg-cover bg-top text-white py-40 px-10 object-fill"
        style="background-image: url('{{ asset('/img/OnlineStore2.gif') }}');">  
    </div> 
  </a>

      <br>
      </div>

      
    </div>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>

<div class="flex  items-center justify-center">
<div class="flex product items-center justify-center"> 
    <div class="flex-col items-center justify-center text-gray-800 text-center"> 
<div class="flex flex-wrap justify-center space-x-3 ">
  <div class=" w-[90%] flex items-center justify-center md:text-3xl text-2xl lg:text-4xl font-bold mt-10">
    Trendy Products
</div>

@foreach ($viewData["products"]->take(15) as $product)
<div class="w-full products max-w-sm bg-white mt-10 border border-gray-200 w-60 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:text-white mt-1 ">
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
            <span class="text-base font-normal text-red-500 line-through dark:text-gray-400">${{ $product->getSale() }}</span>
        </div>
    </div>
</div>
 
@endforeach






  {{-- Products Women  --}}
  <div class=" w-[90%] flex items-center justify-center  md:text-3xl text-2xl lg:text-4xl font-bold mt-10">
    Women Category
</div>
<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4 mt-10">
  <div class="w-full relative flex items-center justify-center">
    <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 border border-gray-200 bg-gray-400 rounded-full  focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer p-3" id="prev">
      <svg class="dark:text-white" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
  </button>
  
  
      <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
          <div id="slider1" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
            
            @foreach ($viewData["products"] as $product)
            @if ($product->category->name === 'women')
                <div class="flex flex-col flex-shrink-0 border border-gray-200 rounded-lg relative w-full sm:w-1/3 md:w-1/4 lg:w-1/5 sm:w-auto">
                    @if ($product->productImage->count() > 0)
                    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}">
                        <img src="/{{ $product->productImage->image }}" alt="black chair and white table" class="object-cover w-full h-80 rounded-t-lg" />
                      </a>
                        @endif
                    <div class="bg-white items-center justify-center mt-2">
                       
                        <div class="flex h-full items-end pb-6 items-center justify-center">
                            <h3 class="text-xl items-center justify-center font-semibold leading-5 lg:leading-6 text-gray-900 dark:text-gray-900">
                                {{ $product->getName() }} <br>
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">${{ $product->getPrice() }} </span>
            <span class="text-base font-normal text-red-500 line-through dark:text-gray-400">${{ $product->getSale() }} </span>
                           
                              </h3>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        
     


          </div>
      </div>
      <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 border border-gray-200 bg-gray-400 rounded-full focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 p-3" id="next">
          <svg class="dark:text-white" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
      </button>
  </div>
</div>

<script>
  let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider1 = document.getElementById("slider1");
    if (Math.abs(defaultTransform) >= slider1.scrollWidth / 1.7) defaultTransform = 0;
    slider1.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider1 = document.getElementById("slider1");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider1.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);

</script>

{{-- Products Women --}}



{{-- Products Man  --}}
<div class=" w-[90%] flex items-center justify-center mt-10  md:text-3xl text-2xl lg:text-4xl font-bold ">
  Man Category
</div>
<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4 mt-10">
  <div class="w-full relative flex items-center justify-center">
      <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 border border-gray-200 bg-gray-400 rounded-full p-3 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer  "  id="prev1">
          <svg class="dark:text-blue-900" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
      </button>
      <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
          <div id="slider2" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
              
            @foreach ($viewData["products"] as $product)
            @if ($product->category->name === 'men')
            <div class="flex flex-col  flex-shrink-0 border border-gray-200 rounded-lg relative w-full sm:w-1/3 md:w-1/4 lg:w-1/5 sm:w-auto">
                @if ($product->productImage->count() > 0)
              <a href="{{ route('product.show', ['id'=> $product->getId()]) }}">
                  <img src="/{{ $product->productImage->image }}" alt="black chair and white table" class="object-cover w-full  h-80  rounded-t-lg  " />
                </a>   
                 
                  @endif
                  <div class="bg-white items-center justify-center mt-2">
                     
                      <div class="flex h-full items-end pb-6 items-center justify-center">
                        
             <h3 class="text-xl items-center justify-center font-semibold leading-5 lg:leading-6 text-gray-900 dark:text-gray-900">
              {{ $product->getName() }}  <br> 
              <span class="text-2xl font-bold text-gray-900 dark:text-white">
                ${{ $product->getPrice() }}
               </span>  
            <span class="text-base font-normal text-red-500 line-through dark:text-gray-400">${{ $product->getSale() }}</span>

                    
                        </h3>
                        </div>
                    
                  </div>
              </div>
              @endif
              @endforeach


          </div>
      </div>
      <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 border border-gray-200 bg-gray-400 rounded-full p-3 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next1">
          <svg class="dark:text-blue-900" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
      </button>
  </div>
</div>

<script>
  let defaultTransform1 = 0;
function goNext1() {
    defaultTransform1 = defaultTransform1 - 398;
    var slider2 = document.getElementById("slider2");
    if (Math.abs(defaultTransform1) >= slider2.scrollWidth / 1.7) defaultTransform1 = 0;
    slider2.style.transform = "translateX(" + defaultTransform1 + "px)";
}
next1.addEventListener("click", goNext1);
function goPrev1() {
    var slider2 = document.getElementById("slider2");
    if (Math.abs(defaultTransform1) === 0) defaultTransform1 = 0;
    else defaultTransform1 = defaultTransform1 + 398;
    slider2.style.transform = "translateX(" + defaultTransform1 + "px)";
}
prev1.addEventListener("click", goPrev1);

</script>

{{-- Products Man --}}








{{-- Products Kids  --}}
<div class=" w-[90%] flex items-center justify-center  md:text-3xl text-2xl lg:text-4xl font-bold mt-10">
  Kids Category
</div>
<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4 mt-10">
  <div class="w-full relative flex items-center justify-center">
      <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 border border-gray-200 bg-gray-400 rounded-full p-3 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev2">
          <svg class="dark:text-blue-900" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
      </button>
      <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
          <div id="slider3" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
              
            @foreach ($viewData["products"] as $product)
            @if ($product->category->name === 'kids')

            <div class="flex flex-col  flex-shrink-0 border border-gray-200 rounded-lg relative w-full sm:w-1/3 md:w-1/4 lg:w-1/5 sm:w-auto">
                @if ($product->productImage->count() > 0)
              <a href="{{ route('product.show', ['id'=> $product->getId()]) }}">
                  <img src="/{{ $product->productImage->image }}" alt="black chair and white table" class="object-cover w-full  h-80  rounded-t-lg  " />
                </a>   
                
                  @endif
                  <div class="bg-white items-center justify-center mt-2">
                      
                      <div class="flex h-full items-end pb-6 items-center justify-center">
                        
             <h3 class="text-xl items-center justify-center font-semibold leading-5 lg:leading-6 text-gray-900 dark:text-gray-900">
              {{ $product->getName() }}  <br> 
              <span class="text-2xl font-bold text-gray-900 dark:text-white">
                ${{ $product->getPrice() }} </span>  
            <span class="text-base font-normal text-red-500 line-through dark:text-gray-400">${{ $product->getSale() }}</span>

                    
                        </h3>
                        </div>
                    
                  </div>
              </div>
              @endif
              @endforeach


          </div>
      </div>
      <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 border border-gray-200 bg-gray-400 rounded-full p-3 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next2">
          <svg class="dark:text-blue-900" width="10" height="10" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
      </button>
  </div>
</div>

<script>

  let defaultTransform2 = 0;
function goNext2() {
    defaultTransform2 = defaultTransform2 - 398;
    var slider3 = document.getElementById("slider3");
    if (Math.abs(defaultTransform2) >= slider3.scrollWidth / 1.7) defaultTransform2 = 0;
    slider3.style.transform = "translateX(" + defaultTransform2 + "px)";
}
next2.addEventListener("click", goNext2);
function goPrev3() {
    var slider3 = document.getElementById("slider3");
    if (Math.abs(defaultTransform2) === 0) defaultTransform2 = 0;
    else defaultTransform2 = defaultTransform2 + 398;
    slider3.style.transform = "translateX(" + defaultTransform2 + "px)";
}
prev2.addEventListener("click", goPrev3);

</script>

{{-- Products Kids --}}



<style>
  .star1{
    margin-left: 65%;
  }
 .ddh {
    padding-left: 2rem;
    padding-right: 2rem;
}

.ary {
    padding-top: 1rem;
    padding-bottom: 6rem;
}
.ari {
    padding-left: 1rem;
    padding-right: 1rem;
}
.tv {
    max-width: 42rem;
}
.gx {
    margin-left: auto;
    margin-right: auto;
}

@keyframes moveSakura {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(20px);
  }
  100% {
    transform: translateX(0);
  }
}


img.sakura {
  animation: moveSakura 4s infinite; 
}
@keyframes right_arrow {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(20px);
  }
  100% {
    transform: translateX(0);
  }
}

img.right_arrow {
  animation: right_arrow 3s infinite; 
}


  @media screen and (max-width: 720px) {
   
    .products{
      width: 90%;
      
    }

                .flex {
                    flex-direction: column;
                }
                #prev,
    #next {
      display: none; 
    }
    #prev1,
    #next1 {
      display: none; 
    }
    #prev2,
    #next2 {
      display: none; 
    }
                .pl-32 {
                    padding-left: 0;
                }
        
                .hidden-lg {
                    display: block;
                }
        
                .self-center {
                    text-align: center;
                }
        
                .hidden-lg ul {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }
        
                .hidden-lg li {
                    margin-bottom: 10px;
                }
        
                .hidden-lg button {
                    display: block;
                    margin: 10px auto;
                }
        
                .hidden-lg .relative {
                    text-align: center;
                }
        
                .hidden-lg .relative img {
                    margin: 0 auto;
                }
            }
</style>


@endsection