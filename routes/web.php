<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Models\Notes;

//allowed to access without Login

// for showing
Route::get('/auth/register',[AuthController::class,'showRegister'])->name('auth.register');
Route::get('/auth/login',[AuthController::class,'showLogin'])->name('auth.login');

// for submiting the form
Route::post('/auth/register',[AuthController::class,'register'])->name('register');
Route::post('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/',[AuthController::class,'logout'])->name('logout');



//Protected Routes (Need Login)
Route::middleware(['IsLogin'])->group(function (){

  Route::get('/', function () {
    return view('home');
   });

   Route::get('pages/edit/{id}',function($id){
    $note = Notes::find($id);

    return view('/pages/edit',['note' => $note]);
  });

  Route::get('/pages/create',function(){
    return view('/pages/create')             ;
 });

 Route::get('/myNote',[NotesController::class,'show'])->name('myNote');
 Route::post('/myNote',[NotesController::class,'store'])->name('create');
 Route::get('/pages/edit',[NotesController::class,'edit'])->name('note.edit');
 Route::put('/pages/update/{id}',[NotesController::class,'update'])->name('note.update');
 Route::delete('/note/{id}',[NotesController::class, 'destroy'])->name('note.destroy');
});



