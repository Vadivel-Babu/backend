@php
$path = request()->path();
@endphp
<div class="bg-red-500 p-4 text-center flex justify-between items-center">
  <a href="/">
    <h1 class="text-yellow-500 text-xl">Logo</h1>
  </a>

  @auth
  <nav class="text-xl capitalize font-bold space-x-2 flex">
    <a href="/" class="{{$path === '/' ? 'text-yellow-400' : ''}}">home</a>
    <a href="/users" class="{{$path === 'users'  ? 'text-yellow-400' : ''}}">user</a>
    <a href="/add" class="{{$path === 'add'  ? 'text-yellow-400' : ''}}">Create user</a>
    <p class="mx-4">{{ auth()->user()->name }}!</p>
    <a href="/logout">
      <x-btn>logout</x-btn>
    </a>
  </nav>
  @endauth

  @guest
  <nav class="text-xl capitalize font-bold space-x-2">
    <a href="/login" class="text-yellow-400">login</a>
    <a href="/register" class="text-yellow-400 ">signup</a>
  </nav>
  @endguest

</div>