@extends('layouts.master')
@section('content')
<div>
  <h1>this is users page</h1>
  @foreach($obj as $user)
  <a href="{{route('user',['id' => $user->id])}}">{{$user->name}}</a>
  @endforeach
</div>
@endsection