<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisitController extends Controller
{
    public function getVisitCount()
    {
        $visitedPages = Session::get('visited_pages', []);
        $visitCount = count($visitedPages);

        return $visitCount;
    }
}
