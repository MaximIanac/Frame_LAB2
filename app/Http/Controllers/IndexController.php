<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index() {
        return Inertia::render('Home', [
            "title" => "Home",
        ]);
    }

    public function about() {
        return Inertia::render('About', [
            "title" => "About Page",
        ]);
    }
}
