<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function users(Request $request)
    {
        // sleep(1);
        // $time = now()->toTimeString();
        return Inertia::render("Users", [
            "users" => User::when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email,
                ]),

            "filters" => $request->only(['search'])
        ]);
    }

    public function userCreate()
    {
        return Inertia::render("CreateUser");
    }

    public function userInsert(Request $request)
    {
        // dd($request);
        $request->validate([
            "full_name" => "required|min:3",
            "email" => "required|email|unique:Users,email",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->full_name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        return redirect("/users");
    }


    public function logout(Request $request)
    {
        dd($request->name);
    }
}
