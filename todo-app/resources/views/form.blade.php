@extends('layouts.master')
@section('content')

<button class="m-2">
  <a href="/">back</a>
</button>
<form action="{{route('todos.store')}}" method="post" class="m-auto border rounded-2xl flex flex-col gap-2 w-max p-3">
  @csrf
  <input type="text" name="title" class="border p-2" placeholder="add todo">
  <button class="bg-black px-2 py-1 w-fit text-white rounded-sm " type="submit">
    Add
  </button>
</form>
@endsection