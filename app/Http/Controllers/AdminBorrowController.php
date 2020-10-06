<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use App\Mail\BookBorrowedMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminBorrowController extends Controller
{
    public function index()
    {
        // $books = Book::all();
        // $borrowedBook = $books->map(function($book){
        //     return $book->borrowd->where('status', false)
        //                             ->where('borrow_date', Carbon::now()->today);
        // });

        // dd($borrowedBook);

        $booksBorrowed = DB::table('borrows')
                            ->where('borrows.returned', false)
                            ->join('users', 'borrows.user_id', '=',  'users.id')
                            ->join('books', 'borrows.book_id', '=',  'books.id')
                            ->select('borrows.*', 'books.isbn', 'books.title', 'users.student_id', 'users.name')
                            ->get();
// dd($booksBorrowed);
          return view('admin.borrows.index', ['books'=> $booksBorrowed]);
    }

    public function create()
    {
        return view('admin.borrows.create');
    }

    public function store(Request $request)
    {
        $student = User::where('student_id', $request->student_id)->first();
        $book = Book::where('isbn', $request->isbn)->first();
// dd($book);
        if(!$student){
            return back()->with('danger', 'Student ID not found');
        }else{
            if(!$book){
                return back()->with('danger', 'Book with this ISBN not found');
            }else{
                $bookBorrow = new Borrow();
                $bookBorrow->user_id = $student->id;
                $bookBorrow->book_id = $book->id;
                $bookBorrow->borrow_date = Carbon::now();
                $bookBorrow->return_date = Carbon::now()->addDays(13);
                $bookBorrow->save();
            }
        }

        try{
            Mail::to($student->email)->send(new BookBorrowedMail($book, $bookBorrow));
        }catch(\Exception $e){
            return redirect()->route('borrow.index')->with('info', 'Book borrowed sucessfully');
        }

        return redirect()->route('borrow.index')->with('success', 'Book borrowed sucessfully');
    }

    public function search()
    {
        $books = DB::table('borrows')
                ->orderBy('borrows.returned')
                ->join('users', 'borrows.user_id', '=',  'users.id')
                ->join('books', 'borrows.book_id', '=',  'books.id')
                ->select('borrows.*', 'books.isbn', 'books.title', 'users.student_id', 'users.name')
                ->where('users.student_id', request()->q)
                ->get();

        return view('admin.borrows.search', compact('books'));
    }
}
