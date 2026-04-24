<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index(Request $request)
    {
        // For now, let's just dump the request data to see what we're getting.
        // dd($request->all());
        
        return view('frontend.analysis');
    }
}
