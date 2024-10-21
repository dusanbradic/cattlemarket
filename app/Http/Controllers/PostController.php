<?php

namespace App\Http\Controllers;
use Auth;
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
            // //ovo treba da bude animal type moram samo da provalim kako 
            // $table->enum('animal_type', ['Pig', 'Cow', 'Sheep']);
            // // $table->string('animal_type', 5);
            // $table->integer('age');
            // $table->integer('number_in_herd');
            // $table->decimal('price_per_kilo', 10, 2);
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->timestamps();
    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_type' => 'required',
            'number_in_herd' => 'required',
            'price_per_kilo' => 'required',
            'age' => 'required',
        ]);
        $post = Post::create([
            'animal_type' => $validated['animal_type'],
            'number_in_herd' => $validated['number_in_herd'],
            'price_per_kilo' => $validated['price_per_kilo'],
            'age' => $validated['age'],
            'user_id' => Auth::id(), // Assign the current logged-in user's ID
        ]);
        return to_route('posts.index');
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
