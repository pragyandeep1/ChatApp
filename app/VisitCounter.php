<?php

namespace App;

class VisitCounter
{
    // public static function increment()
    // {
    //     $visitCount = session('visit_count', 0);
    //     $visitCount++;
    //     session(['visit_count' => $visitCount]);
    // }

    // public static function getCount()
    // {
    //     return session('visit_count', 0);
    // }
    public static function incrementPageVisit($page)
    {
        $visitCount = session("visit_count_$page", 0);
        $visitCount++;
        session(["visit_count_$page" => $visitCount]);
    }

    public static function getPageVisitCount($page)
    {
        return session("visit_count_$page", 0);
    }
}
