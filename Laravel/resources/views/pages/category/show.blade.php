@extends('main')

@section('isi')
    <section class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Detail Category</h1>

                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $category->id }}</h6>
                        <p class="card-text">Created At : {{ $category->created_at }}</p>
                        <p class="card-text">Last Update : {{ $category->updated_at }}</p>
                        <p class="card-text mb-0">Book :</p>
                        @foreach( $books as $book )
                            <p class="card-text mb-0">- {{ $book->title }}</p>
                        @endforeach
                        <p class="card-text"></p>
                        <a href="{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="{{ $category->id }}" class="d-inline" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="/category" class="card-link text-primary">Kembali</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
