<x-admin-layout>
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add</a>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>