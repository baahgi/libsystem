<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use PDF;
use App\User;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function printStats()
    {
        $students = User::where('admin', false)->get()->count();
        $books = Book::all()->count();

        $booksBorrowed = Borrow::where('returned', false)->get()->count();
        $booksReturned = Borrow::where('returned', true)->get()->count();

        $pdf = PDF::loadView('pdf.stats', compact('students', 'books', 'booksBorrowed', 'booksReturned'));
        return $pdf->stream('stats.pdf');
    }
}
