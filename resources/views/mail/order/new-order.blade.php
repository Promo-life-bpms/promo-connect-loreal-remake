@component('mail::message')

# Confirmación de orden de compra - Loreal

---

[BH Trademarket S.A. de C.V.](https://trademarket.com.mx/)
San Andrés Atoto 155A Naucalpan de Juárez, Méx. C.P. 53550  
Tel. +52(55) 30395106

Fecha: **{{ $date }}**

---

    @php

        $quoteTechnique = \App\Models\QuoteTechniques::where('quotes_id',$quotes->id)->get()->last();

        $product = \App\Models\QuoteProducts::where('id', $quotes->id)->get()->last();
        $productData = json_decode($product->product);

        $productName = isset($productData->name) ? $productData->name : 'Nombre no disponible';
            
    @endphp

# Se ha realizado la orden de compra para la cotización: 

# **SQ-{{ $quotes->id }}**

## Descripción del pedido
{{ $productName }}

## Técnica de Personalización
| Descripción                      | {{ isset($quotes->currentQuotesTechniques->technique) ? $quotes->currentQuotesTechniques->technique : '' }} |
|----------------------------------|-------------------------------------------------------------------------------------------------------------------|
| Material                         | {{ isset($quoteTechnique->material) ? $quoteTechnique->material : '' }}                                           |
| Tamaño                           | {{ isset($quoteTechnique->size) ? $quoteTechnique->size : '' }}                                                   |

**Tiempo de Entrega:** 10 días hábiles

## Detalles del Producto
| Cantidad         | Precio Unitario  | Precio total      |
|------------------|------------------|-------------------|
| {{ $product->cantidad }} piezas | {{ $product->precio_unitario }} | {{ $product->precio_total }} |

---

---
 
- Condiciones de pago acordadas en el contrato
- Precios unitarios mostrados antes de IVA
- Precios mostrados en pesos mexicanos (MXN)
- Una vez entregada la orden de compra y/o muestra física aprobada, la entrega de los productos se realizará en un plazo estimado de 10 días hábiles.
- Antes de generar la orden de compra, le invitamos a verificar la disponibilidad actual de stock para garantizar la prontitud en el cumplimiento de su pedido.

@endcomponent