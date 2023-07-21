@extends('layouts.app')

@section('content')
<div class="content list ">
    <div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-teal-300">
    <div class="container px-5 py-24 mx-auto ">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
       
                           
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">Nombre {{$product->nombre_producto}}</h1>
          <div class="flex mb-4">
            <h2 class="text-sm title-font text-gray-500 tracking-widest text-black">SKU: {{$product->sku}}</h2>

            <br>

          </div>
          
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            @if($product->estado == "1")
            Estado: Disponible
             @elseif($product->estado == "0")
             Estado: No Disponible
             @endif
             <br>
            Cantidad: {{$product->cantidad}}
            <br>
            Precio: ${{$product->precio}}
            
          </div>
        </div>
      </div>
    </div>
  </div>
      
@endsection