<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->get();
        return view('pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'cover' => 'image|nullable|max:2000'
        ]);

        if($request->hasFile('bookCover')){
            $extension = $request->file('bookCover')->getClientOriginalExtension();
            $isbn = $request->isbn;
            $newFileName = $isbn . '.' . $extension;
            $path = $request->file('bookCover')->storeAs('public/cover_images', $newFileName);
        }else{
            $newFileName = 'noimage.jpg';
        }

        $book = new Book;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->cover = $newFileName;
        $book->save();
        return redirect('/book')->with('status', 'Book Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $categories = Category::where('id', $book->category_id)->get();
        return view('pages.book.show', compact('book'), compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $categoryId = $categories->find($book->category_id);
        return view('pages.book.edit', ['book' => $book, 'categories' => $categories, 'categoryId' => $categoryId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'cover' => 'image|nullable|max:2000'
        ]);

        if($request->hasFile('bookCover')){
            Storage::delete('public/cover_images/'.$book->cover);
            $extension = $request->file('bookCover')->getClientOriginalExtension();
            $isbn = $book->isbn;
            $newFileName = $isbn . '.' . $extension;
            $path = $request->file('bookCover')->storeAs('public/cover_images', $newFileName);
        }else{
            $newFileName = $book->cover;
        }

        Book::where('isbn', $book->isbn)
            ->update([
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'cover' => $newFileName
            ]);
        return redirect('/book')->with('status', 'Book Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->cover != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$book->cover);
        }

        Book::destroy($book->isbn);
        return redirect('/book')->with('status', 'Book Berhasil Dihapus!');
    }
}
