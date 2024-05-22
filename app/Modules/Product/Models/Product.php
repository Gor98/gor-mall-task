<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Modules\Product\Models
 */
class Product extends Model
{
    use  HasFactory, Notifiable;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
