<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        // Actualizar la instancia de usuario en sesión por si Laravel no lo hace automáticamente
        auth()->setUser($user);

        return redirect()->route('settings.index')->with('success', 'Nombre de usuario actualizado correctamente.');
    }
}
