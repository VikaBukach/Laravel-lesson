<h2>Hello, Vika</h2>
<hr>
<a href="/posts/create/">Create post</a>
<hr>
<ul>
  @foreach($posts as $post)
      <li>{{ $post->id }}, <strong>{{ $post->title }}</strong>, <span>{{ $post->content }} </span>
          <a href="{{ route('posts.show', [$post->id]) }}">Read more</a>
          <a href="/posts/{{ $post->id }}/edit">Edit</a>
      </li>
        @if(isset($post))
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
  @endforeach
</ul>
