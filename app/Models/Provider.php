<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $table = "providers";
    protected $fillable = ['provider_name', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    // relationship many to many
    public function services(){
        return $this->belongsToMany("App\Models\Service", "service_provider", "provider_id", "service_id", "id", "id");
    }
}
