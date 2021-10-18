<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = "documents";
    protected $fillable = ['document_name', 'document_path', 'service_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    // relationship
    public function service()
    {
        return $this->belongsTo("App\Models\Service", "service_id", "id");
    }
}
