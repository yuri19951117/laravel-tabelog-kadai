<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptController extends Controller
{
    public function index()
    {
        $intent = Auth::user()->createSetupIntent();

        return view('subscript.index', compact('intent'));
    }
}
