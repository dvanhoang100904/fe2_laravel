<x-layout>
    <x-slot:title>
        Trang chủ
    </x-slot>

    <div class="container">

        <div class="row row-cols-1 row-cols-md-4 g-4 product-list">
            <!-- Loading Spinner -->
            <div class="text-center my-5" id="loading">
                <div class="spinner-border text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
            {{-- @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach --}}
        </div>
    </div>
    <x-slot:js>
        <script>
            loadProducts();

            async function loadProducts() {
                const url = "{{ route('product-all-api') }}"; // Blade syntax for route
                const assetPath = "{{ asset('images') }}"; // Blade syntax for asset path
                const request = await fetch(url);
                const result = await request.json();
                const loading = document.getElementById("loading");
                const productList = document.querySelector(".product-list");

                loading.style.display = "block";
                productList.textContent = '';

                result.forEach(element => {
                    const categories = document.createElement("p");
                    element.categories.forEach(e => {
                        const span = document.createElement('span');
                        span.className = 'badge rounded-pill text-bg-secondary';
                        span.textContent = e.name;
                        categories.append(span);
                    });

                    const col = document.createElement('div');
                    col.classList.add('col');
                    col.innerHTML = `
                     <div class="card">
                        <img src="${assetPath}/${element.photo}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">${element.name}</a></h5>
                            <p class="card-text">
                                <b>${element.price}</b>
                            </p>
                            <p> Mô tả ngắn... </p>
                            ${categories.outerHTML}
                        </div>
                    </div>
                    `;
                    productList.append(col);
                });
            }
        </script>
    </x-slot>
</x-layout>
