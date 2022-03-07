<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;

class ModeratorMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('moderator.home.index');
    }
}
