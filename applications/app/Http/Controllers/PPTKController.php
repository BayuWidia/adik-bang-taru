<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPTKController extends Controller
{
    public function index()
    {
      return view('pptk.index');
    }
}
