@extends('layouts.master')
@section('content')
<div>
  <h1>this is users page</h1>
  @foreach($data as $d)
  <a href="{{route('user',['id' => $d['id']])}}">{{$d['name']}}</a>
  @endforeach
</div>
@endsection