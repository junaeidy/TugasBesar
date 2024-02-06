<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function home()
    {
        return view('client.book-list');
    }
    public function index()
    {
        // $request->session()->flush();
        $users = User::where('id', '!=',1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        $bookDeleted = Book::onlyTrashed()->get();
        $categories = Category::all();
        return view('admin.books', ['books' => $books, 'categories' => $categories, 'bookDeleted' => $bookDeleted]);
    }

    // public function add()
    // {
    //     $categories = Category::all();
    //     return view('books', ['categories' => $categories]);
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|unique:books|max:100',
            // 'image' => 'required',
        ]);

        $newName = '';
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Books Added Successfully');
    }

    public function bookReturn()
    {
        $users = User::where('id', '!=' , 1)->get();
        $books = Book::all();
        return view('admin.book-return', ['users' => $users, 'books' => $books]);
    }

    public function savebookReturn(Request $request)
    {
        $rent = Transaction::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $counData = $rent->count();

        if($counData == 1){
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'The book is returned successfully');
            Session::flash('alert-class', 'alert-success');

            return redirect('book-return');
        }else{
            Session::flash('message', 'Failed! Transaction data not found');
            Session::flash('alert-class', 'alert-danger');

            return redirect('book-return');

        }
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('books', ['book' => $book, 'categories' => $categories]);
    }
    public function update(Request $request, $slug)
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }
        $book = Book::where('slug', $slug)->first();
        $book->slug = null;
        $book->update($request->all());

        if($request->categories){
            $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Books Edit Successfully');
    }

    public function delete($slug)
    {
        
        $book = Book::where('slug', $slug)->first();
        return view('books', ['book' => $book]);
    }
    
    public function destroy($id)
    {
        $book = Book::where('id', $id)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }
    
    // public function deletedBook()
    // {
    //     $bookDeleted = Book::onlyTrashed()->get();
    //     return view('admin.books', ['bookDeleted' => $bookDeleted]);
    // }
    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug);
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successfully');
    }
}
