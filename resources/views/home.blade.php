@extends('layouts.cotizador')

@section('content')

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img1, .img2, .img3, .img4, .img4, .img5, .img6, .img7, .img8, .img9, .img10, .img11{
            width: 350px;
            height: 250px;
        }
        .img1:hover{
            background-image: url('{{ asset('img/loreal10.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img1:hover{
            background-image: url('{{ asset('img/loreal1.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img2:hover{
            background-image: url('{{ asset('img/loreal10.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img3:hover{
            background-image: url('{{ asset('img/loreal13.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img4:hover{
            background-image: url('{{ asset('img/loreal10.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img5:hover{
            background-image: url('{{ asset('img/loreal11.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img6:hover{
            background-image: url('{{ asset('img/loreal2.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img7:hover{
            background-image: url('{{ asset('img/loreal15.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img8:hover{
            background-image: url('{{ asset('img/loreal9.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img9:hover{
            background-image: url('{{ asset('img/loreal6.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img10:hover{
            background-image: url('{{ asset('img/loreal4.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        } 
        .img11:hover {
            background-image: url('{{ asset('img/loreal12.png') }}');
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);  
            color: white; 
        }
        .swiper-pagination-bullet-active{
            background: rgb(166 105 51);
        }
    </style>
    <div id="default-carousel" class="relative w-full text-center" data-carousel="slide" >
        <!-- Carousel wrapper -->
        <div class="relative h-80 overflow-hidden  md:h-[32rem] mx-auto max-w-7xl">
            @foreach ($banners as $item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/banners/' . $item->url_banner) }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." style="z-index:1; object-fit: contain; !important">
                </div>
            @endforeach
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            @for ($i = 0; $i < count($banners); $i++)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
            @endfor
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="shadow-lg inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-slate-300/50 group-hover:bg-slate-300/70  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg aria-hidden="true" class=" w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="bg-slate-300/50 group-hover:bg-slate-300/70 shadow-lg inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class=" w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>

    </div>
    <div class="max-h-40">


    </div>

    <div class="flex mx-auto max-w-7xl py-8 mt-10">
        <div style="width: 20px; height:38px;" class="bg-secondary"></div>
        <p class="text-secondary pl-4 text-xl mt-2">Categorias</p>
    </div>


    <div class="container mx-auto w-full mt-10"> 
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 27]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img1" >
                        <p class="font-bold mt-6 text-center">PPD Salon Tools</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 47]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img3" >
                        <p class="font-bold mt-6 text-center p-2">Luggage & Trolley (no brand)</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 47]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img3" >
                        <p class="font-bold mt-6 text-center p-2">Standard Bags and Pouches </p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 27]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img4" >
                        <p class="font-bold mt-6 text-center p-2">Professional Beauty & Make-up Tools </p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 27]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img5" >
                        <p class="font-bold mt-6 text-center p-2">Promotional jewelry & small metal accessories </p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 22]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img6" >
                        <p class="font-bold mt-6 text-center p-2">Standard/Customized electric devices (no brand)</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 9]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img7" >
                        <p class="font-bold mt-6 text-center p-2">Standard gifts & accessories & stationary (from stock items)</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 4]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img8" >
                        <p class="font-bold mt-6 text-center p-2">Promotional Towel Items & Bath Robes</p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 44]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img9" >
                        <p class="font-bold mt-6 text-center p-2">Tee-Shirt </p>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 5]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img10" >
                        <p class="font-bold mt-6 text-center p-2">Others promotional textiles</p>
                    </div>
                </a>
            </div>

            <div class="swiper-slide">
                <a href="{{ route('categoryfilter', ['category' => 4]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 img11" >
                        <p class="font-bold mt-6 text-center p-2">Scarfs & sarongs</p>
                    </div>
                </a>
            </div>
        </div>


        
          
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 3,
          spaceBetween: 30,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
    </script>
    <div class="container mx-auto max-w-7xl">

        <div class="flex mx-auto max-w-7xl py-8 mt-10">
            <div style="width: 20px; height:38px;" class="bg-secondary"></div>
            <p class="text-secondary pl-4 text-xl mt-2">Productos más vendidos</p>
        </div>
       
        <div class="container mx-auto max-w-7xl py-8 bg-white ">
            <div class="flex flex-wrap justify-center">
                @foreach ($latestProducts as $product)
                    <a href="{{ route('show.product', ['product' => $product->id]) }}" class="flex items-center justify-center text-center overflow-hidden mx-4" style=" width: 180px; height: 180px;">
                        <img src="{{ isset($product->firstImage->image_url) ? $product->firstImage->image_url : asset('/img/default.jpg') }}" alt="" srcset="" class="max-h-40 w-auto overflow-hidden">
                    </a>
                @endforeach
            </div>
        </div>  

        <div class="max-w-7xl mx-auto flex justify-center mt-40 mb-40">
            <div class="flex w-1/3 justify-center mr-4">
                <div class="w-full h-24 flex flex-col items-end justify-center">
                    <p class="text-4xl text-secondary font-bold"></p> 
                    <div style="width: 100%;">
                        <p class="text-right mt-10 text-2xl">Todos los productos en un solo lugar</p>
                    </div>
                </div>
            </div>
            <div class="flex w-2/3 justify-center ml-4">
                <div class="w-full h-24 flex items-center justify-center">
                    <img src="{{asset('img/banner1.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="max-w-7xl relative">
            <img src="{{ asset('img/banner_premium.png') }}" alt="" class="block">
            <img src="{{ asset('img/text_pemium.png') }}" alt="" class="absolute inset-0 mx-auto my-auto" style="width:40%;">
        </div>
    </div>

@endsection
