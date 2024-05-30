<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('backend.user.index', compact('accounts'));
    }

    public function filter() {
        $accounts = Account::all();
        return view('backend.user.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $account->role = $account->role == 2 ? 0 : 2;

        $account->save();

        if($account->role == 2) {
            return back()->with('success', 'Khóa tài khoản thành công');
        }else {
            return back()->with('success', 'Mở khóa tài khoản thành công');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {

        return redirect()->route('product.index')->with('message', 'Product added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return back()->with('success', 'Xóa thành công');
    }
}
