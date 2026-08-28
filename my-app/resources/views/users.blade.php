@php
$arr = [["name" => "jhon","email" => "jhon@mial.com"],["name" => "joe","email" => "joe@mial.com"]];
@endphp
<x-layout>
  <x-slot:heading>
    Users Page
  </x-slot:heading>
  <div class="max-w-150 mx-auto bg-white p-2">
    <h1 class="text-4xl">Employess page</h1>
    @foreach($arr as $user)
    <x-card>
      <x-slot:name>{{$user['name']}}</x-slot:name>
      <x-slot:mail>{{$user['email']}}</x-slot:mail>
    </x-card>
    @endforeach
    <x-btn>
      <a href="/user">see</a>
    </x-btn>
  </div>
</x-layout>