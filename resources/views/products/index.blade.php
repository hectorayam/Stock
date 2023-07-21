@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <button type="button" class="text-white btn-create w-44 rounded-md ">
                <a href="{{route('product.create')}}">crear nuevo producto</a>
                </button>
            
                <div class="col-md-12">
                    <div class="card bg-teal-300">
                        <div class="card-header   bg-techno">
                            <h4 class="card-title"></h4>
                            <p class="card-category text-black">Productos</p>
                        </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg ">
        <div class="table-responsive">
        <table class= "text-sm text-left text-gray-500 dark:text-gray-400 table-striped table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        SKU
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nombre del producto
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Estado
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$product->id}}
                    </td>
                    <td class="py-4 px-6">
                        {{$product->sku}}
                    </td>
                    <td class="py-4 px-6">
                        {{$product->nombre_producto}}
                    </td>
                    <td class="py-4 px-6">
                        @if($product->estado == "1")
                       <span class="badge span-stock"> Disponible</span>
                        @elseif($product->estado == "0")
                        <span class="badge span-no-stock">  No Disponible </span>
                        @endif
                        
                    </td>
                    
                    <td class="py-4 px-6">
                        
                                                
                            <a href="{{route('product.show',$product->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Examinar"><i class="material-icons">library_books</i></a>
                            
                          
                             
                               <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning " ata-toggle="tooltip" data-placement="bottom" title="Editar"><i class="  material-icons">edit</i></a>
                            
                            
                             
                             <form action="{{route('product.delete',$product->id)}}" method="POST" style="display: inline-block" onsubmit="return confirm('¿Seguro?')">
                               @csrf 
                               @method('DELETE')
                             <button class="btn btn-danger" type="submit">
                             <i class=" material-icons" data-toggle="tooltip" data-placement="bottom" title="Eliminar">close</i>
                             </button>
                             </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
        </div>
    </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
       
@endsection