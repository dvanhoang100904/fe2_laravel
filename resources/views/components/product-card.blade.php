<div class="col">
    <div class="card">
        <img src="{{ asset('images/' . $product->photo) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('products.user.show', $product->id) }}">{{ $product->name }}</a></h5>
            <p class="card-text">
                <b>{{ $product->price }}</b>
                <p>
                    @foreach($product->categories as $category)
                    <span class="badge rounded-pill text-bg-secondary">{{ $category->name }}</span>
                    @endforeach
                </p>
                <p> Mô tả ngắn... </p>
            </p>
        </div>
    </div>
</div>