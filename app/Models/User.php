<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ExcelExport;
class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setExportable()
{
  //list column of table which you want to export
  //type 1 ["key1", "key2"]
  //type 2 ["key1" => "New Name", "key2" => "New Name"]
  //or with closure ["key1" => [ "name" => "New Name", "value" => function($value, $model){ return $value } ]]
  //you all free to combine three options

  //example
  return array(
    ["name", "email"]
  );
}
}
