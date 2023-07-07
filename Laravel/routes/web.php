<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Auth::routes();

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
    
    Route::get('/consultas', function () {
        return view('consults');
    })->name('consults');

    Route::post('/consultas', function (Request $request) {
        return '¡La consulta se ha enviado correctamente! Nos pondremos en contacto contigo pronto';
    })->name('consults_confirmation');

    Route::get('/nosotros', function (){
        return view('about');
    })->name('about');

});

//                           User Access.
Route::group(['middleware' => 'auth'], function(){
    Route::get('/reservations', [ReservationController::class, 'viewPay'])->name('reservations');
    
    Route::get('/buy/{titulo}', [MoviesController::class, 'find'])->name('movies.buy');

    Route::post('/register-pay', [ReservationController::class,  'registerPay'])->name('register-pay');

    //                       Flask Cominication.
    Route::post('/save-data', function (Request $request) {
        $data = $request->json()->all();
        print_r($data);
        return response()->json(['message' => 'Datos recibidos correctamente']);
    });
    
    Route::post('/cancel-data', function (Request $request) {
        $data = $request->json()->all();
        print_r($data);
        return response()->json(['message' => 'Datos recibidos correctamente']);
    });


    //                        Administration Panel.
    Route::group(['middleware' => 'admin'], function() {
        // Route for movies.
        Route::get('/admin/movie/', [MoviesController::class, 'res'])->name('movies.register');
        Route::post('/admin/movie', [MoviesController::class, 'registerOrUpdate'])->name('catalogue.rupdate');
        Route::delete('/admin/movie/{titulo}', [MoviesController::class, 'delete'])->name('catalogue.delete');
        
        // Routes for employees.
        Route::get('/admin/emp/', [EmployeeController::class, 'reg'])->name('emp.register');
        Route::post('/admin/emp', [EmployeeController::class, 'registerOrUpdate'])->name('emp.rupdate');
        Route::delete('/admin/emp/{nombres}', [EmployeeController::class, 'delete'])->name('emp.delete');
    
        // Routes for Users
        Route::get('/admin/users/', [UserController::class, 'reg'])->name('user.register');
        Route::post('/admin/users', [UserController::class, 'registerOrUpdate'])->name('user.rupdate');
        Route::delete('/admin/users/{nombres}', [UserController::class, 'delete'])->name('user.delete');
        
        // Router for Reservations.
        Route::get('/admin/reservations/', [ReservationController::class, 'reg'])->name('reser.register');
        Route::post('/admin/reservations', [ReservationController::class, 'registerOrUpdate'])->name('reser.rupdate');
        Route::delete('/admin/reservations/{nombres}', [ReservationController::class, 'delete'])->name('reser.delete');

        // If no Access returns this:
        Route::get('/unauthorized', function () {
            return 'Acceso no autorizado';
        })->name('unauthorized');
        
        Route::get('/admin', function() {
            return redirect()->route('movies.register');
        });
    
    });


});


