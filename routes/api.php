<?php

use App\Http\Controllers\pruebaCrudController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/prueba',[pruebaCrudController::class,'index']);
Route::post('/create', [TestController::class, 'create']);
Route::get('/index', [TestController::class, 'index']);
Route::put('/edit', [TestController::class, 'edit']);
Route::delete('/delete', [TestController::class, 'delete']);


Route::get('/insert', function() {
    $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
    $stuRef->set([
       'firstname' => 'Seven',
       'lastname' => 'Stac',
       'age'    => 19
]);

});

Route::get('/display', function(){
 $student = app('firebase.firestore')->database()->collection('User')->document('BvpeYZEld5EX40dCNMh3')->snapshot();
 print_r('Student ID ='.$student->id());
 print_r("<br>". 'Student Name = '.$student->data()['firstname']);
 print_r("<br>".'Student Age = '.$student->data()['age']);
});

Route::get('/update', function(){
 $student = app('firebase.firestore')->database()->collection('User')->document('BvpeYZEld5EX40dCNMh3')
->update([
 ['path' => 'age', 'value' => '18']
]);

});

Route::get('/delete', function(){
app('firebase.firestore')->database()->collection('User')->document('BvpeYZEld5EX40dCNMh3')->delete();
echo "<h1>".'deleted'."</h1>";
});
