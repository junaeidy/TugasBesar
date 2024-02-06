<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        // $request->session()->flush();(Auth::user()->id)
        $rentlogs = Transaction::with(['user', 'book'])->where('user_id', Auth::user()->id )->get();
        $categories = Category::all();
        if ($request->category || $request->title) {
            $books = Book::where('title', 'like', '%'.$request->title.'%')
                    ->orWhereHas('categories', function($q) use($request){
                        $q->where('categories.id', $request->category);
                 })->get();
        }else{
            $books = Book::all();
        }
        $books = Book::all();
        return view('client.profile', ['books' => $books , 'categories' => $categories, 'rent_logs' => $rentlogs]);
    }
}
