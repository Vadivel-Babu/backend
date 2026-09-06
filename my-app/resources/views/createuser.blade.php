<x-layout>
  <x-slot:heading>
    Create user
  </x-slot:heading>
  @if ($errors->any())
  <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mx-auto w-80 rounded relative mb-4" role="alert">
    <strong class="font-bold">Holy smokes! Something went wrong:</strong>
    <ul class="mt-2 list-disc list-inside text-sm">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(session('success'))
  <div x-data="{ isopen: true }" x-show="isopen"
    class="border rounded-sm p-2 bg-green-100 text-green-600 w-80 mx-auto flex justify-between ">
    <p>{{ session('success') }}</p>
    <x-btn color="text-green-600" x-on:click="isopen=false" class="bg-transparent ">
      <i data-lucide="x" width="18" height="18"></i>
    </x-btn>
  </div>
  @endif

  <form method="POST" action="{{ route('store') }}" class="border p-2 max-w-100 mx-auto flex flex-col mt-2 gap-2">
    <x-input type="text" value="{{old('name')}}" name="name" placeholder="enter your name" />
    <x-input type="email" name="mail" placeholder="enter your email" />
    <select name="occupation" id="" class="border py-1">
      <option value="frontend developer">frontend developer</option>
      <option value="backend developer">backend developer</option>
      <option value="ai developer">ai developer</option>
    </select>
    <x-btn color="text-white" type="submit">Submit</x-btn>
  </form>
</x-layout>