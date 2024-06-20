@extends('layouts.admin')
@section('title', 'Modifica proiezione')
@section('content')

<section>
    <h2 class="text-center text-uppercase">Modifica proiezione</h2>
    <form class="" action="{{route('admin.movie_rooms.update', $movieRoom)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="movie" class="form-label">film</label>
            <select name="movie_id" id="movie_id" class="form-control">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{$movieRoom->movie_id == $movie->id ? 'selected' : ''}}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
            <div class="col-md-6">
                <label for="room" class="form-label">Sala</label>
                <select name="room_id" id="room_id" class="form-control">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $movieRoom->room_id == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>

                <label for="room" class="form-label">fascia oraria</label>
                <select name="slot_id" id="slot_id" class="form-control">
                    @foreach ($slots as $slot)
                        <option value="{{ $slot->id }}" {{$movieRoom->slot_id == $slot->id ? 'selected' : '' }}>
                            {{ $slot->time_slot }}
                        </option>
                    @endforeach
                </select>
                    <div class="p-0 w-75">
                        <label for="date_projection">Date Projection</label>
                        <input type="date" name="date_projection" class="form-control w-75 mt-3" id="date_projection"
                            value="{{ $movieRoom->date_projection }}">
                    </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn bg-bordeaux">modifica</button>
                    <button type="reset" class="btn bg-bordeaux">reset</button>
                </div>

            </div>
            @endsection