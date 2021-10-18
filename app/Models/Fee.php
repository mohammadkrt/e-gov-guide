<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    protected $table = "fees";
    protected $fillable = ['fees_name', 'fees_value', 'service_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // relationship
    public function service()
    {
        return $this->belongsTo("App\Models\Service", "service_id", "id");
    }
}
