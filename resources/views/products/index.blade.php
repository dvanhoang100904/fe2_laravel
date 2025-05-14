<x-admin-layout>
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add</a>
    <a href="{{ route('products.bin') }}" class="btn btn-primary">Bin</a>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Photo</td>
                <td>Categories</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @foreach($product->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </td>
                <td><img src="{{ asset('images/' . $product->photo) }}" alt="" width="150"></td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>