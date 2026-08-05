@extends('layouts.master')
@section('content')
<div>
  @foreach($employees as $employee)
  <div class="border bg-white w-50 p-2 m-3">
    <h1>{{$employee->name}}</h1>
    <a href="{{route('user',['slug' => $employee->slug])}}">see</a>
  </div>
  @endforeach
</div>
@endsection