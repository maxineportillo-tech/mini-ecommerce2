<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('settings.index', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('settings.index')->with('success', 'Información del usuario actualizada.');
    }
}
