<?php

namespace App\Services\Backend\Modules\CommonModule;

use App\Traits\FilePathTrait;
use Illuminate\Support\Facades\Storage;

class CommonService
{
     use FilePathTrait;

     public function file_upload($file,$filename,$path,$existing_file_path = null)
     {
          return $file->storeAs($path,$filename,'public');
     }

     public function get_image_link($filename = null, $type)
     {
          if($filename == null){
               return null;
          }
          $path = $this->get_file_path($type) ."/". $filename;
          return Storage::url($path);
     }
}
