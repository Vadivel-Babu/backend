<x-layout>
  <x-slot:heading>
    Create user
  </x-slot:heading>
  <form action="" class="border p-2 max-w-100 mx-auto flex flex-col gap-2">
    <x-input type="text" placeholder="enter your name" />
    <x-input type="email" placeholder="enter your email" />
    <select name="occupation" id="" class="border py-1">
      <option value="frontend developer">frontend developer</option>
      <option value="backend developer">backend developer</option>
      <option value="ai developer">ai developer</option>
    </select>
    <x-btn>Submit</x-btn>
  </form>
</x-layout>