@props(['post', 'full' => false])
<div
  class="block max-w-xxl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
  <h2 class="font-bold text-xl">{{ $post->title }}</h2>

  <div class="text-xs font-light mb-4">
    <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
    <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium">{{ $post->user->username }}</a>
  </div>

  @if ($full)
    <div class="text-sm">
      <span>{{ $post->body }}</span>
    </div>
  @else
    <div class="text-sm">
      <span>{{ Str::words($post->body, 15) }}</span>
      <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more &rarr;</a>
    </div>
  @endif

  <div class="flex items-center justify-end gap-4 mt-6 ">
    {{ $slot }}
  </div>

</div>
