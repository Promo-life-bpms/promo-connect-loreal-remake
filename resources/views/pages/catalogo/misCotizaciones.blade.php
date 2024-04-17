@extends('layouts.cotizador')

@section('content')
    
    <div class="container mx-auto w-full p-8">
    <style>
        tr:nth-child(even) {
        background-color: #fafafa;
        }
    </style>
        @php
            $totalGeneral = 0;
            if($quotes != null){
                foreach ($quotes as $quote){
                    $product = \App\Models\QuoteProducts::where('id', $quote->id)->get()->first();

                    $productImage = $product->firstImage;
                    $totalGeneral += intval($product->precio_total);

                }
            }
           
        @endphp

        @if(session('message'))
            <div class="bg-green-500 text-white p-4 mb-4">
                <p class="text-lg">¡Éxito! Se ha iniciado el proceso de compra de tu producto, puedes checar el proceso en la sección <b>MIS COMPRAS</b> .</p>
            </div>
        @endif
        <h1 class=" mt-8 text-2xl font-semibold mb-8"> Mis Cotizaciones</h1> 

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
                
            </div>
        
            <div class="w-1/2">
                
            </div>
        </div>


        <br>
        <div class="w-full">
            <table class="table-auto">
                <thead>
                    <tr class="bg-blue-900 text-white">
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
                            <td class="text-center"> <b>$ {{ number_format($product->precio_total, 2, '.', ',') }} </b>  </td>
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
                                    <button data-modal-target="oc-modal-{{ $quote->id }}" data-modal-toggle="oc-modal-{{ $quote->id }}" class="w-full bg-primary hover:bg-primary text-white font-bold p-2 rounded text-sm" type="button">
                                        Confirmar compra
                                    </button>
                                    
                                    <!-- Main modal -->
                                    <div id="oc-modal-{{ $quote->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <form method="POST" action="{{ route('compras.realizarcompra') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $quote->id }}">
                                                    <!-- Modal header -->
                                                    <div class="flex justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Orden de compra
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
                                                        Para poder continuar con el proceso de compra, ingrese el número de Orden de Compra
                                                        <br>
                                                        <input type="text" name="oc" id="oc" class="w-full" required>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button type="submit" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmar compra</button>
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
           
            <div class="flex justify-end">
                <div class="flex space-x-2 mt-2"> 
                {{ $quotes->links() }}
                </div>
            </div>
            
        </div>
        <br><br>
        
    </div>
@endsection
