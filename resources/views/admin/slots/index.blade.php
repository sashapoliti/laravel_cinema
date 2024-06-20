@extends('layouts.admin')
@section('title', 'Programmation')
@section('content')

<div class="card my-5">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-bordeaux bg-transparent">Id</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Name</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Start</th>
                    <th scope="col" class="text-bordeaux bg-transparent">End</th>
                    <th scope="col" class="text-bordeaux bg-transparent">Action</th>

                </tr>
            </thead>
            <tbody class="table-group-divider ">
                @foreach ($slots as $slot)
                    <tr>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $slot->id }}</td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $slot->time_slot }}</td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $slot->start_time }}</td>
                        <td class="bg-transparent text-black border-bottom-0 align-middle">{{ $slot->end_time }}</td>
                        </td>
                        <td
                            class=" bg-transparent text-black d-flex border-bottom-0 flex-column justify-content-center align-items-center">

                            <a href="{{ route('admin.slots.edit', $slot->id) }}"><i
                                    class="fa-solid text-bordeaux fa-pen"></i></a>
                            <form action="{{ route('admin.slots.destroy', $slot->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button border-0 bg-transparent"
                                    data-item-title="{{ $slot->time_slot }}">
                                    <i class="fa-solid text-bordeaux fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="text-center mb-3">
    <a href="{{ route('admin.slots.create') }}" class="btn bg-bordeaux w-25 ">Crea nuovo slot di proizione</a>
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