<?php

use Illuminate\Support\Facades\Route;

use App\Exports\UsersExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    //return view('welcome');
    //return (new UserExport)->download('invoices.pdf');
    return (new UsersExport)->forDate(request('year'))->download('users.xlsx');
    
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
