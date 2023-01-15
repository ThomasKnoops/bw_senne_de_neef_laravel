<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'faq_categories';

    protected $fillable = [
        'title',
    ];

    public function questions(): HasMany {
        return $this->hasMany(FaqQuestion::class, 'category_id');
    }
}
