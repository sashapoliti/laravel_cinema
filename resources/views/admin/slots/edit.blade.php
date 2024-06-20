@extends('layouts.admin')
@section('title', 'Edit ' . $slot->time_slot)
@section('content')
<h2 class="text-center">Modifica fascia oraria</h2>
<form action="{{route('admin.slots.update', $slot->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="time_slot" class="form-label">Nome fascia</label>
            <input type="text" class="form-control @error('time_slot') is-invalid @enderror" id="time_slot"
                name="time_slot" value="@if(old('time_slot')) {{ old('time_slot') }} @else {{ $slot->time_slot }} @endif" minlength="3" maxlength="255">{{old('time_slot')}}
            @error('time_slot')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                name="start_time" value="" >{{old('start_time')}}
            @error('start_time')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">end</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                name="end_time" value="" >{{old('end_time')}}
            @error('end_time')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
        </div>


        <div class="pb-5">

            <button type="submit" class="btn btn-primary ">Modifica</button>
            <button type="reset" class="btn btn-secondary ">Svuota campi</button>
        </div>
    </form>
@endsection