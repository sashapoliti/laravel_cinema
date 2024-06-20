@extends('layouts.admin')
@section('title', 'Add programmation')
@section('content')
<section>

    <h2 class="text-center">Aggiungi Sala</h2>
    <form action="{{route('admin.slots.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="time_slot" class="form-label">Nuova fascia</label>
            <input type="text" class="form-control @error('time_slot') is-invalid @enderror" id="time_slot"
                name="time_slot" value="{{old('time_slot')}}" minlength="3" maxlength="255">
            @error('time_slot')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                name="start_time" value="{{old('start_time')}}" minlength="3" maxlength="255">
            @error('start_time')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">end</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                name="end_time" value="{{old('end_time')}}" minlength="3" maxlength="255">
            @error('end_time')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="pb-5">

            <button type="submit" class="btn btn-primary ">Crea</button>
            <button type="reset" class="btn btn-secondary ">Svuota campi</button>
        </div>
    </form>
</section>
@endsection