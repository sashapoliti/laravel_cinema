@extends('layouts.admin')
@section('title', 'Edit ' . $movie->title)
@section('content')

<section>
    <h2 class="text-center text-uppercase">Modifica {{$movie->title}} </h2>
    <form class="row g-3" action="{{route('admin.movies.update', $movie)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{old('title', $movie->title)}}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{old('description', $movie->description)}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-12">
            <label for="minutes" class="form-label">minutes</label>
            <input type="text" class="form-control @error('minutes') is-invalid @enderror" id="minutes" name="minutes"
                value="{{old('minutes', $movie->minutes)}}" required>
        </div>
        @error('minutes')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-12">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control @error('language') is-invalid @enderror" id="language"
                name="language" value="{{old('language', $movie->language)}}" required>
        </div>
        @error('language')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="thumb" class="form-label">thumb</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
                value="{{old('thumb', $movie->thumb)}}">
        </div>
        @error('thumb')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-4">
            <label for="trailer" class="form-label">trailer</label>
            <input type="text" class="form-control @error('trailer') is-invalid @enderror" id="trailer" name="trailer"
                value="{{old('trailer', $movie->trailer)}}">
        </div>
        @error('trailer')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-2">
            <label for="release_date" class="form-label">release date</label>
            <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date"
                name="release_date" value="{{old('release_date', $movie->release_date)}}" required>
        </div>
        @error('release_date')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        
        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">modifica</button>
            <button type="reset" class="btn bg-bordeaux">annulla modifica</button>
        </div>
    </form>
</section>
@endsection