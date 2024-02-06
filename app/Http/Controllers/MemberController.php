<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Member;
use App\Models\RentLog;
use App\Models\Transaction;
use Illuminate\Http\Request;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        $banedUsers = User::where('status', 'active')->where('role_id', 2)->get();
        $members = User::where('role_id', '=', '2')->where('status', '=', 'active')->get();
        $userDeleted = User::onlyTrashed()->get();
        return view('admin.members', ['members' => $members, 'registeredUsers' => $registeredUsers, 'banedUsers' => $banedUsers, 'userDeleted' => $userDeleted,]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->get();
        return view('admin.members', ['registeredUsers' => $registeredUsers]);
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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $details = Member::where('slug', $slug)->get();
        // $member = User::where('username', $slug)->firstOrFail();
        // $member = MemberController::showMemberBySlug($slug);
        $user = User::where('slug', $slug)->first();
        $rentlogs = Transaction::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('admin.member-details', ['user' => $user , 'rent_logs' => $rentlogs, 'details' => $details]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $member = Member::where('slug', $slug)->first();
        $rentlog = Transaction::with(['user', 'book'])->get();
        $books = Book::all();
        return view('members', ['books' => $books, 'member' => $member, ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */public function delete($id)
    {
        
        $user = User::where('id', $id)->first();
        return view('books', ['users' => $user]);
    }
    
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('members')->with('status', 'User Banned Successfully');
    }

    public function approve($slug) 
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('members')->with('status', 'User Approved Successfully');
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug);
        $user->restore();
        return redirect('members')->with('status', 'User Unbanned Successfully');
    }
    public function userDeleted()
    {
        $userDeleted = Member::onlyTrashed()->get();
        return view('admin.members', ['userDeleted' => $userDeleted]);
    }
}
