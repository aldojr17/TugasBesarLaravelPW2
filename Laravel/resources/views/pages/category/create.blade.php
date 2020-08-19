@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Tambah Category</h1>

                <form action="/category" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input type="submit" name="btnSubmit" class="btn btn-default">
                </form>

            </div>
        </div>
    </div>
@endsection
