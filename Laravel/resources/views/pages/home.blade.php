@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Halaman Home</h1>
                <p>Welcome, {{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>
@endsection
