<x-layout>
  <a class="block mb-2 text-xs text-blue-500" href="{{ route('dashboard') }}">&larr; Go back to your dashboard</a>
  <div class="card mb-4">
    <h2 class="font-bold mb-4">Update your post</h2>
    <form action="{{ route('posts.update', $post) }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="title">title</label>
        <input type="text" name="title" id="title" class="input" value="{{ $post->title }}">
        @error('title')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="body">Post content</label>
        <textarea name="body" id="body" rows="5" class="input">{{ $post->body }}</textarea>
        @error('body')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80">Update</button>
    </form>
  </div>
</x-layout>
