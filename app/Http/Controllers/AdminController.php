<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $books = Book::all();
        $students = User::where('admin', false)->get();
        $returnedBook = Borrow::where('returned', true)->get();
        $borrowedBook = Borrow::where('returned', false)->get();

        return view('admin.dashboard', compact('books', 'students', 'returnedBook', 'borrowedBook'));
    }


}
