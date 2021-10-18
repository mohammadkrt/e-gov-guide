<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $table = "sites";
    protected $fillable = ['site_name', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    // relationship many to many
    public function services(){
        return $this->belongsToMany("App\Models\Service", "service_site","site_id","service_id","id","id");
    }

}
