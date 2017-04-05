<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     * Generated
     */

    protected $table = 'users';
    protected $fillable = ['id', 'nom', 'prenom', 'email', 'password', 'date_creation', 'role', 'remember_token'];



}
