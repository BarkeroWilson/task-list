<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnArgument;
use Illuminate\Http\Response;
use App\Models\Task;
use Termwind\Components\Dd;
use Illuminate\Http\Request;

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

Route::view('/tasks/create', 'create')
    ->name('task.create');

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()-> where('completed', true)->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => Task::findOrFail($id)]);

})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');


Route::fallback(function (){
    return 'THIS IS 404 PAGE MF!';
});



// OLD CODE

// Route::get('/', function () {
//     return view('index', [
//         'name' => 'wilson'
//     ]);
// });

// Route::get('/xxxx', function(){
//     return 'my nibba';
// })->name('hello');

// Route::get('/hallo', function(){
//     return redirect()->route('hello');
// });

// route::get('/greet/{name}', function($name){
//     return 'hello ' . $name . ' ?';
// });
