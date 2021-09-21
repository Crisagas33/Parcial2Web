<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //vista  index
        $datos['productos'] = Productos::paginate(5); 
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vista create
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar Campos
        $campos = [
            'COD' => 'required|string|max:5',
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'Precio' => 'required|string|max:9',
            'Cantidad' => 'required|string|max:9',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        //Guardar Datos
        // $datosProducto = $request->all();
        $datosProducto = $request->except('_token');
        Productos::insert($datosProducto);

        // return response()->json($datosProducto);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //vista editar producto
        $productos = Productos::findOrFail($id);
        return view('producto.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar productos
        $datosProducto = $request->except(['_token','_method']);
        Productos::where('id','=',$id)->update($datosProducto);
        $productos = Productos::findOrFail($id);
        // return view('producto.edit', compact('productos'));
        return redirect('producto')->with('mensaje', 'Producto actualizado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar registros
        Productos::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto eliminado correctamente');
    }
}
