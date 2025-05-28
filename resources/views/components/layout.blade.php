<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Backend 2' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('categories.user.show', $category->id) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <form class="d-flex position-relative " role="search" action="{{ route('products.search') }}">
                    <input class="input-search form-control me-2 " type="search" placeholder="Search"
                        aria-label="Search" name="q">
                    <button class="btn btn-outline-success" type="submit">Search</button>

                    <ul class="list-group suggest position-absolute start-0 end-0 top-100 p-3 bg-white z-1">
                        {{-- <li class="list-group-item">An item</li> --}}
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <script>
        const root = "{{ route('home') }}";
    </script>

    {{-- mark js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js"
        integrity="sha512-5CYOlHXGh6QpOFA/TeTylKLWfB3ftPsde7AnmhuitiTX4K5SqCLBeKro6sPS8ilsz1Q4NRx3v8Ko2IBiszzdww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- my js --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-3">Copyright 2025</footer>
    {{ $js ?? '' }}
</body>

</html>
