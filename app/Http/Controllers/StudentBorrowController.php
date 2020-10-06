<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentBorrowController extends Controller
{
    public function index()
    {
        $books = DB::table('borrows')
                        ->where('user_id', Auth::user()->id)
                        ->orderBy('borrows.returned')
                        ->join('users', 'borrows.user_id', '=',  'users.id')
                        ->join('books', 'borrows.book_id', '=',  'books.id')
                        ->select('borrows.*', 'books.isbn', 'books.title', 'users.student_id', 'users.name')
                        ->get();


        return view('student.borrow.index', compact('books'));
    }


}
