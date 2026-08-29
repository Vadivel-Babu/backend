<x-layout>
  <x-slot:heading>
    Users Page
  </x-slot:heading>
  <div class="max-w-150 mx-auto bg-white p-2">
    <h1 class="text-4xl">Employess page</h1>
    @foreach($data as $user)
    <x-card>
      <x-slot:name>{{$user['name']}}</x-slot:name>
      <x-slot:mail>{{$user['mail']}}</x-slot:mail>
    </x-card>
    @endforeach
    <x-btn>
      <a href="/user">see</a>
    </x-btn>
  </div>
</x-layout>