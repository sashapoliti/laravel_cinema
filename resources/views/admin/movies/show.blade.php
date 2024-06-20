@extends('layouts.admin')
@section('title', $movie->title)
@section('content')
<h1 class="text-center">{{$movie->title}}</h1>


@if(session()->has('message'))
<div class="alert alert-success my-3">{{session()->get('message')}}</div>
@endif
<section class="container d-flex">
    <div>
        <img src="{{ $movie->thumb? $movie->thumb : '/images/no-image.jpeg' }}" alt="{{ $movie->title }}" class="w-100">
    </div>
    <div class="container d-flex flex-column justify-content-between">
        <p>{{$movie->description}}</p>
        <div>
            <ul>
                <li>
                    <span>Durata: {{$movie->minutes}} &nbsp;min</span>
                </li>
                <li>
                    <span>Lingua: {{$movie->language}}</span>
                </li>
                <li>
                    <span>Uscita: {{$movie->release_date}}</span>
                </li>
                <li>
                    <span><a href="{{$movie->trailer}}" target="_blank">Vai al trailer</a></span>
                </li>
            </ul>
        </div>

        <div>
            <div class="d-flex justify-content-between my-3">
                <h4 class="">Recensioni</h4>
                <div>
                <a href="{{ route('admin.movies.reviews.create', $movie->id) }}" class="btn bg-bordeaux">Crea
                    recensione</a>
                <a href="{{ route('admin.movies.index', $movie->id) }}" class="btn bg-bordeaux">Torna ai film</a>
                </div>
            </div>

            @foreach ($reviews as $index => $review)
                @include('admin.partials.review-card')
            @endforeach
        </div>

    </div>

</section>

@endsection