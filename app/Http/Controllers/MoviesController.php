<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = config('services.movie.key');

        // popular movies
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=' . $key)->json()['results'];

        // their Genre
        $genreArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=' . $key)->json()['genres'];

        $genres = collect($genreArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // now playing movies
        $topMovies = Http::get('https://api.themoviedb.org/3/movie/top_rated?api_key=' . $key)->json()['results'];



        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'topMovies' => $topMovies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key = config('services.movie.key');
        $movie = Http::get('https://api.themoviedb.org/3/movie/'
            . $id . '?api_key=' . $key . '&append_to_response=credits,videos,images')->json();

        $genreArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=' . $key)->json()['genres'];
        $genres = collect($genreArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });


        return view('show', [
            'movie' => $movie,
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
