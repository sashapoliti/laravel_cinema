@extends('layouts.admin')
@section('title', 'Movies')
@section('content')
<section class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mt-3">
        <h2>Movies</h2>
        <a href="{{ route('admin.movies.create') }}" class="btn bg-bordeaux w-25">Inserisci nuovo film</a>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="card my-5">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-bordeaux bg-transparent">Id</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Cover</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Title</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Description</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Language</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Release_date</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach ($movies as $movie)
                        <tr>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $movie->id }}</td>
                            <td class="bg-transparent text-black border-bottom-0 ">
                            <a href="{{ route('admin.movies.show', $movie->slug) }}" class="">    
                            <img src="{{ $movie->thumb? $movie->thumb : '/images/no-image.jpeg' }}" alt="{{ $movie->title }}" class="w-100">
                            </a>    
                        </td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $movie->title }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle description-truncate">
                                {{ $movie->description }}
                            </td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $movie->language }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $movie->release_date }}
                            </td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                    <a href="{{ route('admin.movies.show', $movie->slug) }}" class="">
                                        <i class="fa-solid text-bordeaux fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="">
                                        <i class="fa-solid text-bordeaux fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.movies.destroy', $movie->slug) }}" class="" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button border-0 bg-transparent"
                                            data-item-title="{{ $movie->title }}">
                                            <i class="fa-solid text-bordeaux fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.movies.reviews.create', $movie->id) }}" class=""><i
                                            class="fa-regular text-bordeaux fa-star-half-stroke"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@include('admin.partials.modal-delete')

@endsection