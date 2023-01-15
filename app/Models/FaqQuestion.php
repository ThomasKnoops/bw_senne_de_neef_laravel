<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FaqQuestion extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'faq_category_questions';

    protected $fillable = [
        'category_id',
        'question',
        'answer'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }
}
