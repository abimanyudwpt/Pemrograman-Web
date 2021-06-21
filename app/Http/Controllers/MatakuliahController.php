<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $title = "List Matakuliah";
        return view('admin.matakuliah', compact('title'));
    }
}