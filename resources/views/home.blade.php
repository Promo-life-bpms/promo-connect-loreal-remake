@extends('layouts.cotizador')

@section('content')
    <!-- <div class="container mx-auto max-w-7xl">
        <div class="w-full bg-[#0047BB]">
            <div class="flex justify-center">
                <span class="text-center text-white">
                </span>
            </div>
        </div>
    </div> -->
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
        <div class="flex mx-auto max-w-7xl py-8 mt-10">
            <div style="width: 20px; height:38px;" class="bg-secondary"></div>
            <p class="text-secondary pl-4 text-xl mt-2">Navega por nuestras categorias</p>
        </div>

        <div class="container mx-auto max-w-7xl py-8 px-4">
            <div class="grid grid-cols-5 gap-4">
        
                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center">PPD Salon Tools</p>
                    </div>
                </a>

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Luggage & Trolley (no brand) </p>
                    </div>
                </a>

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Standard Bags and Pouches </p>
                    </div>
                </a>
                 

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Professional Beauty & Make-up Tools </p>
                    </div>
                </a>

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Promotional jewelry & small metal accessories </p>
                    </div>
                </a>


                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Standard/Customized electric devices (no brand)</p>
                    </div>
                </a>


                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Standard gifts & accessories & stationary (from stock items)</p>
                    </div>
                </a>


                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Promotional Towel Items & Bath Robes</p>
                    </div>
                </a>


                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Tee-Shirt </p>
                    </div>
                </a>

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Others promotional textiles</p>
                    </div>
                </a>

                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105 mb-10">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <p class="font-bold mt-6 text-center p-2">Scarfs & sarongs</p>
                    </div>
                </a>
                
            </div>
        </div>


        <div class="flex mx-auto max-w-7xl py-8 mt-10">
            <div style="width: 20px; height:38px;" class="bg-secondary"></div>
            <p class="text-secondary pl-4 text-xl mt-2">Más productos</p>
        </div>
        <div class="container mx-auto max-w-7xl py-8 ">
            <div class="flex flex-wrap justify-center">
                @foreach ($moreProducts as $product)
                    @if ($product->firstImage)
                        <a href="{{ route('show.product', ['product' => $product->id]) }}" 
                            class="max-h-40 w-auto text-center overflow-hidden mx-6">
                            <img src="{{ $product->firstImage->image_url }}" alt="" srcset=""
                                class="h-40 w-40 " style="object-fit: scale-down;">
                        </a>
                    @else
                        <img src="{{ asset('/img/default.jpg') }}" alt="" srcset="" class="max-h-40 w-auto">
                    @endif
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


        <div class="max-w-7xl">
            <a id="whatsapp-link" href="https://api.whatsapp.com/send?phone=5530395106" class="fixed bottom-4 right-4 p-4 bg-green-500 text-white rounded-full shadow-lg"  style=" z-index:30; @media (max-width: 768px) { margin: 0 120px 0px 0; z-index:30; }">
                <svg width="40px" height="40px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"/>
                    <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"/>
                    <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"/>
                    <defs>
                    <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#5BD066"/>
                    <stop offset="1" stop-color="#27B43E"/>
                    </linearGradient>
                    </defs>
                </svg>
            </a>
        </div>
       


       
    </div>


@endsection
