<?php

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnArgument;

Route::get('/', function () {
    return 'Main Page';
});

Route::get('/xxxx', function(){
    return 'my nibba';
})->name('hello');

Route::get('/hallo', function(){
    return redirect()->route('hello');
});

route::get('/greet/{name}', function($name){
    return 'hello ' . $name . ' ?';
});

route::fallback(function (){
    return 'THIS IS 404 PAGE MF!';
});
