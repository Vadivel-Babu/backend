<x-layout>
  <x-slot:heading>
    User Page
  </x-slot:heading>
  <div>
    name is: {{$employee->name}}
    <x-btn>
      <a href="/users">back</a>
    </x-btn>
  </div>
</x-layout>