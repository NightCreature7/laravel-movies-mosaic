<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hmerritt\Imdb;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query', '');

        // Perform the movie search based on the query
        $imdb = new Imdb;
        $results = $query !== '' ? $imdb->search($query) : [];

        return view('movies.search-results', compact('results'));
    }

    public function details($id)
    {
        // Create an instance of the IMDb class
        $imdb = new Imdb;

        // Fetch movie data by IMDb ID
        $movieData = $imdb->film($id);

        return view('movies.details', compact('movieData'));
    }
}
