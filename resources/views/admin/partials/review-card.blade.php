<div class="card mb-4 p-3">
    <div class="d-flex justify-content-between">
        <div>
            <h5 class="d-inline">Autore:</h5>
            <p>{{ $reviews["$index"]->author}}</p>
        </div>
        <div>
            <h5>Voto</h5>
            <p>{{ $reviews["$index"]->rating}}</p>
        </div>
    </div>
    <div class="d-block">
        <h5>Testo: </h5>
        <p>{{ $reviews["$index"]->comment}}</p>
    </div>
    <!-- a href="{{ route('admin.reviews.edit', $reviews[$index]->id) }}" class="btn btn-primary">Modifica</a> -->

    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.reviews.edit', $reviews["$index"], ) }}">
            <i class="fa-solid text-bordeaux fa-pen me-3"></i>
        </a>
        <form action="{{ route('admin.reviews.destroy', $reviews["$index"]) }}" method="POST">
            
        @csrf
            @method('DELETE')
            <button type="submit" class="delete-button border-0 bg-transparent"
                data-item-title="{{ $reviews["$index"]->author }}">
                <i class="fa-solid text-bordeaux fa-trash"></i>
            </button>
        </form>
    </div>
</div>

@include('admin.partials.modal-delete')
