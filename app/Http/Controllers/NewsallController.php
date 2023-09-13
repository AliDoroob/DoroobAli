<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsallController extends Controller
{
    //
    public function show()
    {
        $publicNews = News::where('is_public', true)->get();
        return view('news_public', compact('publicNews'));
    }
}