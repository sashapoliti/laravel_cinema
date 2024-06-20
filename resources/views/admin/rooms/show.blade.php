@extends('layouts.admin')
@section('title', $room->name)
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success my-3">
        {{ session()->get('message') }}
    </div>
@endif


<div class="p-2 rounded-3 overflow-hidden">
    <div class=" pb-0 hype-unselectable">
        <div id="{{ $room->name }}" class="w-100 img-fluid">
            <img class="w-25" src="{{asset('storage/' . $room->img_room ?? '') }}" alt=" {{ $room->name }}">
        </div>
        <table class="table table-dark table-hover shadow my-5 hype-unselectable">
            <thead>
                <tr>
                    <th scope="col">Colore</th>
                    <th scope="col">Posti a sedere</th>
                    <th scope="col">ISense</th>
                    <th scope="col">Prezzo Base</th>
                    <th scope="col">Vista</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $room->alias }}</td>
                    <td>{{ $room->seats }}</td>
                    <td>{{ $room->isense }}</td>
                    <td>{{ $room->base_price }}</td>
                    <td>{{ $room->img_room }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.rooms.index') }}" class="btn bg-bordeaux">torna alle sale</a>
</div>

@endsection