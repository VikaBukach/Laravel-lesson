<h2>Edit post</h2>
<form method="post" action="{{ route('posts.update', [$post->id]) }}">
    @method('PUT')
    @csrf
    <div>Title: <input name="title" value="{{ $errors->any() ? old('title') : $post->title }}"></div>
    <div>
        Content:
        <textarea name="content">{{ old('content') ?? $post->content }}</textarea>
    </div>
    <hr>
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button>Send</button>
</form>

