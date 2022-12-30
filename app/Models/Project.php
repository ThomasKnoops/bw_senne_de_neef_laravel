<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    //a project belongs to a single profile
    public function profile(): BelongsTo {
        return $this->belongsTo(Profile::class);
    }

    //a project can have multiple reports
    public function reports() : HasMany {
        return $this->hasMany(Report::class);
    }

}
