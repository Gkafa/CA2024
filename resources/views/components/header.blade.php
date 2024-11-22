<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex flex-1">
        <div class="flex align-bottom items-center">
          <a href="{{ route('posts') }}" class="text-sm/6 font-semibold text-gray-900">Posts</a>
            <a href="{{ route('posts.promoted') }}" class=" text-sm/6 font-semibold text-gray-900 pl-8">Promoted Posts</a>
        </div>
      </div>
      <a href="/" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="">
      </a>
      <div class="flex flex-1 justify-end">
        <a href="/admin" class="text-sm/6 font-semibold text-gray-900">Admin</a>
      </div>
    </nav>
  </header>
