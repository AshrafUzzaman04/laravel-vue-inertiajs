<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // $time = now()->toTimeString();
        return Inertia::render("Users", [
            "users" => User::paginate(10)->through(fn ($user) => [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
            ]),
        ]);
    }

    public function logout(Request $request)
    {
        dd($request->name);
    }
}
