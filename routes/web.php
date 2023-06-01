<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('frontend.home');
})->name('home');;

// Frontend Routes 

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/services', function () {
    return view('frontend.services');
})->name('services');

Route::get('/projects', function () {
    return view('frontend.projects');
})->name('projects');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/features', function () {
    return view('frontend.features');
})->name('features');

Route::get('/team', function () {
    return view('frontend.ourteam');
})->name('team');

Route::get('/faq', function () {
    return view('frontend.faq');
})->name('faq');

Route::get('/testimonial', function () {
    return view('frontend.testimonials');
})->name('testimonial');


Route::post('/contact-form', [App\Http\Controllers\Frontend\ContactController::class, 'storeContactForm'])->name('contact-form.store');

