<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {
            $books = Book::where('title', 'like', '%'.$request->title.'%')
                    ->orWhereHas('categories', function($q) use($request){
                        $q->where('categories.id', $request->category);
                 })->get();
        }else{
            $books = Book::all();
        }
        return view('client.book-list', ['books' => $books , 'categories' => $categories]);
    }
    public function index(Request $request)
    {
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
        return view('welcome', ['books' => $books , 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Public  $public
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Public  $public
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Public  $public
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Public  $public
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
