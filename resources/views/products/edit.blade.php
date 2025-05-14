<x-admin-layout>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="text" class="form-control" id="photo" name="photo" value="{{ $product->photo }}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                @foreach($categories as $category)
                <input type="checkbox" class="btn-check" id="btncheck-{{ $category->id }}" autocomplete="off" name="categories[]" value="{{ $category->id }}" {{ $product->categories->contains($category->id) ? 'checked' : ''}}>
                <label class="btn btn-outline-primary" for="btncheck-{{ $category->id }}">{{ $category->name }}</label>
                @endforeach

            </div>
            @error('categories')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-admin-layout>