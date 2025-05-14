<x-admin-layout>
    <h1>Bin Products</h1>
    <form action="{{ route('products.empty') }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Empty</button>
    </form>
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
                    <form action="{{ route('products.forceDelete', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('products.restore', $product->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button class="btn btn-success">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>