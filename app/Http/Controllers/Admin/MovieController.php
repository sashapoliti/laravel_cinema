<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->get();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        $data_store = $request->validated();
        $data_store['slug'] = Movie::generateSlug($data_store['title']);
        $new_movie = Movie::create($data_store);
        return redirect()->route('admin.movies.show', $new_movie->slug)->with('message', $new_movie->title . 'creato con successo');
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $reviews = $movie->reviews->sortByDesc('created_at');         
        return view('admin.movies.show', compact('movie', 'reviews'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data_update = $request->validated();
        $movie->update($data_update);
        return redirect()->route('admin.movies.show', $movie->slug)->with('message', $movie->title . 'Modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('message', $movie->title . ' eliminato con successo');
    }

    public function createReview (Movie $movie) {

        return view('admin.reviews.create', compact('movie'));
    }
}
