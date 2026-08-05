@php
$path = request()->path();
@endphp
<div class="bg-red-500 p-4 text-center">
  <nav class="text-xl capitalize font-bold">
    <a href="/" class="{{$path === '/' ? 'text-yellow-400' : ''}}">home</a>
    <a href="/users" class="{{$path === 'users'  ? 'text-yellow-400' : ''}}">user</a>
    <a href="/add" class="{{$path === 'add'  ? 'text-yellow-400' : ''}}">Create user</a>
  </nav>
</div>