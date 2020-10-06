<?php

namespace App\Http\Controllers;
use App\Book;
use App\Category;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        $books = '';
        if($search = request()->q){
            $books = Book::where('title', 'like', '%'. $search . '%')
                    ->where('isbn', 'like', '%'. $search . '%')
                    ->where('author', 'like', '%'. $search . '%')
                    ->where('status', 1)
                    ->get();
        }elseif($search = request()->cat){
            $books = Book::where('category_id', $search)
            ->where('status', 1)
            ->get();
        }else{
            $books = Book::all();
        }

        $categories = Category::all();
        return view('pages.index', [
            'books'=>$books,
            'categories' => $categories,
        ]);
    }
}
