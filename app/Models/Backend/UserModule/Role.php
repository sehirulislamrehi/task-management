<?php

namespace App\Models\Backend\UserModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereNotIn(string $string, string[] $array)
 * @method static where(string $string, true $true)
 */
class Role extends Model
{
    use HasFactory;

    public function permission(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
