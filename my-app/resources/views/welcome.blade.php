<x-layout>
  <x-slot:heading>
    Home Page
  </x-slot:heading>

  <div class="max-w-150 mx-auto bg-white p-2">
    <h1>This is {{$name}} page</h1>

    <div x-data="{ open: false }">
      <p x-show="!open">Lorem ipsum dolor ...
      </p>
      <p x-show="open">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque ex quae voluptatem, assumenda quia eaque quasi
        alias impedit fugiat minima, esse, nesciunt temporibus natus voluptate culpa. Mollitia consectetur commodi
        magnam?
      </p>
      <x-btn x-on:click="open = ! open" color="text-white" class=" rounded-sm hover:bg-gray-200">see more</x-btn>
    </div>

  </div>
</x-layout>