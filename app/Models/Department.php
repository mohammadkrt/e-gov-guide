<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = "departments";
    protected $fillable = ['department_name', 'unit_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // relationship
    public function unit()
    {
        return $this->belongsTo("App\Models\Unit", "unit_id", "id");
    }

    public function state(){
        return $this->belongsTo("App\Models\State", "state_id ", "id");
    }

    public function services()
    {
        return $this->hasMany("App\Models\Service", "department_id", "id");
    }
}
