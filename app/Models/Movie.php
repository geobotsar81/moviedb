<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'image',
        'year',
        'description',
        'user_id',
    ];

    /**
    * The movies created by a user
    *
    * @return void
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
