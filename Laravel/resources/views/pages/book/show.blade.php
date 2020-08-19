@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Detail Book</h1>

                <div class="card" style="width: 20rem;">
                    <img src="/storage/cover_images/{{ $book->cover }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->isbn }}</h6>
                        <p class="card-text mb-2">Author : {{ $book->author }}</p>
                        <p class="card-text mb-2">Publisher : {{ $book->publisher }}</p>
                        <p class="card-text mb-2">Description : {{ $book->description }}</p>
                        @foreach( $categories as $category )
                        <p class="card-text ">Category : {{ $category->name }}</p>
                        @endforeach
                        <a href="{{ $book->isbn }}/edit" class="btn btn-primary">Edit</a>
                        <form action="{{ $book->isbn }}" class="d-inline" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="/book" class="card-link text-primary">Kembali</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
