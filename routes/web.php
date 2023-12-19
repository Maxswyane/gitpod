<?php

use Illuminate\Support\Facades\Route;
use App\Models\About;
use App\Models\Contact;

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

Route::get('/', function () {
   //$about = About::all();
    $about = About::orderBy('id', 'desc')->first();
    $sobre = $about->toArray();
    //dd($sobre);
    $contact = Contact::orderBy('id', 'desc')->first();
    $contato = $contact->toArray();
    //dd($contato);

    return view('site.index', array('sobre'=> $sobre), array('contato'=> $contato));
});
