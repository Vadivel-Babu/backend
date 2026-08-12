<x-layout>
  <x-slot:heading>
    User Page
  </x-slot:heading>
  <div class="max-w-150 mx-auto bg-white p-2">
    @foreach($employees as $employee)
    <div class="border bg-white w-50 p-2 m-3">
      <h1>{{$employee->name}}</h1>
      <a href="{{route('user',['slug' => $employee->slug])}}">see</a>
    </div>
    @endforeach
  </div>
</x-layout>