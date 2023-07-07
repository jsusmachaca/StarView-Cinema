<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeeController extends Controller
{    
    public function reg()
    {
        $emp = Employees::all();
        return view('admin/employees', compact('emp'));
    }

    public function registerOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required',
            'apelllidos' => 'required',
            'id_emp' => 'required',
            'dni' => 'required',
            'sueldo' => 'required',
            'horas_trabajo' => 'required',
            'telefono' => 'required'
        ]);

        $nombres = $validatedData['nombres'];
        $existingMovie = Employees::where('nombres', $nombres)->first();

        if ($existingMovie) {
            $existingMovie->update($validatedData);

        } else {
            Employees::create($validatedData);
        }
        return redirect()->route('emp.register');
    }
    
    public function delete($nombres)
    {
        $decode = urldecode($nombres);
        $emp = Employees::where('nombres', $decode)->firstOrFail();
        $emp->delete();
        return redirect()->route('emp.register');
    }
    
}
