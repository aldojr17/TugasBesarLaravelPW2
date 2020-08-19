@extends('main')

@section('isi')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">Edit Book</h1>

                <form action="/book/{{ $book->isbn }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ $book->title }}">
                        @error('title') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                        <label for="author">Author</label>
                        <input type="text" class="form-control  @error('author') is-invalid @enderror" id="author" name="author" value="{{ $book->author }}">
                        @error('author') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                        <label for="publisher">Publisher</label>
                        <input type="text" class="form-control  @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ $book->publisher }}">
                        @error('publisher') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                        <label for="description">Description</label>
                        <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description" name="description" value="{{ $book->description }}">
                        @error('description') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                        <label for="category_id">Category_id</label>
                        <select name="category_id" id="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                            <option selected value="{{ $book->category_id }}">{{ $categoryId->name }}</option>
                            @foreach( $categories as $category )
                                @if( $category->id != $categoryId->id)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Cover File</label>
                        <div class="col-sm-10">
                            <input type="file" id="bookCover" name="bookCover" class="form-control" accept="image/png, image/jpeg">
                        </div>
                    </div>
                    <input type="submit" name="btnSubmit" class="btn btn-default">
                </form>

            </div>
        </div>
    </div>
@endsection
