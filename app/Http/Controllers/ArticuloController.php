<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Category;

class ArticuloController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
       return view('articulos.index')->with('articulos',$articulos);
    // $categories = Category::all();
    // return view('posts.index', compact('categories'));
    // return view('posts.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();
        $articulos->codigo = $request->get('codigo'); 
        $articulos->descripcion = $request->get('descripcion'); 
        $articulos->cantidad = $request->get('cantidad'); 
        $articulos->precio = $request->get('precio');  

        $articulos->save();         

        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        // $articulo = Articulo::find($articulo);
        // return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $articulo = Articulo::find($articulo);
        $articulo->codigo = $request->get('codigo'); 
        $articulo->descripcion = $request->get('descripcion'); 
        $articulo->cantidad = $request->get('cantidad'); 
        $articulo->precio = $request->get('precio');  

        $articulo->save();         

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo = Articulo::find($articulo);
        $articulo->delete();
        return redirect('/articulos');
    }
}
