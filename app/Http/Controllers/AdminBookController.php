<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the books
        $books = Book::all();
        return view('admin.books.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.books.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'nullable|string',
            'title' => 'required|string|max:255',
            'author' => 'required',
        ]);

        //putting them in the database
        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->category_id = $request->category;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published_date = Carbon::createMidnightDate($request->publish_date);
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the book by id
        $book = Book::find($id);

        //return the view with the book found
        return view('admin.books.show', ['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        $categories =Category::all();

        return view('admin.books.edit', ['book' => $book, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->category_id = $request->category;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published_date = Carbon::createMidnightDate($request->publish_date);
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        //delete the book found
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book successfully Deleted');
    }
}
