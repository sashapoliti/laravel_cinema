<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all()->sortByDesc('created_at');

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Movie $movie)
{
    // Create a new empty review instance
    $review = new Review;

    // Set the movie_id attribute of the review to the given movie's ID
    $review->movie_id = $movie->id;

    // Return the view, passing both review and movie data
    return view('admin.reviews.create', compact('movie', 'review'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $form_data = $request->validate([
            'author' => 'required|max:100',
            'comment' => 'required|max:1000',
            'rating' => 'nullable|numeric|min:1|max:10',
            'movie_id' => 'required'
        ]);
        
        $new_review = new Review();
        $new_review->fill($form_data);
        $new_review->save();
        $movie = Movie::findorfail($form_data['movie_id']);
        //$reviews=$movie->reviews;
        return redirect()->route('admin.movies.show', $movie->slug)->with('message', 'Nuova recensione di ' . $new_review->author . ' creata con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review, Movie $movie)
    {
        $review = Review::with('movie')->findOrFail($review->id);
        $movie = $review->movie;
    
        return view('admin.reviews.edit', compact('review', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review, Movie $movie)
    {
        $form_data = $request->validate([
            'author' => 'required|max:100',
            'comment' => 'required|max:1000',
            'rating' => 'nullable|numeric|min:1|max:5',
        ]);

        $review->update($form_data);
        $movie = Movie::with('reviews')->findorfail($review->movie_id);
        //$reviews=$movie->reviews;
        return redirect()->route('admin.movies.show', $movie->slug)->with('message', 'Recensione di ' . $review->author . ' modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $movie_id = $review->movie_id;
        $movie = Movie::findorfail($movie_id);
        $movie_slug = $movie->slug;
        //$reviews=$movie->reviews;
        $review->delete();
        
        return redirect()->route('admin.movies.show', $movie->slug)->with('message', 'Recensione di ' . $review->author . ' eliminata con successo');
    }
}
