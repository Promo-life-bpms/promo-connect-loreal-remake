@extends('layouts.cotizador')

@section('content')
    
    <div class="container mx-auto w-full p-8">
    <style>
        tr:nth-child(even) {
        background-color: #fafafa;
        }
    </style>
        @php
            $total_descuento = 0;
            $totalGeneral = 0;

            if($quotes != null){
                foreach ($quotes as $quote){
                    $product = \App\Models\QuoteProducts::where('id', $quote->id)->get()->first();

                    $productImage = $product->firstImage;

                    $totalGeneral += intval($product->precio_total);
                    $producto_decode = json_decode($product->product);
                    if(isset($producto_decode->discount)){
                       
                        $total_descuento = $total_descuento + $producto_decode->discount;
                    }
                    
                }
            }

            
           
        @endphp

        @if(session('message'))
            <div class="bg-green-500 text-white p-4 mb-4">
                <p class="text-lg">¡Éxito! tu cotización ha sido subida correctamente .</p>
            </div>
        @endif
        <div class="font-semibold text-slate-700 py-8 flex items-center space-x-2">
            <a class="text-secondary" href="/">Inicio</a>
            <p class="text-secondary"> / </p>
            <a class="text-secondary" href="#">Mis cotizaciones</a>
        </div>

        <div class="flex">
            <div class="w-1/2 mr-8">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold mb-2">N° de cotización:</h2>
                    <p class="text-bold text-4xl">{{count($quotes) }}</p>
                </div>
            </div>
        
            <div class="w-1/2">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold mb-2">Total: </h2>
                    <p class="text-bold text-4xl">$ {{ number_format($totalGeneral, 2, '.', ',') }}</p>
                </div>
            </div>
        
            <div class="w-1/2">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-bold mb-2">Total ahorrado: </h2>
                    <p class="text-bold text-4xl">$ {{ number_format($total_descuento,2) }}</p>
                </div>
            </div>
        
            <div class="w-1/2">
                
            </div>
        </div>

        <br>

      

        <div class="w-full">
            <table class="table-auto">
                <thead>
                    <tr class="bg-primary text-white">
                        <th style="width:5%;">Cotizacion</th>
                        <th style="width:5%;">Logo</th>
                        <th style="width:10%;">Producto</th>
                        <th style="width:10%;">Tecnica</th>
                        <th style="width:20%;">Detalles</th>
                        <th style="width:10%;">Tiempo de entrega</th>
                        <th style="width:10%;">Cantidad</th>
                        <th style="width:10%;">Precio unitario</th>
                        <th style="width:10%;">Total</th>
                        <th style="width:10%;"></th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($quotes as $quote)
                        @php
                           
                            $product = \App\Models\QuoteProducts::where('id', $quote->id)->get()->last();
                            $productData = json_decode($product->product);

                            $productName = isset($productData->name) ? $productData->name : 'Nombre no disponible';
                            $totalGeneral += intval($product->precio_total);

                            $quoteTechnique = optional(\App\Models\QuoteTechniques::where('quotes_id', $quote->id)->latest()->first());

                            $quoteInformation = App\Models\QuoteInformation::where('id', $quote->id)->first();

                            $productDB = \App\Models\Catalogo\Product::where('id',$productData->id)->get()->first();
                            $productImage = $productDB->firstImage;

                            $producto_decode = json_decode($product->product);

                        @endphp
                        
                        <tr class="border">
                            <td class="text-center"><b>SQ-{{$quote->id}}</b></td>
                            <td class="text-center">
                                @if($quote->logo == null || $quote->logo == '')
                                    <img src="{{$productImage->image_url}}" alt="" style="width: 100px;object-fit: contain;">
                                @else
                                    <img class="" src="/storage/logos/{{$quote->logo}}" alt="logo" style="width: 100px;object-fit: contain;">
                                @endif
                            </td>
                            <td class="text-center">{{$productName }}</td>
                            <td class="text-center">{{isset($quoteTechnique->technique)? $quoteTechnique->technique : ''}}</td>
                            <td>
                                <p><b>Material: </b>  {{isset($quoteTechnique->material)? $quoteTechnique->material: ''}} </p>
                                <p><b>Tamaño: </b>  {{isset($quoteTechnique->size)?  $quoteTechnique->size: '' }} </p>
                              </td>
                            <td class="text-center">{{ $product->dias_entrega}} dias</td>
                            <td class="text-center"> {{ $product->cantidad}} piezas</td>
                            <td class="text-center"> <b>$ {{ $product->precio_unitario}} </b>   </td>
                            <td class="text-center"> <b>
                                $ {{ number_format($product->precio_total, 2, '.', ',') }} </b> 
                                <p class="text-green-700 text-xs mt-1">
                                    
                                    @if(isset($producto_decode->discount))
                                        Ahorro: $ {{ number_format(floatval($producto_decode->discount),2)  }}
                                    @endif
                               
                                    </p>
                             </td>
                            <td class="text-center"> 
                                <form method="POST" action="{{ route('downloadPDF') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $quote->id }}">
                                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-600 text-white font-bold p-2 rounded text-sm">
                                        Descargar cotizacion
                                    </button>
                                </form>


                                @if($quoteInformation && $quoteInformation->information == 'Info')
                                    <!-- Modal toggle -->

                                    @if(isset($productData->oc_file))
                                        <a class="mb-2 text-gay-500 hover:text-gray-700 underline" target="__blank" href="{{$productData->oc_file}}">Ver archivo</a>
                                    @else
                                        <button data-modal-target="oc-modal-{{ $quote->id }}" data-modal-toggle="oc-modal-{{ $quote->id }}" class="w-full bg-primary hover:bg-primary text-white font-bold p-2 rounded text-sm" type="button">
                                            Subir orden de compra
                                        </button>
                                    @endif
                                   
                                    <!-- Main modal -->
                                    <div id="oc-modal-{{ $quote->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <form method="POST" action="{{ route('compras.subirOrden') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $quote->id }}">
                                                    <!-- Modal header -->
                                                    <div class="flex justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Subir orden de compra
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="oc-modal-{{ $quote->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4 text-left">
                                                        <p>Sube tu orden de compra en formato <b>PDF</b>, esto nos permitirá verificar los detalles de tu solicitud y asegurarnos de que todo esté correcto.</p>
                                                        <input type="file" name="file" id="file" accept="application/pdf" required>
                                                    </div>  
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button type="submit" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Subir archivo</button>
                                                        <button data-modal-hide="oc-modal-{{ $quote->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
            <style>
                .pagination-links ul {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 0.5rem;
                }
            
                .pagination-links ul li {
                    display: inline-block;
                }

                .page-item .active{
                    background-color: red;
                }
            </style>
            
            <div class="flex justify-end">
                <div class="pagination-links">
                    {{ $quotes->links() }}
                </div>
            </div>
            
        </div>
        <br><br>
        
    </div>
@endsection
