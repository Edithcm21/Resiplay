<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios= User::all();
        return view('views_admin.users',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        // return redirect()->route('admin.usuarios');
                
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:40',
                'correo' => 'required|string|email|unique:users,email|max:100',
                'password' => 'required|string|min:8',
                'rol' => 'required|in:admin,capturista|max:10', // Asegura que el rol sea uno de los valores permitidos
            ]);
            
            // Crear el usuario
            $user = new User();
            $user->name =$request->nombre;
            $user->email =$request->correo;
            $user->password = Hash::make($request->password);
            $user->rol = $request->rol;
            $user->save();
            return redirect()->route('admin.usuarios')->with('success', 'Usuario creado correctamente.');

            }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al crear usuario: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return redirect()->route('admin.usuarios')->with('error','Ocurrió un error al crear el usuario. Por favor, inténtalo de nuevo.');
            }
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario= User::findOrFail($id);
        $usuarios= User::all();
        return view('views_admin.users',compact('usuarios','usuario'));
        
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'modalName' => 'required|string|max:255',
                'modalCorreo' => 'required|string|email',
                'modalRol' => 'required|in:admin,capturista', // Asegura que el rol sea uno de los valores permitidos
            ]);
            
            $user=User::findOrFail($id);
            $user->name =$request->modalName;
            $user->email =$request->modalCorreo;
            $user->rol = $request->modalRol;
            if($request->modalPassword !=''){
                $request->validate([
                    'modalPassword' => 'required|string|min:8',
                ]);
                $user->password = Hash::make($request->modalPassword);
            }
            
            $user->save();
            return redirect()->route('admin.usuarios')->with('success','Usuario actualizado correctamente');

        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar usuario: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return redirect()->route('admin.usuarios')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');
            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::destroy($id);
            return redirect()->route('admin.usuarios')->with('success','Registro eliminado');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar usuario: ' . $e->getMessage());
            return redirect()->route('admin.usuarios')->with('error','Ocurrió un error al eliminar registro');
        }  
    }

    public function logout( Request $request){
        try {
            if(Auth::check()){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect('/');
        }
    }
        


    public function perfilEdit(){
    return view('views_admin.perfilEdit');
}
public function perfilEditc(){
    return view('views_capturista.perfilEdit');
}

public function perfilUpdate(Request $request) {
    try{
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8'
        ]);
    
        $user->name =$request->nombre;
        $user->email =$request->correo;
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return Auth::user()->rol == 'admin' 
        ? redirect()->route('admin.perfil.edit')->with('success','Datos actualizados correctamente')
        : redirect()->route('capturista.perfil.edit')->with('success','Datos actualizados correctamente');

    }catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al actualizar los datos: ' . $e->getMessage());
            // Redireccionar con un mensaje de error
            return Auth::user()->rol == 'admin' 
            ? redirect()->route('admin.perfil.edit')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
            : redirect()->route('capturista.perfil.edit')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');
        }  
}


}
