@extends('layouts.master')
@section('content')
<h1 class="font-bold text-4xl text-orange-300 text-center mt-3">Home</h1>
<div class="mt-6 mx-auto  rounded-2xl w-62 p-2">
  @if($todos->isEmpty())
  <p class="text-center">No todos yet. Create one!</p>
  @else
  <ul class="space-y-5">
    @foreach($todos as $todo)
    <li class="flex flex-col justify-between bg-gray-100 gap-1 p-2 rounded-xl">
      @if($todo->img != null)
      <img src="{{ asset('storage/' . $todo->img) }}" alt="img" class="w-30 object-cover">
      @endif
      <span>
        {{ $todo->content }}
      </span>
      <span>
        status: {{ $todo->isCompleted == '1' ? 'completed' : 'not completed' }}
      </span>
      <div class="flex items-center gap-2">
        <button class="bg-yellow-500 text-xs p-1 rounded-md">
          <a href="{{route('edit',['id' => $todo->id])}}">edit</a>
        </button>
        <form action="{{route('todo.delete',['id' => $todo->id])}}" method="post">
          @method('delete')
          <button type="submit" class="bg-red-500 text-white text-xs p-1 rounded-md">delete</button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
  @endif
</div>
@endsection