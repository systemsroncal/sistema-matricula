<?php

use Illuminate\Support\Facades\Route;

use App\Exports\UsersExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
    //return (new UserExport)->download('invoices.pdf');
    //return (new UsersExport)->download('users.xlsx');

    //DOMPDF
    // $pdf = PDF::loadView('welcome');
    // return $pdf->stream();
    
});
Route::get('admin/users-print', function () {
    //return (new UsersExport)->download('users.xlsx');
    $pdf = PDF::loadView('welcome');

    return $pdf->download();
})->name('download.pdf');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
