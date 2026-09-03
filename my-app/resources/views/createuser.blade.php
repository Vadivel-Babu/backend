<x-layout>
  <x-slot:heading>
    Create user
  </x-slot:heading>
  @if(session('success'))
  <div style="color: green;">{{ session('success') }}</div>
  @endif
  <form method="POST" action="{{ route('store') }}" class="border p-2 max-w-100 mx-auto flex flex-col gap-2">
    <x-input type="text" name="name" placeholder="enter your name" />
    <x-input type="email" name="mail" placeholder="enter your email" />
    <select name="occupation" id="" class="border py-1">
      <option value="frontend developer">frontend developer</option>
      <option value="backend developer">backend developer</option>
      <option value="ai developer">ai developer</option>
    </select>
    <x-btn type="submit">Submit</x-btn>
  </form>
</x-layout>