@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">List Books</h1>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="/book/create" class="btn btn-primary my-3">Tambah Book</a>

                <ul class="list-group">
                    @foreach( $books as $book )
                        <li class="list-group-item d-flex justify-content-between align-items-center text-primary">
                            {{ $book->title }}
                            <a href="/book/{{ $book->isbn }}" class="badge badge-info">Detail</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
{{--<table id="myTable" class="display">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>ISBN</th>--}}
{{--        <th>Cover</th>--}}
{{--        <th>Book Details</th>--}}
{{--        <th>Description</th>--}}
{{--        <th>Category_id</th>--}}
{{--        <th>Action</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach( $books as $book )--}}
{{--        <tr>--}}
{{--            <td>{{ $book->isbn }}</td>--}}
{{--            <td>{{ $book->cover }}</td>--}}
{{--            <td>--}}
{{--                {{ $book->title }}--}}
{{--                {{ $book->author }}--}}
{{--                {{ $book->publisher }}--}}
{{--            </td>--}}
{{--            <td>{{ $book->description }}</td>--}}
{{--            <td>{{ $book->category_id }}</td>--}}
{{--            <td>--}}
{{--                <button onclick="updateValueBook('{{ $book->isbn }}')">Update</button>--}}
{{--                <button onclick="deleteValueBook('{{ $book->isbn }}')">Delete</button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
