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
            <div class="flex flex-wrap justify-between">
        
                <!-- Primer elemento -->
                <a href="{{ route('categoryfilter', ['category' => 2]) }}" class="transition-transform transform hover:scale-105">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <svg width="60px" height="60px" viewBox="-20 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Bottle" sketch:type="MSLayerGroup" transform="translate(1.000000, 1.000000)" stroke="#6B6C6E" stroke-width="2">
                                    <path d="M7,6 L7,13 C7,13 0,23.9 0,25 L0,60 C0,61.1 0.9,62 2,62 L20,62 C21.1,62 22,61.1 22,60 L22,25 C22,23.9 15,13 15,13 L15,6" id="Shape" sketch:type="MSShapeGroup"></path>
                                    <path d="M17,4 C17,5.1 16.1,6 15,6 L7,6 C5.9,6 5,5.1 5,4 L5,2 C5,0.9 5.9,0 7,0 L15,0 C16.1,0 17,0.9 17,2 L17,4 L17,4 Z" id="Shape" sketch:type="MSShapeGroup"></path>
                                </g>
                            </g>
                        </svg>
                        <p class="font-bold mt-6">Bebidas</p>
                    </div>
                </a>
        
                <!-- Segundo elemento -->
                <a href="{{ route('categoryfilter', ['category' => 3]) }}" class="transition-transform transform hover:scale-105">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                            <svg width="40px" height="40px" viewBox="-8.98 0 217.7 217.7" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                <style>.cls-1{fill:#ffffff;}</style>
                                </defs>
                                <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">       
                                <path d="M189,28.07c2.26,2.47,4,4.41,5.74,6.26,5.44,5.63,6.28,12.28,3.15,19a221.61,221.61,0,0,1-12.16,22.69C178.57,87.77,171,99.25,162,109.73c-1.83,2.13-3.81,4.15-5.74,6.25-3.59-1.26-5.81-3.49-8-5.64s-2.91-5-1.26-7.82c2.17-3.7,4.42-7.37,6.9-10.87,6.46-9.11,13.25-18,19.53-27.21,3.37-4.95,6-10.39,8.89-15.66.63-1.17,1.13-2.63-1.06-3.93-.65.94-1.3,1.77-1.81,2.67-8.13,14.18-16.48,28.18-27.8,40.19-4.5,4.79-8.45,10.11-12.57,15.25a32.1,32.1,0,0,0-2.13,3.66c-.55.9-1.07,2.4-1.8,2.53-3.25.58-4.6,3.27-6.45,5.34-7.46,8.33-14.8,16.75-22.24,25.09A214.24,214.24,0,0,1,64.57,176.3C56.46,181.65,49,187.91,41,193.45c-8.49,5.88-16.53,12.16-23.61,19.77-4.77,5.12-9.39,5.55-14.72,2.83-2.39-1.22-3.06-3-2.37-5.7,1.24-4.93,4.29-8.8,7.76-12.18s5.22-7.2,6.49-11.72a56.7,56.7,0,0,1,5.25-12.65c7.63-13.45,15.2-27,23.48-40C54.79,115.58,68.78,99.26,83.9,83.91c1.61-1.63,3.19-3.3,4.85-4.88a5.83,5.83,0,0,0,2.13-5.33,7.57,7.57,0,0,1,2.18-6.3c8.38-9.4,15.43-20,24.84-28.48,12.35-11.13,24.78-22.2,39.25-30.58A138.15,138.15,0,0,1,172.58.84c5.29-2.24,14.41.21,18,4.74a9.34,9.34,0,0,1,2,5.46,67.2,67.2,0,0,1-1.43,11A42.38,42.38,0,0,1,189,28.07Zm-93.62,54A26.29,26.29,0,0,0,92,84.83c-8.94,10-18.26,19.76-26.63,30.25a334.26,334.26,0,0,0-35.7,55.46c-2.23,4.32-4.86,8.42-7.18,12.69-1.73,3.18-1.38,5.29,1,7.78,2.76,2.89,4.85,3.25,8.31,1.24a53.44,53.44,0,0,0,5-3.3c4.36-3.21,8.68-6.49,13-9.74,10.52-7.89,21.46-15.18,31.5-23.73C94.34,144.34,105,131,117,118.7c3.09-3.18,5.07-7.44,7.75-11.49-4.92-3.86-10-7.54-14.67-11.59C105.06,91.35,100.4,86.74,95.41,82.1Zm35.16,20.38c7.27-8.55,13.9-16,20.18-23.8,13.9-17.23,24.9-36.26,34-56.37a25.21,25.21,0,0,0,1.74-9.17c.2-4.3-2.44-7.2-6.71-7.23a21.13,21.13,0,0,0-8.25,1.72c-17.55,7.61-32.62,19-46.2,32.18-8.18,7.95-15.51,16.79-23.1,25.33-1.66,1.88-2.83,4.2-4.44,6.63C106.16,84.81,117.72,93.81,130.57,102.48Zm24.69,3.77a16.57,16.57,0,0,0,2.87-2.49c7.05-9.7,14.12-19.38,21-29.21a145.65,145.65,0,0,0,12.77-22.23c2.61-5.65,2.49-10.43-2.54-14.56-.86-.71-1.65-1.51-3-2.75-.68,1.61-1.61,2.8-1.55,4a7.39,7.39,0,0,0,1.61,3.88c2.68,3.38,2.58,6.7.49,10.3-1.29,2.21-2.1,4.71-3.48,6.85q-8.82,13.66-17.86,27.18c-3.33,5-6.86,9.83-10.22,14.79C154.57,103.07,153.65,104.35,155.26,106.25ZM21.63,198.91c-4.06-1.11-4.14-1.18-4.73-.49-2.54,3-5.11,6-7.5,9.05-.47.61-.22,1.76-.38,3.51C15,208.16,17.64,203.56,21.63,198.91Z"/>
                                <path class="cls-1" d="M95.41,82.1c5,4.64,9.65,9.25,14.62,13.52,4.72,4,9.75,7.73,14.67,11.59C122,111.26,120,115.52,117,118.7,105,131,94.34,144.34,81.27,155.48c-10,8.55-21,15.84-31.5,23.73-4.34,3.25-8.66,6.53-13,9.74a53.44,53.44,0,0,1-5,3.3c-3.46,2-5.55,1.65-8.31-1.24-2.36-2.49-2.71-4.6-1-7.78,2.32-4.27,4.95-8.37,7.18-12.69a334.26,334.26,0,0,1,35.7-55.46C73.7,104.59,83,94.86,92,84.83A26.29,26.29,0,0,1,95.41,82.1Z"/>
                                <path class="cls-1" d="M130.57,102.48c-12.85-8.67-24.41-17.67-32.74-30.71,1.61-2.43,2.78-4.75,4.44-6.63,7.59-8.54,14.92-17.38,23.1-25.33C139,26.59,154,15.24,171.57,7.63a21.13,21.13,0,0,1,8.25-1.72c4.27,0,6.91,2.93,6.71,7.23a25.21,25.21,0,0,1-1.74,9.17c-9.14,20.11-20.14,39.14-34,56.37C144.47,86.45,137.84,93.93,130.57,102.48Z"/>
                                <path class="cls-1" d="M155.26,106.25c-1.61-1.9-.69-3.18.07-4.29,3.36-5,6.89-9.81,10.22-14.79q9-13.53,17.86-27.18c1.38-2.14,2.19-4.64,3.48-6.85,2.09-3.6,2.19-6.92-.49-10.3A7.39,7.39,0,0,1,184.79,39c-.06-1.15.87-2.34,1.55-4,1.36,1.24,2.15,2,3,2.75,5,4.13,5.15,8.91,2.54,14.56a145.65,145.65,0,0,1-12.77,22.23c-6.87,9.83-13.94,19.51-21,29.21A16.57,16.57,0,0,1,155.26,106.25Z"/>
                                <path class="cls-1" d="M21.63,198.91C17.64,203.56,15,208.16,9,211c.16-1.75-.09-2.9.38-3.51,2.39-3.1,5-6.07,7.5-9.05C17.49,197.73,17.57,197.8,21.63,198.91Z"/>
                                </g>
                            </g>
                            
                            </svg>
                        <p class="font-bold mt-6">Bolígrafos</p>
                    </div>
                </a>
        
                <!-- Tercer elemento -->
                <a href="{{ route('categoryfilter', ['category' => 9]) }}" class="transition-transform transform hover:scale-105">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300 hover:fill-white" >
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                width="40px" height="40px" viewBox="0 0 33 32" enable-background="new 0 0 33 32" xml:space="preserve">
                            <g>
                                <path fill="#808184" d="M32.5,19.5c-0.276,0-0.5,0.224-0.5,0.5v10.5c0,0.275-0.225,0.5-0.5,0.5H19v-8c0-0.276-0.224-0.5-0.5-0.5
                                    S18,22.724,18,23v8h-3v-8c0-0.276-0.224-0.5-0.5-0.5S14,22.724,14,23v8H1.5C1.225,31,1,30.775,1,30.5V20c0-0.276-0.224-0.5-0.5-0.5
                                    S0,19.724,0,20v10.5C0,31.327,0.673,32,1.5,32h30c0.827,0,1.5-0.673,1.5-1.5V20C33,19.724,32.776,19.5,32.5,19.5z"/>
                                <path fill="#808184" d="M31.5,5H23V1.5C23,0.673,22.327,0,21.5,0h-10C10.673,0,10,0.673,10,1.5V5H1.5C0.673,5,0,5.673,0,6.5v10
                                    C0,17.327,0.673,18,1.5,18H14v0.736c0,1.379,1.121,2.5,2.5,2.5s2.5-1.121,2.5-2.5V18h12.5c0.827,0,1.5-0.673,1.5-1.5v-10
                                    C33,5.673,32.327,5,31.5,5z M11,1.5C11,1.225,11.225,1,11.5,1h10C21.775,1,22,1.225,22,1.5V5H11V1.5z M18,18.736
                                    c0,0.827-0.673,1.5-1.5,1.5s-1.5-0.673-1.5-1.5V18h3V18.736z M32,16.5c0,0.275-0.225,0.5-0.5,0.5h-30C1.225,17,1,16.775,1,16.5v-10
                                    C1,6.225,1.225,6,1.5,6H14v9c0,0.276,0.224,0.5,0.5,0.5S15,15.276,15,15V6h3v9c0,0.276,0.224,0.5,0.5,0.5S19,15.276,19,15V6h12.5
                                    C31.775,6,32,6.225,32,6.5V16.5z"/>
                            </g>
                        </svg>
                        <p class="font-bold mt-6">Oficina</p>
                    </div>
                </a>
        
                <!-- Cuarto elemento -->
                <a href="{{ route('categoryfilter', ['category' => 14]) }}" class="transition-transform transform hover:scale-105">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 18V12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12V18M6.75 21C6.05302 21 5.70453 21 5.41473 20.9424C4.22466 20.7056 3.29436 19.7753 3.05764 18.5853C3 18.2955 3 17.947 3 17.25V15.6C3 15.0399 3 14.7599 3.10899 14.546C3.20487 14.3578 3.35785 14.2049 3.54601 14.109C3.75992 14 4.03995 14 4.6 14H6.4C6.96005 14 7.24008 14 7.45399 14.109C7.64215 14.2049 7.79513 14.3578 7.89101 14.546C8 14.7599 8 15.0399 8 15.6V19.75C8 19.9823 8 20.0985 7.98079 20.1951C7.90188 20.5918 7.59178 20.9019 7.19509 20.9808C7.09849 21 6.98233 21 6.75 21ZM17.25 21C17.0177 21 16.9015 21 16.8049 20.9808C16.4082 20.9019 16.0981 20.5918 16.0192 20.1951C16 20.0985 16 19.9823 16 19.75V15.6C16 15.0399 16 14.7599 16.109 14.546C16.2049 14.3578 16.3578 14.2049 16.546 14.109C16.7599 14 17.0399 14 17.6 14H19.4C19.9601 14 20.2401 14 20.454 14.109C20.6422 14.2049 20.7951 14.3578 20.891 14.546C21 14.7599 21 15.0399 21 15.6V17.25C21 17.947 21 18.2955 20.9424 18.5853C20.7056 19.7753 19.7753 20.7056 18.5853 20.9424C18.2955 21 17.947 21 17.25 21Z" stroke="#8a8a8a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hover:bg-white"/>
                        </svg>
                        <p class="font-bold mt-6">Tecnología</p>
                    </div>
                </a>
        
                <a href="{{ route('categoryfilter', ['category' => 32]) }}" class="transition-transform transform hover:scale-105">
                    <div class="w-48 h-40 bg-white shadow-lg flex flex-col items-center justify-center border border-black hover:bg-black hover:text-stone-300" >
                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM22.75 10.5385C22.75 10.1243 22.4142 9.78851 22 9.78851C21.5858 9.78851 21.25 10.1243 21.25 10.5385H22.75ZM21.25 7.00012C21.25 7.41434 21.5858 7.75012 22 7.75012C22.4142 7.75012 22.75 7.41434 22.75 7.00012H21.25ZM1.25 10.5708C1.25 10.985 1.58579 11.3208 2 11.3208C2.41421 11.3208 2.75 10.985 2.75 10.5708H1.25ZM2.75 14.0001C2.75 13.5859 2.41421 13.2501 2 13.2501C1.58579 13.2501 1.25 13.5859 1.25 14.0001H2.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75ZM22.75 16.1437V10.5385H21.25V16.1437H22.75ZM22.75 7.00012V4.93332H21.25V7.00012H22.75ZM2.75 10.5708V4.99792H1.25V10.5708H2.75ZM2.75 16.1437V14.0001H1.25V16.1437H2.75Z" fill="#8a8a8a"/>
                            <path d="M12 5.50049V16.0005V20.5005" stroke="#8a8a8a" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        <p class="font-bold mt-6">Libretas</p>
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
