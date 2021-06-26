<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estados';
    protected $fillable = ['uf'];

    public function cidades(){
       return $this->hasMany(Cidade::class, 'cidade_id', 'id');
    }

    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('uf', 'LIKE', "%{$filter}%");
                //$query->where('marca', 'LIKE', "%{$filter}%");
               // $query->where('marca', '=', $filter);
            } 
 
        } )//->toSql();
        ->paginate();

        return $results;
 
    }
}  
 
//return $this->hasMany('App\Comment', 'foreign_key', 'local_key'); 

 