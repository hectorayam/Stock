@extends('layouts.app')

@section('content')

<div class = " flex justify-center">
    <form method="POST" action="{{route('product.store')}}" class="bg-white rounded-md shadow-2xl p-5 user  lg:w-1/2 " enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
      <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
        <input class=" pl-2 w-1/2 outline-none border-none" type="text" name="sku" placeholder="SKU" value ="{{ old('sku') }}"/>
      </div>
      <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
        <input class=" pl-2 w-1/2 outline-none border-none" type="text" name="nombre_producto" placeholder="Nombre del producto"  />
      </div>
      <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
        <input class="pl-2  outline-none border-none "type="number" step="any" name="cantidad"  placeholder="cantidad" />
      </div>
      <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
        <input class="pl-2  outline-none border-none "type="number" step="any" name="precio"  placeholder="precio" />
      </div>
    <div>
        <ul class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="vue-checkbox" type="checkbox" name="estado" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="vue-checkbox"  class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Disponible</label>
                </div>
            </li>
        </ul>
    </div>
<div class=" z-10 top-0 w-full h-1/2 static">
   
    <div class=" z-10 top-0 flex justify-center ">
        <button type="submit" class=" block w-1/2 bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Agregar</button>
    </div>
</div>



</form>     
</div>
@endsection