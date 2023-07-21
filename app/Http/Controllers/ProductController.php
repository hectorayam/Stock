<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all()->except('cantidad,precio');

        return view('products.index',compact('products'));
    }
    
    

    public function create(){

        return view('products.create');
        
    }

    public function store(Request $request){
        $request->validate([
            'sku' => 'required|max:4|regex:/^[0-9\-]+$/',
            'nombre_producto' => 'required|max:60',
            'cantidad' => 'min:1|max:999999',
            'precio' => 'required|numeric|min:0.01|max:999999',

        ],[
            'sku.required'=> 'El campo sku no debe estar vacio',
            'nombre_producto.required'=> 'El campo nombre del producto  no debe estar vacio',
            'precio.required'=> 'El campo precio  no debe estar vacio',
            'sku.regex'=> 'SKU no permite letras',
            'sku.max'=> 'SKU solo permite 4 carateres como maximo',
            'nombre_producto.max'=> 'Nombre del producto solo permite 60 carateres como maximo',
            'cantidad.min'=> 'Debe haber por lo menos 1 producto en stock',



        ]);
        if($request->input('estado')==true){
            $estatus = "1";
        }else{
            $estatus ="0";
        }
        Product::create([
            'sku' => $request->sku,
            'nombre_producto' =>$request->nombre_producto,
            'cantidad' =>$request->cantidad,
            'precio' => $request->precio,
            'estado'=> $estatus,
            ]);

            return redirect()->route('product.index');

    }

    public function show($id){
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function edit(Product $product){

      
        return view('products.edit', compact('product'));

    }

    
    public function update(Request $request, Product $product){
        $request->validate([
           'sku' => 'required|max:4|regex:/^[0-9\-]+$/',
            'nombre_producto' => 'required|max:60',
            'cantidad' => 'min:1|max:999999',
            'precio' => 'required|numeric|min:0.01|max:999999',

        ],[
            'sku.required'=> 'El campo sku no debe estar vacio',
            'nombre_producto.required'=> 'El campo nombre del producto  no debe estar vacio',
            'precio.required'=> 'El campo precio  no debe estar vacio',
            'sku.regex'=> 'SKU no permite letras',
            'sku.max'=> 'SKU solo permite 4 carateres como maximo',
            'nombre_producto.max'=> 'Nombre del producto solo permite 60 carateres como maximo',
            'cantidad.min'=> 'Debe haber por lo menos 1 producto en stock',
        ]);
        $product->sku = $request->sku;
        $product->nombre_producto = $request->nombre_producto;
        $product->cantidad = $request->cantidad;
        $product->precio = $request->precio;
        if($request->input('estado')==true){
            $product->estado = "1";
        }else{
            $product->estado ="0";
        }
      $product->update();
    
      return redirect()->route('product.index');

    }

    
    public function delete(Product $product){
        {
            $product->delete();

            return back();
        }
    }
}
