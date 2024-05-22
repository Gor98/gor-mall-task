<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Modules\Category\Models
 */
class Category extends Model
{
    use HasFactory;

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
