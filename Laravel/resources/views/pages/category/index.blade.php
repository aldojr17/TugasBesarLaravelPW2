@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">List Category</h1>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="/category/create" class="btn btn-primary my-3">Tambah Category</a>

                <ul class="list-group">
                    @foreach( $categories as $category )
                        <li class="list-group-item d-flex justify-content-between align-items-center text-primary">
                            {{ $category->name }}
                            <a href="/category/{{ $category->id }}" class="badge badge-info">Detail</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection


{{--<br>--}}
{{--<table id="myTable" class="display">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>ID</th>--}}
{{--        <th>Name</th>--}}
{{--        <th>Action</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach( $categories as $category )--}}
{{--        <tr>--}}
{{--            <td>{{ $category->id }}</td>--}}
{{--            <td>{{ $category->name }}</td>--}}
{{--            <td>--}}
{{--                <button onclick="updateValue('{{ $category->id }}')">Update</button>--}}
{{--                <button onclick="deleteValue('{{ $category->id }}')">Delete</button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
