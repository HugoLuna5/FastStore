<?php

namespace App\Http\Controllers\Admin;

use App\Model\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $categorias  = Categoria::paginate(15);

        return view('tienda.admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        return view('tienda.admin.categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'nombre' => 'required|unique:categorias|max:255',
            'codigo' => 'required|unique:categorias',
            'descripcion' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('mensaje', 'Categoria agregada con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('tienda.admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'codigo' => 'required',
            'descripcion' => 'required',
        ]);

        $cat = Categoria::find($id);

        $cat->nombre = $request->nombre;
        $cat->codigo = $request->codigo;
        $cat->descripcion = $request->descripcion;

        if ($cat->update()){
        return redirect()->route('categorias.index')->with('mensaje', 'Categoria actualizada con exito');
        }

        return redirect()->route('categorias.edit')->with('mensaje', 'No se pudo actualizar la categoria');

    }


    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if ($cat != null){

            if ($cat->delete()){
                return redirect()->route('categorias.index')->with('mensaje', 'Categoria eliminada correctamente');
            }

        }

        return redirect()->route('categorias.index')->with('mensaje', 'Es posible que la categoria con este Id no exista');


    }
}
