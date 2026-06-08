@extends('layouts.master')
@section('content')
<button class="m-2">
  <a href="/">back</a>
</button>
<h1 class="font-bold text-4xl text-orange-300 text-center mt-3 my-2">Edit Page</h1>
<form action="{{route('todos.update',['id' => $todo->id])}}" method="post" enctype="multipart/form-data"
  class="m-auto border rounded-2xl flex flex-col gap-2 w-max p-3">
  @csrf
  @method('PUT')
  <input name="img" type="file" accept="image/*">
  <input type="text" name="title" value="{{$todo->content}}" class="border p-2" placeholder="add todo">
  <div class="flex items-center gap-1.5">
    <label for="isCompleted">Completed:</label>
    <input type="checkbox" name="isCompleted" value="1" {{ $todo->isCompleted == 1 ? 'checked' : '' }}>
  </div>
  <button class="bg-yellow-600 px-2 py-1 w-fit rounded-sm " type="submit">
    Edit
  </button>
</form>
@endsection