<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameControl extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_id',
        'win_rate',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var double
     */
    protected $casts = [
        'win_rate' => 'double',
    ];
}
