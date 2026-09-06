<div x-data="{ open: false }" class="shadow-md rounded-lg bg-white p-2 m-1 space-x-1 mx-auto max-w-max">
  <div class="flex justify-between items-center">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCjPJY_nkgiu4OvIqlDNpPRq_k28LsWELoELE5g-9j1BSc7hrzv6zLecWm&s=10"
      class="size-10 rounded-full object-cover" alt="">
    <div class="flex gap-1">
      <form action="{{ route('remove', $id) }}" method="post">
        @method('delete')
        <x-btn type="submit" color="text-white" class="bg-red-500 p-4">
          <i data-lucide="x" width="12" height="12"></i>
        </x-btn>
      </form>
      <x-btn x-on:click="open = true" color="text-black" class="bg-yellow-500">
        <i data-lucide="pen" fill="#111" width="12" height="12"></i>
      </x-btn>
    </div>
  </div>
  <hr class="my-2">
  <h2>name is: <span class="font-bold text-lg">{{$name}}</span> </h2>
  <h2>email is: <span class="font-bold text-lg">{{$mail}}</span> </h2>
  <h2>Occupation is: <span class="font-bold text-lg">{{$occupation}}</span> </h2>
  <x-btn color="text-white" class="mt-2">
    <a href="/users">back</a>
  </x-btn>

  <!-- modal part -->
  <div x-on:click="open=false" x-show="open"
    class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black/50">
    <div method="post" @click.stop class="bg-white rounded-md p-2 min-w-100">
      <x-btn x-on:click="open=false" color="text-white" class="bg-black p-1">
        <i data-lucide="x" width="15" height="15"></i>
      </x-btn>
      <h1 class="text-center">Edit</h1>
      <form action="{{route('update',$id)}}" method="post" class="flex flex-col gap-1.5">
        @method('put')
        <x-input type="text" value="{{$name}}" name="name" placeholder="enter your name" />
        <x-input type="email" name="mail" readonly value="{{$mail}}" placeholder="enter your email" />
        <select name="occupation" id="" class="border py-1">
          <option value="">Select a category</option>
          <option value="frontend developer">frontend developer</option>
          <option value="backend developer">backend developer</option>
          <option value="ai developer">ai developer</option>
        </select>
        <div class="flex gap-1 mt-5">
          <x-btn color="text-white" x-on:click="open=false">close</x-btn>
          <x-btn color="text-white" type="submit">Submit</x-btn>
        </div>
      </form>

    </div>
  </div>
</div>