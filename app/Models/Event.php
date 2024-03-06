<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "event_img",
        "event_date",
        "location",
        "category_id",
        "seats_number",
        "reservation_status"
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
