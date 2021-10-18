<?php

namespace App\Traits;


Trait DocumentTraits
{
     public function saveDocument($doc, $folder): string
     {
        $file_extension = $doc->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $doc->move($path, $file_name);
        return $file_name;
    }
}
