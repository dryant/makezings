<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zing;

class ZingController extends Controller
{
    public function index()
    {
        $zings = Zing::all();
        return view('zings.index', compact('zings'));
    }
}
