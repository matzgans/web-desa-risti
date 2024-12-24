<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public  function index()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->paginate(3);
        return view("pages.landing.gallery", compact("galleries"));
    }
}
