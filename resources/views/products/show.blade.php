<x-layout>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        {!! $product->description !!}
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                        <div class="comment-group">
                            @foreach ($product->comments as $comment)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        {{ $comment->content }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control input-comment" name="" id="">
                            <button class="btn btn-outline-secondary" type="button" id="btn-comment">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('comments.store', $product->id) }}" method="post">
            @csrf
            <input type="text" name="content" id="content">
            <button>Send</button>
        </form>
    </div>

    <x-slot:js>
        <script>
            document.querySelector('#btn-comment').addEventListener('click', function() {
                addComment();
            });
            async function addComment() {
                const inputComment = document.querySelector('.input-comment');

                const url = "{{ route('comments.store-api', $product->id) }}";
                const data = {
                    content: inputComment.value
                };
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json;charset=utf-8",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(data)

                });

                const result = await response.json();
                const commentGroup = document.querySelector('.comment-group');
                commentGroup.replaceChildren();
                result.forEach(element => {
                    const comment = document.createElement('div');
                    comment.className = 'card mb-4';
                    comment.innerHTML = `
                        <div class="card-body">
                            ${element.content}
                        </div>
                    `;
                    commentGroup.append(comment);
                });

            }
        </script>
    </x-slot>
</x-layout>
