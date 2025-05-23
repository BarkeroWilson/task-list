<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnArgument;
use Illuminate\Http\Response;
use App\Models\Task;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
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
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');


//EDIT THE FORM
Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');


//SHOWING FROM THE DATABASE
Route::get('/tasks/{task}', function (Task $task) {

    return view('show',
    ['task' => $task
]);

})->name('tasks.show');


//UPDATING THE DATABASE
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task -> update($request -> validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        -> with('success', 'Task Updated Successfullyy!');

})->name('tasks.update');



//  ADDING TO THE DATABASE
Route::post('/tasks', function (TaskRequest $request) {

    $task =Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        -> with('success', 'Task Created Successfullyy!');

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
