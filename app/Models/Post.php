<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_type',
        'age',
        'number_in_herd',
        'price_per_kilo',
        'user_id',
    ];

    protected $casts = [
        'price_per_kilo' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dates = [
        'created_at',
    ];
}
