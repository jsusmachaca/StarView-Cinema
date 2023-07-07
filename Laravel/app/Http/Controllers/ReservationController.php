<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function registerPay(Request $request)
    {
        $user = Auth::user();

        $titulo = $request->input('titulo');
        $cantidadBoletos = $request->input('cantidad_boletos');

        $reservacion = new Reservation();
        $reservacion->nombre = $user->name;
        $reservacion->pelicula = $titulo;
        $reservacion->cantidad_boletos = $cantidadBoletos;
        $reservacion->save();

        return redirect()->back()->with('success', 'Compra registrada correctamente');
    }

    public function viewPay()
    {
        $user = Auth::user();
        $reservations = $user->reservations;
        
        return view('reservations', compact('user', 'reservations'));
    }

    // CRUD FUNCTIONS.
    public function reg()
    {
        $reser = Reservation::all();
        return view('admin/reservations', compact('reser'));
    }

    public function registerOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'pelicula' => 'required',
            'cantidad_boletos' => 'required',
            'created_at' => 'required'
        ]);

        $nombres = $validatedData['nombre'];
        $existingReser = Reservation::where('nombre', $nombres)->first();

        if ($existingReser) {
            $existingReser->update($validatedData);

        } else {
            Reservation::create($validatedData);
        }
        return redirect()->route('reser.register');
    }
    
    public function delete($nombres)
    {
        $decode = urldecode($nombres);
        $reser = Reservation::where('nombre', $decode)->firstOrFail();
        $reser->delete();
        return redirect()->route('reser.register');
    }
    
}
