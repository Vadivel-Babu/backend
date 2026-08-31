<x-layout>
  <x-slot:heading>
    User Page
  </x-slot:heading>
  <x-singlecard :name="$employee['name']" :mail="$employee['mail']" :occupation="$employee['occupation']" />
</x-layout>