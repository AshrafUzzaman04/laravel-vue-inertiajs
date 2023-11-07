<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $name = "Ashraf Uzzaman";
        $frameworks = array();
        $frameworks = ["Inertia", "Vue Js", "Laravel"];
        return Inertia::render("Home", compact("name", "frameworks"));
    }

    public function settings()
    {
        return Inertia::render("Settings");
    }

    public function users()
    {
        // sleep(1);
        $time = now()->toTimeString();
        return Inertia::render("Users", compact("time"));
    }

    public function logout(Request $request)
    {
        dd($request->name);
    }
}
