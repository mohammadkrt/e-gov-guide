<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = "states";
    protected $fillable = ['state_name', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    //public $timestamps = false;

    // relationship
    public function units()
    {
        return $this->hasMany("App\Models\Unit", "state_id", "id");
    }

    public function departments(){
        return $this->hasMany("App\Models\Department", "state_id", "id");
    }
}
