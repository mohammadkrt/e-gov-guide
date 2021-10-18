<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "services";
    protected $fillable = ['service_name', 'description', 'unit_id', 'department_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    //relationship
    public function unit()
    {
        return $this->belongsTo("App\Models\Unit", "unit_id", "id");
    }

    public function department()
    {
        return $this->belongsTo("App\Models\Department", "department_id", "id");
    }

    public function conditions()
    {
        return $this->hasMany("App\Models\Condition", "service_id", "id");
    }

    public function fees()
    {
        return $this->hasMany("App\Models\Fee", "service_id", "id");
    }

    public function documents()
    {
        return $this->hasMany("App\Models\Document", "service_id", "id");
    }

    // relationship many to many
    public function providers(){
        return $this->belongsToMany("App\Models\Provider", "service_provider", "service_id", "provider_id", "id", "id");
    }

    public function sites() {
        return $this->belongsToMany("App\Models\Site", "service_site", "service_id", "site_id", "id", "id");
    }
}
