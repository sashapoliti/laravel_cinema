@extends('layouts.admin')
@section('title', 'Add movie')
@section('content')

<section>
    <h2 class="text-center tet-uppercase">inserisci un nuovo film</h2>
    <form class="row g-3" action="{{route('admin.movies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{old('title')}}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="col-md-6">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{old('description')}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-12">
            <label for="minutes" class="form-label">minutes</label>
            <input type="text" class="form-control @error('minutes') is-invalid @enderror" id="minutes" name="minutes"
                value="{{old('minutes')}}" required>

        </div>
        @error('minutes')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-12">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control @error('language') is-invalid @enderror" id="language" name="language"
                value="{{old('language')}}" required>

        </div>
        @error('language')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-md-6">
            <label for="thumb" class="form-label">thumb</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
                value="{{old('thumb')}}">

        </div>
        @error('thumb')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-md-4">
            <label for="trailer" class="form-label">trailer</label>
            <input type="text" class="form-control @error('trailer') is-invalid @enderror" id="trailer" name="trailer"
                value="{{old('trailer')}}">

        </div>
        @error('trailer')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-md-2">
            <label for="release_date" class="form-label">release date</label>
            <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date"
                name="release_date" value="{{old('release_date')}}" required>

        </div>
        @error('release_date')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn bg-bordeaux">crea</button>
        </div>
    </form>
</section>
@endsection