<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstantTaskController extends Controller
{
    public function index(){
        return view('work.instant.index');
    }
}
