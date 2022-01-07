<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MovieRepository
{

    /**
     * Save a movie
     *
     * @param Array $data
     * @return void
     */
    public function store(array $data):void
    {
        Movie::create($data);
    }
    
    /**
     * Update a movie
     *
     * @param Array $data
     * @return void
     */
    public function update(array $data, int $id):void
    {
        $movie = Movie::findOrFail($id);
        $movie->title=$data['title'];
        $movie->year=$data['year'];
        $movie->description=$data['description'];
        if ($data['image']) {
            $movie->image=$data['image'];
        }
        $movie->save();
    }


    /**
     * Get the moview for a specific user
     *
     * @param User $user
     * @return Collection
     */
    public function userMovies(User $user):Collection
    {
        return $user->movies()->get();
    }

    /**
     * Get a paginated list of movies
     *
     * @return LengthAwarePaginator
     */
    public function paginated():LengthAwarePaginator
    {
        return Movie::with(['user'])->orderBy('year', 'desc')->paginate(5);
    }
}
