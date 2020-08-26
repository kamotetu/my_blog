<?php

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository
{
    private $Genre;

    public function __construct()
    {
        $this->Genre = new Genre();
    }

    public function find($id)
    {
        return $this->Genre::find($id);
    }

    public function findAll()
    {
        return $this->Genre::all();
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        return;
    }
}