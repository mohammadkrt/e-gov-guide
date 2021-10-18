<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    //
    protected $table = "conditions";
    protected $fillable = ['condition_name', 'service_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // relationship
    public function service()
    {
        return $this->belongsTo("App\Models\Service", "service_id", "id");
    }
}
