<div class="container">
    <h1 class="my-4">Posts List</h1>
    
    @if ($posts->isEmpty())
        <p>No posts available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Animal Type</th>
                    <th>Age</th>
                    <th>Number in Herd</th>
                    <th>Price per Kilo</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->animal_type }}</td>
                        <td>{{ $post->age }}</td>
                        <td>{{ $post->number_in_herd }}</td>
                        <td>{{ $post->price_per_kilo }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>