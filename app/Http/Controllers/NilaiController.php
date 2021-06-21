<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $title = "Data Nilai";
        return view('admin.nilai', compact('title'));
    }
}