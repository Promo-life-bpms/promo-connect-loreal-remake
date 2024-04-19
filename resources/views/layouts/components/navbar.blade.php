<div  class="fixed top-0 left-0 right-0 z-50">
    
    <nav class="w-full flex justify-between py-2 px-4 md:px-6 items-center flex-wrap bg-primary shadow-md  h-20" >
        <div class="w-full md:w-1/12 mb-2 md:mb-0">
            <a href="{{ route('index') }}">
                <img src="{{asset('img/logo_loreal_white.png')}}"
                    style="object-fit: cover; width:120px;"
                    alt="logo" class="p-2 ">
            </a>
        </div>
       
        <div class="w-full md:w-4/12 mb-2 md:mb-0 text-white flex items-center">
            <div>
                @if (auth()->user())
                    <div class="flex items-center">
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdown"
                            class="text-white focus:ring-4 focus:outline-none p-1 font-medium focus:rounded text-lg text-center inline-flex items-center"
                            type="button">
                            <p class="mr-10 text-base	 ">{{ (auth()->user()->name) }}</p>
                        </button>
                    </div>
                @endif


                <div id="dropdown"
                class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44  hover:">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                    @role('buyers-manager')
                        <li>
                            <a href="{{ route('administrador') }}"
                                class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Administrador</a>
                        </li>
                    @endrole
                    @role('seller')
                        {{-- <li>
                            <a href="{{ route('seller.content') }}"
                                class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-50">Contenido</a>
                        </li> --}}
                    @endrole
                    @role('admin')
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Administrador</a>
                        </li>
                    @endrole
                    @role(['buyers-manager', 'buyer'])
                        <li>
                            <a href="{{ route('compras') }}"
                                class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Mis
                                Compras</a>
                        </li>
                        <li>
                            <a href="{{ route('muestras') }}"
                                class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Mis
                                Muestras</a>
                        </li>
                    @endrole

                    @role('seller')
                    
                    <li>
                        <a href="{{ route('seller.content') }}"
                        class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Banners</a>
                    </li>
                    <li>
                        <a href="{{ route('seller.compradores') }}"
                        class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Compradores</a>
                    </li>
                    <li>
                        <a href="{{ route('compras') }}"
                        class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Compras</a>
                    </li>
                    <li>
                        <a href="{{ route('special') }}"
                        class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Especiales</a>
                    </li>
                    <li>
                        <a href="{{ route('seller.muestras') }}"
                        class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Muestras</a>
                    </li>
                    
                    @endrole

                    <li>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="w-full text-left text-base block px-4 py-2 hover:text-black hover:bg-stone-100">Cerrar
                            Sesion</button>
                    </li>
                </ul>
            </div>
            </div>

            <div class="mr-10 -mt-3" style="width: 2rem">
                @livewire('count-cart-quote')
            </div>
            <a href="#">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="bg-black">
                    <g clip-path="url(#clip0_15_159)">
                    <rect width="24" height="24" />
                    <path d="M9.5 19C8.89555 19 7.01237 19 5.61714 19C4.87375 19 4.39116 18.2177 4.72361 17.5528L5.57771 15.8446C5.85542 15.2892 6 14.6774 6 14.0564C6 13.2867 6 12.1434 6 11C6 9 7 5 12 5C17 5 18 9 18 11C18 12.1434 18 13.2867 18 14.0564C18 14.6774 18.1446 15.2892 18.4223 15.8446L19.2764 17.5528C19.6088 18.2177 19.1253 19 18.382 19H14.5M9.5 19C9.5 21 10.5 22 12 22C13.5 22 14.5 21 14.5 19M9.5 19C11.0621 19 14.5 19 14.5 19" stroke="#FFFFFF" stroke-linejoin="round"/>
                    <path d="M12 5V3" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_15_159">
                    <rect width="24" height="24" fill="none"/>
                    </clipPath>
                    </defs>
                </svg>
            </a>
        
        </div>
    </nav>
    <nav class="w-full flex justify-center py-2 px-4 md:px-12 items-center flex-wrap bg-white shadow-md mb-4" style="height: 50px;">
        <div class="w-full md:w-2/12 mb-2 md:mb-0">
            <a href="/catalogo">Catálogo</a>
        </div>
        <div class="w-full md:w-2/12 mb-2 md:mb-0">
            <a href="/catalogo">Promociones</a>
        </div>
        <div class="w-full md:w-2/12 mb-2 md:mb-0">
            <a href="/catalogo">Ofertas</a>
        </div>
    </nav>

    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:"
                data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>

                </svg>
                <span class="sr-only">Cerrar</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Esta seguro de que desea
                    salir del sitio?</h3>
                <a class=" bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 text-white"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Si, estoy seguro</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button data-modal-hide="popup-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover: dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancelar</button>
            </div>
        </div>
    </div>
    </div>
</div>


