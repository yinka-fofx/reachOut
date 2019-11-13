<?php

namespace App\Http\Controllers;

use App\Cause;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view ('pages.index');
    }

    public function index2()
    {
        $causes = Cause::orderBy('created_at', 'desc')->take(3)->get();
        // $causes = CauseResource::collection($causes);

        return view ('pages.index')->with('causes', $causes);
    }
}

