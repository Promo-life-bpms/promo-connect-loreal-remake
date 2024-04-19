<div>
    <a class="cart-icon nav-link text-white hover:text-secondary " aria-current="page" href="{{ route('cotizacion') }}" data-toggle="tooltip"
        data-placement="bottom" title="Cotizacion Actual" >
        <div class="ml-2 mr-2 mt-4">
            @if ($total > 0)
                <span class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-secondary border-1  rounded-full -top-2 -right-2" >{{ $total }}</span>
            @endif
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2.75949C1 2.34004 1.3467 2 1.77437 2H2.53267C3.96462 2 5.17248 3.0458 5.35009 4.4394L5.55544 6.05063H20.1928C21.2974 6.05063 22.1435 7.01422 21.9796 8.08567L20.8726 15.3245C20.6641 16.6877 19.4701 17.6962 18.0646 17.6962H8.19891C6.79344 17.6962 5.59946 16.6877 5.39098 15.3245L4.10604 6.92279L4.10345 6.90433L3.81331 4.6278C3.73258 3.99435 3.18355 3.51899 2.53267 3.51899H1.77437C1.3467 3.51899 1 3.17895 1 2.75949ZM5.77103 7.56962L6.92258 15.0992C7.01734 15.7188 7.56006 16.1772 8.19891 16.1772H18.0646C18.7035 16.1772 19.2462 15.7188 19.341 15.0992L20.448 7.86034C20.4714 7.70727 20.3506 7.56962 20.1928 7.56962H5.77103Z" fill="#FFFFFF"/>
                <path d="M19.3267 20.9873C19.3267 21.5466 18.8644 22 18.2942 22C17.724 22 17.2617 21.5466 17.2617 20.9873C17.2617 20.4281 17.724 19.9747 18.2942 19.9747C18.8644 19.9747 19.3267 20.4281 19.3267 20.9873Z" fill="#FFFFFF"/>
                <path d="M9.0018 20.9873C9.0018 21.5466 8.53954 22 7.96931 22C7.39908 22 6.93682 21.5466 6.93682 20.9873C6.93682 20.4281 7.39908 19.9747 7.96931 19.9747C8.53954 19.9747 9.0018 20.4281 9.0018 20.9873Z" fill="#FFFFFF"/>
            </svg>
        </div>

    </a>
    <style>
        .cart-icon .badge {
            position: relative;
            top: 20px;
            right: 10px;
        }

        .cart-icon {
            position: relative;
        }

        @media(min-width:768px) {
            .cart-icon .badge {
                position: initial;
            }
        }
    </style>
</div>
