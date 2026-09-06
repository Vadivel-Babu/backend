<x-layout>
  <x-slot:heading>
    Create user
  </x-slot:heading>

  <div class="border rounded-sm p-2 bg-green-100 text-green-600 w-40 mx-auto flex justify-between ">
    <p>fghgfjf</p>
    <x-btn color="text-green-600" class="bg-transparent ">
      <i data-lucide="x" width="18" height="18"></i>
    </x-btn>
  </div>

  <form method="POST" action="{{ route('store') }}" class="border p-2 max-w-100 mx-auto flex flex-col mt-2 gap-2">
    <x-input type="text" name="name" placeholder="enter your name" />
    <x-input type="email" name="mail" placeholder="enter your email" />
    <select name="occupation" id="" class="border py-1">
      <option value="frontend developer">frontend developer</option>
      <option value="backend developer">backend developer</option>
      <option value="ai developer">ai developer</option>
    </select>
    <x-btn color="text-white" type="submit">Submit</x-btn>
  </form>
</x-layout>