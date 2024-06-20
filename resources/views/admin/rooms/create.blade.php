@extends('layouts.admin')
@section('title', 'Add room')
@section('content')
<section>

    <h2 class="text-center">Aggiungi Sala</h2>
    <form action="{{route('admin.rooms.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome sala</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{old('name')}}" minlength="3" maxlength="255">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <!-- <div id="nameHelp" class="form-text text-dark">Inserire minimo 3 caratteri</div> -->
        </div>
        
        <div class="mb-3">
            <label for="alias" class="form-label">Alias (colore sala)</label>
            <input type="text" class="form-control @error('alias') is-invalid @enderror" id="alias" name="alias"
            value="{{old('alias')}}" minlength="3" maxlength="255">
            @error('alias')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <!-- <div id="aliasHelp" class="form-text text-dark">Inserire minimo 3 caratteri</div> -->
        </div>
        
        <div class="mb-3">
            <label for="seats" class="form-label">Posti a sedere</label>
            <input type="number" class="form-control @error('seats') is-invalid @enderror" id="seats" name="seats"
            value="{{old('seats')}}" minlength="3" maxlength="255">
            @error('seats')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <!-- <div id="seatsHelp" class="form-text text-dark">Inserire minimo 3 caratteri</div> -->
        </div>
        
        <label for="isense" class="form-label">Isense</label>
        <select class="form-select" id="isense" name="isense">
            <option selected>Open this select menu</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
        
        <div class="mb-3">
            <label for="base_price" class="form-label">Prezzo base</label>
            <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price"
            name="base_price" value="{{old('base_price')}}">
            @error('base_price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div id="base_priceHelp" class="form-text text-dark">Inserire un numero decimale</div>
        </div>
        
        <div class="mb-3">
        <img id="upload_preview" src="" class="w-50 mb-3">
            <label for="image" class="form-label">Immagine della sala</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            value="{{ old('image') }}">
        @error('image')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="pb-5">
        
        <button type="submit" class="btn bg-bordeaux ">Crea</button>
        <button type="reset" class="btn btn-secondary ">Svuota campi</button>
    </div>
</form>
</section>
@endsection