<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'cover',
        'user_id'
    ];

    //a project belongs to a single profile
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
