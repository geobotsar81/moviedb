<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public $appends = ["formated_created"];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ["title", "image", "year", "description", "user_id"];

    /**
     * The movies created by a user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sort by year
     *
     * @param [type] $query
     * @return Builder
     */
    public function scopeSortByYear($query): Builder
    {
        return $query->orderBy("year", "desc");
    }

    /**
     * Sort by date
     *
     * @param [type] $query
     * @return Builder
     */
    public function scopeSortByDate($query): Builder
    {
        return $query->orderBy("created_at", "desc");
    }

    /**
     * Sort by title
     *
     * @param [type] $query
     * @return Builder
     */
    public function scopeSortByTitle($query): Builder
    {
        return $query->orderBy("title", "asc");
    }

    /**
     * Generate a new attribute for a formated created date
     *
     * @return string
     */
    public function getFormatedCreatedAttribute(): string
    {
        $formated_date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $formated_date;
    }
}
