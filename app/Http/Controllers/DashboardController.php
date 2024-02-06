<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $transactionCount = RentLog::count();
        $userCount = User::count();
        // $data_donut = Book::select(DB::raw("COUNT(id) as total"))->groupBy('id')->orderBy('id', 'asc')->pluck('total');
        return view('admin.dashboard', ['book_count' => $bookCount, 'transaction_count' => $transactionCount, 'user_count' => $userCount,]);
    }
    public function category()
    {
        return view('admin.categories');
    }
}
