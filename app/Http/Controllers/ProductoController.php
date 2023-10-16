<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

      $collection = $request->collect()->toArray();

       $keys = $request->keys();
       $noKeys = array_values($collection);
       $cont = count($collection);
       $productos = array();

        if ($request->all()) {

            for ($i=0; $i < $cont; $i++) {
                $productos[] = Producto::where($keys[$i],$noKeys[$i])->get();
            }

             return response()->json($productos);

        }else{

            $productoss = Producto::paginate(10)->all();
            return $productoss;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->categoria = $request->categoria;
        $producto->tags = $request->tags;
        $producto->url = $request->url;

        $producto->save();

        $data = [
            'messege' => 'Producto creado satisfactoriamente',
            'producto' => $producto
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {

        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {


        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->categoria = $request->categoria;
        $producto->tags = $request->tags;
        $producto->url = $request->url;

        $producto->save();

        $data = [
            'messege' => 'Producto modificado satisfactoriamente',
            'producto' => $producto
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        $data = [
            'messege' => 'Producto eliminado satisfactoriamente',
            'producto' => $producto
        ];

        return response()->json($data);

    }

    public function cantidadResultados(Request $request)
    {

        $collection = $request->collect();

        $keys = $request->keys();
       // $noKeys = array_values($collection);
        $cont = 0;
        $productos = array();

         if ($request->all()) {
            foreach ($collection as $key => $value) {

                $productos = Producto::where($keys[$cont],$value)->get();
                $cont++;
            }
         }

        return count($productos);

    }

    public function venderArticulo(Producto $producto)
    {
        if($producto){

            if ($producto->stock != 0) {
                $producto->stock = ($producto->stock) -1;
                $producto->save();
                $data = [
                    'messege' => 'Producto vendido satisfactoriamente',
                    'producto' => $producto->stock
                ];
                return $data;
            }else{

                $data = [
                    'messege' => 'El producto esta agotado',
                    'producto' => $producto
                ];
                return $data;
            }

        }else{
           return "Seleccione un producto.";
        }
    }

}
