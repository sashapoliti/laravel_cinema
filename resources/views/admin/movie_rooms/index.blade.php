@extends('layouts.admin')
@section('title', 'Projections')
@section('content')
<section class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mt-3">
        <h2>Proiezioni</h2>
        <a href="{{ route('admin.movie_rooms.create') }}" class="btn bg-bordeaux w-25">Inserisci nuova proiezione</a>
    </div>
    <form action="{{ route('admin.movie_rooms.index') }}" method="GET" class="my-3 w-25">
        <div class="input-group">
            <input type="date" name="date" class="form-control mx-3" value="{{ request('date') }}">
            <div class="input-group-append">
                <button class="btn bg-bordeaux text-white" type="submit">Filtra per data</button>
            </div>
        </div>
    </form>
    @if(session()->has('message'))
    <div class="alert alert-success mt-3">{{session()->get('message')}}</div>
    @endif
    <div class="card my-5">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-bordeaux bg-transparent">Id</th>
                        <!-- <th scope="col" class="text-bordeaux bg-transparent">Movie cover</th> -->
                        <th scope="col" class="text-bordeaux bg-transparent">Movie title</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Room</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Date</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Start time</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Ticket Price</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Seats</th>
                        <th scope="col" class="text-bordeaux bg-transparent">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach ($movieRoom as $projection)
                        <tr>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $projection->id }}</td>
                            <!-- <td class="bg-transparent text-black border-bottom-0 w-25">
                                <img src="{{ $projection->movie->thumb }}" alt="{{ $projection->movie->title }}"
                                    class="w-75">
                            </td> -->
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                {{ $projection->movie->title }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $projection->room->name }}
                            </td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                {{ $projection->date_projection }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                {{ $projection->slot->start_time }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                &euro;{{ $projection->ticket_price }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                {{ $projection->room->seats }}</td>
                            <td class="bg-transparent text-black border-bottom-0 align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center h-100">

                                    <a href="{{ route('admin.movie_rooms.edit', $projection->id) }}" class="mt-3"><i
                                            class="fa-solid text-bordeaux fa-pen"></i></a>
                                    <form action="{{ route('admin.movie_rooms.destroy', $projection->id) }}" class="mt-3"
                                        method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button border-0 bg-transparent"
                                            data-item-title="{{ $projection->id }}">
                                            <i class="fa-solid text-bordeaux fa-trash"></i>
                                        </button>
                                    </form>
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