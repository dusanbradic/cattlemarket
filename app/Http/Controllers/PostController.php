<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // return view('profile.edit', [
    //     'user' => $request->user(),
    // ]);
    public function create(Request $request): View
    {
        $animal_types=['Pig', 'Cow', 'Sheep'];
        return view('posts.create', [
            'user' => $request->user(),
            'animal_types' => $animal_types, // Pass animal types to the view
        ]);
    }
//     public function create(Request $request): View
// {
//     if ($request->user()) {
//         return view('posts.create', [
//             'user' => $request->user(),
//         ]);
//     }

//     return Redirect::route('login');
// }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
