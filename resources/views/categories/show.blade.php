<x-layout>
    <x-slot:title>
        {{ $category->name }}
    </x-slot>
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($category->products as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</x-layout>