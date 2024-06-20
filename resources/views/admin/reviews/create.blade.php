@extends('layouts.admin')
@section('title', 'Add review')
@section('content')

<section>
    
    <h2 class="text-center text-uppercase">Inserisci una recensione del film: {{ $movie->title }}</h2>
    <form class="row g-3" action="{{ route('admin.reviews.store', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                value="{{old('author')}}">
            @error('author')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        </div>

        <div class="col-md-6">
            <label for="comment" class="form-label">Commento</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment">{{old('comment')}}</textarea>
            @error('comment')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        </div>

        <div class="col-md-6">
            <label for="rating" class="form-label">Valutazione</label>
            <input type="number" max ="5" min="1" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"
                value="{{old('rating')}}">
            @error('rating')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <select name="movie_id" id="movie_id" class="form-control w-50 ms-1">
            <option value="{{ $movie->id }}"> {{$movie->title}}</option>
        </select>

        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">Crea</button> 
        </div>
    </form>


</section>

@endsection