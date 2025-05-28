<x-layout>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        @foreach($product->comments as $comment)
        {{ $comment->content }}
        @endforeach
        <form action="{{ route('comments.store', $product->id) }}" method="post">
            @csrf
            <input type="text" name="content" id="content">
            <button>Send</button>
        </form>
    </div>
</x-layout>
