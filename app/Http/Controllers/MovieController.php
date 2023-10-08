<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hmerritt\Imdb;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        
        $query = $request->input('query', '');
        $imdb = new Imdb;
        $results = $query !== '' ? $imdb->search($query) : [];

        return view('movies.search-results', compact('results'));
    }

    public function details($id)
    {
        $imdb = new Imdb;
        $movieData = $imdb->film($id);

        return view('movies.details', compact('movieData'));
    }
}
