<?php

namespace App\Http\Controllers\Admin;

use App\Model\Categoria;
use App\Model\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $productos = Producto::orderBy('idproducto', 'desc')->paginate(15);
        return view('tienda.admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('tienda.admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'codigo' => 'required',
            'descripcion' => 'required',
            'img' => 'required|image',
            'color' => 'required',
            'precio' => 'required',
            'idestado' => 'required',
            'idcategoria' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $request['imagen'] = $name;
            Producto::create($request->all());
            return redirect()->route('productos.index')->with('mensaje', 'Producto agregado con exito');

        }

        return redirect()->route('productos.index')->with('mensaje', 'Ocurrio un error al agregar el producto');


    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $producto = Producto::find($id)->last();
        if ($producto != null) {
            return view('tienda.admin.productos.show', compact('producto'));
        }

        return redirect()->route('productos.index')->with('mensaje', 'Producto no encontrado');

    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $producto = Producto::find($id)->last();
        $categorias = Categoria::all();
        return view('tienda.admin.productos.edit', compact('producto', 'categorias'));
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
            'color' => 'required',
            'precio' => 'required',
            'idestado' => 'required',
            'idcategoria' => 'required',
        ]);


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $request['imagen'] = $name;
        }
        $producto = Producto::find($id)->last();

        if (isset($request['imagen'])) {
            $producto->imagen = $request['imagen'];
        }
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->color = $request->color;
        $producto->precio = $request->precio;
        $producto->idestado = $request->idestado;
        $producto->idcategoria = $request->idcategoria;

        if ($producto->update()){
            return redirect()->route('productos.index')->with('mensaje', 'Producto actualizado con exito');

        }
        return redirect()->route('productos.edit', $producto->idproducto)->with('mensaje', 'No se pudo actualizar el producto');

    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $prod = Producto::find($id)->last();

        if ($prod != null) {

            if ($prod->delete()) {
                return redirect()->route('productos.index')->with('mensaje', 'Producto eliminado correctamente');

            }
        }
        return redirect()->route('productos.index')->with('mensaje', 'Es posible que el producti con este Id no exista');

    }
}
