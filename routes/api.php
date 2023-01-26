<?php

use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\ExperienceController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::controller(AboutController::class)->group(function(){
    Route::get('edit_about', 'edit_about');
    Route::post('update_about/{id}', 'update_about');
});

Route::controller(ServiceController::class)->group(function(){
    Route::get('get_all_service', 'get_all_service');
    Route::post('/create_service', 'create_service');
    Route::post('/upate_service/{id}', 'update_service');
    Route::get('/delete_service/{id}', 'delete_service');
});

Route::controller(SkillController::class)->group(function(){
    Route::get('get_all_skill', 'get_all_skill');
    Route::post('create_skill', 'create_skill');
    Route::post('update_skill/{id}', 'update_skill');
    Route::delete('/delete_skill/{id}', 'delete_skill');
});

Route::controller(EducationController::class)->group(function(){
    Route::get('/get_all_education', 'get_all_education');
    Route::post('/create_education', 'create_education');
    Route::post('/update_education/{id}', 'update_education');
    Route::delete('/delete_education/{id}', 'delete_education');
});

Route::controller(ExperienceController::class)->group(function(){
    Route::get('/get_all_experience', 'get_all_experience');
    Route::post('/create_experience', 'create_experience');
    Route::put('/update_experience/{id}', 'update_experience');
    Route::delete('/delete_experience/{id}', 'delete_experience');
});

Route::controller(ProjectController::class)->group(function(){
    Route::get('/get_all_project', 'get_all_project');
    Route::post('/add_project', 'add_project');
    Route::get('/get_edit_project/{id}', 'get_edit_project');
    Route::put('/update_project/{id}', 'update_project');
    Route::delete('/delete_project/{id}', 'delete_project');
});

Route::controller(TestimonialController::class)->group(function(){
    Route::get('/get_all_testimonial', 'get_all_testimonial');
    Route::post('/add_testimonial', 'add_testimonial');
    Route::get('/get_edit_testimonial/{id}', 'get_edit_testimonial');
    Route::put('/update_testimonial/{id}', 'update_testimonial');
    Route::delete('/delete_testimonial/{id}', 'delete_testimonial');
});

Route::controller(MessageController::class)->group(function(){
    Route::get('/get_all_message', 'get_all_message');
    Route::put('/change_status/{id}', 'change_status');
    Route::delete('/delete_message/{id}', 'delete_message');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/get_all_user', 'get_all_user');
    Route::post('/create_user', 'create_user');
    Route::post('/update_user/{id}', 'update_user');
    Route::delete('/delete_user/{id}', 'delete_user');
    Route::get('/profile', 'profile');
    Route::post('/update_profile/{id}', 'update_profile');
    Route::get('/get_user_name', 'get_user_name');
});