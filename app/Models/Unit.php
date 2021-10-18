<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = "units";
    protected $fillable = ['unit_name', 'state_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    //public $timestamps = true;

    // relationship
    public function state()
    {
        return $this->belongsTo("App\Models\State", "state_id", "id");
    }

    public function departments()
    {
        return $this->hasMany("App\Models\Department", "unit_id", "id");
    }

    public function services()
    {
        return $this->hasMany("App\Models\Service", "unit_id", "id");
    }
}
