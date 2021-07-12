<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = ['name', 'phone', 'email', 'password', 'role'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ordens(){
        return $this->hasMany(OrdemServico::class);
    }
    
    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
                //$query->where('marca', 'LIKE', "%{$filter}%");
               // $query->where('marca', '=', $filter);
            } 
 
        })->paginate(10);

        return $results;
 
    }
}
