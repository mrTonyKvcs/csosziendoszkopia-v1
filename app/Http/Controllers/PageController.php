<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function index($slug = '/')
    {
        $page = Page::where('url', $slug)->firstOrFail();

        return view('page.index', ['page' => $page]);
    }
}
