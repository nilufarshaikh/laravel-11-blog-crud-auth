<x-layout>
  <h1 class="title">Welcome back!</h1>
  <div
    class="mx-auto max-w-screen-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <form action="{{ route('login') }}" method="post">
      @csrf

      {{-- Email --}}
      <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="input" value="{{ old('email') }}">
        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="input">
        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="remember">
          <input type="checkbox" name="remember" id="remember">
          Remember me</label>
      </div>

      @error('failed')
        <p class="error">{{ $message }}</p>
      @enderror

      {{-- Submit Button --}}
      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80">Log
        in</button>
    </form>
  </div>
</x-layout>
