<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        return view('seller.index');
    }
    public function create(){
        return view('seller.create');
    }
    public function store(Request $request){}
}
