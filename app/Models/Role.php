<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','created_by','updated_by'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

}
