@extends('layouts.admin')
@section('title', 'Rooms')
@section('content')

<div class="d-flex justify-content-between align-items-center mt-3">
    <h2>Sale</h2>
    <a href="{{ route('admin.rooms.create') }}" class="btn bg-bordeaux w-25">Inserisci nuova sala</a>
</div>
@if(session()->has('message'))
    <div class="alert alert-success my-3">{{session()->get('message')}}</div>
    @endif
<div class="card my-5">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-bordeaux bg-transparent">Id</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Nome</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Sala</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Colore</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Posti a sedere</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Isense</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Azioni</th>
                </tr>
            </thead>
            <tbody class="table-group-divider ">
                @foreach ($rooms as $room)
                    <tr>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $room->id }}</td>
                        <td class="bg-transparent text-black border-bottom-0 w-25">
                            <img src="{{ $room->img_room }}" alt="{{ $room->name }}" class="w-75">
                        </td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $room->name }}</td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $room->alias }}</td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $room->seats }}</td>
                        </td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $room->isense }}</td>
                        </td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center h-100">

                                <a href="{{ route('admin.rooms.show', $room->id) }}" class="mt-3"><i
                                        class="fa-solid text-bordeaux fa-eye"></i></a>
                                <a href="{{ route('admin.rooms.edit', $room->id) }}" class="mt-3"><i
                                        class="fa-solid text-bordeaux fa-pen"></i></a>
                                <form action="{{ route('admin.rooms.destroy', $room->id) }}" class="mt-3" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button border-0 bg-transparent"
                                        data-item-title="{{ $room->name }}">
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
@include('admin.partials.modal-delete')


{{-- <a href="{{route('admin.rooms.create')}}" class="btn btn-primary">
    Crea nuova sala
</a>
<ul>
    @foreach ($rooms as $room)
    <li><a href="{{route('admin.rooms.show', $room->id)}}">Nome:{{$room->name }}</a> prezzo:{{$room->base_price}}</li>
    @endforeach

</ul> --}}
@endsection