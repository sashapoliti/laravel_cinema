@extends('layouts.admin')
@section('title', 'Edit ' . $room->name)
@section('content')
<h2 class="text-center">Modifica Sala</h2>
<form action="{{route('admin.rooms.update', $room->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome sala</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{$room->name}}" minlength="3" maxlength="255">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri</div>
    </div>

    <div class="mb-3">
        <label for="alias" class="form-label">Alias (colore sala)</label>
        <input type="text" class="form-control @error('alias') is-invalid @enderror" id="alias" name="alias"
            value="{{$room->alias}}" minlength="3" maxlength="255">
        @error('alias')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div id="aliasHelp" class="form-text text-white">Inserire minimo 3 caratteri</div>
    </div>

    <div class="mb-3">
        <label for="seats" class="form-label">Posti a sedere</label>
        <input type="number" class="form-control @error('seats') is-invalid @enderror" id="seats" name="seats"
            value="{{$room->seats}}" minlength="3" maxlength="255">
        @error('seats')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div id="seatsHelp" class="form-text text-white">Inserire minimo 3 caratteri</div>
    </div>

    <label for="isense" class="form-label">Isense</label>
    <select class="form-select" id="isense" name="isense">
        <option value="0" {{$room->isense == 0 ? 'selected' : ''}}>No</option>
        <option value="1" {{$room->sense == 1 ? 'selected' : ''}}>Si</option>
    </select>

    <div class="mb-3">
        <label for="base_price" class="form-label">Prezzo base</label>
        <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price"
            name="base_price" value="{{$room->base_price}}">
        @error('base_price')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div id="base_priceHelp" class="form-text text-white">Inserire un numero decimale</div>
    </div>

    <div class="mb-3">
        <img id="upload_preview" src="" class="w-50 mb-3">
        <label for="image" class="form-label">Immagine della sala</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            value="{{ $room->image }}">
        @error('image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="pb-5">

        <button type="submit" class="btn bg-bordeaux ">Modifica</button>
        <button type="reset" class="btn bg-bordeaux ">Svuota campi</button>
    </div>
</form>
@endsection