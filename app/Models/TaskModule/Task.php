<?php

namespace App\Models\TaskModule;

use App\Models\UserModule\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function task_assigned_to(){
        return $this->belongsTo(User::class,"assigned_to","id");
    }

    public function task_assigned_by(){
        return $this->belongsTo(User::class,"assigned_by","id");
    }
}
