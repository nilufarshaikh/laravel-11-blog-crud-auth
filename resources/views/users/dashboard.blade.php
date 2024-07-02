<x-layout>
  <h1 class="title">Hello {{ auth()->user()->username }} you have {{ $posts->total() }} posts</h1>

  <div class="card mb-4">
    <h2 class="font-bold mb-4">Create a new post</h2>

    @if (session('success'))
      <x-flashMsg msg="{{ session('success') }}" bg="bg-green-500" />
    @elseif (session('delete'))
      <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
    @endif

    <form action="{{ route('posts.store') }}" method="post">
      @csrf

      <div class="mb-4">
        <label for="title">title</label>
        <input type="text" name="title" id="title" class="input" value="{{ old('title') }}">
        @error('title')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="body">Post content</label>
        <textarea name="body" id="body" rows="5" class="input">{{ old('body') }}</textarea>
        @error('body')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80">Create</button>
    </form>
  </div>

  <h2 class="title">Your latest posts</h2>
  <div class="grid grid-cols-2 gap-6">
    @foreach ($posts as $post)
      <x-postCard :post="$post">
        <a class="bg-yellow-500 text-white px-2 py-1 text-xs rounded-md"
          href="{{ route('posts.edit', $post) }}">Update</a>

        <form action="{{ route('posts.destroy', $post) }}" method="post">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
        </form>
      </x-postCard>
    @endforeach
  </div>
  <div>{{ $posts->links() }}</div>
</x-layout>
