<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NewUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $usuarios = User::paginate(15);

        return view('tienda.admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        return view('tienda.admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'direction' => 'required',
            'tipo' => 'required',
            'active' => 'required',
        ]);
        $pass = Str::random(10);
        $request['password'] = Hash::make($pass);

        User::create($request->all());
        $objDemo = new \stdClass();
        $objDemo->demo_one = $request->email;
        $objDemo->demo_two = $pass;
        $objDemo->message = "Tu cuenta en FastStore ha sido creada exitosamente.";
        $objDemo->sender = 'megah@terciajcl.com';
        $objDemo->receiver = $request->email;
        Mail::to($request->email)->send(new NewUser($objDemo));
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario agregado con exito');


    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('tienda.admin.usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('tienda.admin.usuarios.edit', compact('user'));

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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'direction' => 'required',
            'tipo' => 'required',
        ]);
        $user = User::find($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->direction = $request->direction;
        $user->tipo = $request->tipo;

        if ($user->update()){
            return redirect()->route('usuarios.index')->with('mensaje', 'Usuario actualizado con exito');

        }
        return redirect()->route('usuarios.edit', $user->idproducto)->with('mensaje', 'No se pudo actualizar el usuario');


    }

    public function resetPassword($id){
        $pass = Str::random(10);

        $user = User::find($id);
        $user->password = Hash::make($pass);
        $objDemo = new \stdClass();
        $objDemo->demo_one = $user->email;
        $objDemo->demo_two = $pass;
        $objDemo->message = "Se ha restablecido la contraseña de tu cuenta de FastStore.";
        $objDemo->sender = 'megah@terciajcl.com';
        $objDemo->receiver = $user->email;
        Mail::to($user->email)->send(new NewUser($objDemo));
        return redirect()->route('usuarios.index')->with('mensaje', 'Contraseña restablecida con exito');

    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user != null){

            if ($user->delete()) {
                return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado correctamente');

            }
        }
        return redirect()->route('usuarios.index')->with('mensaje', 'Es posible que el usuario con este Id no exista');


    }
}
