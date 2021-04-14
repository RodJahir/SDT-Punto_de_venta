<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.seller.index')->only('index');
        $this->middleware('can:admin.seller.create')->only('create');
        $this->middleware('can:admin.seller.store')->only('store');
        $this->middleware('can:admin.seller.edit')->only('edit');
        $this->middleware('can:admin.seller.update')->only('update');
        $this->middleware('can:admin.seller.delete')->only('delete');

    }

    public function index()
    {
        return view('admin.seller.index');
    }
}
