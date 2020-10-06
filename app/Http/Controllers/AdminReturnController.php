<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReturnController extends Controller
{
    public function index()
    {
        $booksReturned = DB::table('borrows')
                        ->where('borrows.returned', true)
                        ->latest()
                        ->join('users', 'borrows.user_id', '=',  'users.id')
                        ->join('books', 'borrows.book_id', '=',  'books.id')
                        ->select('borrows.*', 'books.isbn', 'books.title', 'users.student_id', 'users.name')
                        ->get();

        return view('admin.returns.index', ['books'=> $booksReturned]);
    }



    public function returnBook(Request $request, $id)
    {
        $borrow = Borrow::find($id);
        $borrow->returned = true;
        $borrow->return_date = Carbon::now();
        $borrow->save();

        return redirect()->route('borrow.index')->with('success', 'Book returned sucessfully');
    }
}
