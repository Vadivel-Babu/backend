<x-layout>
  <x-slot:heading>
    Create user
  </x-slot:heading>
  <h2 class="text-bold text-yellow-300">{{$name}}</h2>
  <form action="" class="border p-2 max-w-100 mx-auto flex flex-col gap-2">
    <input placeholder="enter name" class="border rounded-sm p-1" type="text" />
    <input placeholder="enter name" class="border rounded-sm p-1" type="text" />
    <x-btn>Submit</x-btn>
  </form>
</x-layout>