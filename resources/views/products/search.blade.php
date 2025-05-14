<x-layout>
    <x-slot:title>
        Search
    </x-slot>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($products as $product)

            <x-product-card :product="$product" />

            @endforeach
        </div>
    </div>
</x-layout>