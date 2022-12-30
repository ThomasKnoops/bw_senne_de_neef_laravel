<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    //a profile can have multiple projects
    public function projects() : HasMany {
        return $this->hasMany(Project::class);
    }

    //a profile belongs to one user
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
