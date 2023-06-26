<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return Tag::with('recipes')->get();
    }

    public function show(Tag $tag)
    {
        return $tag->load('recipes');
    }
}