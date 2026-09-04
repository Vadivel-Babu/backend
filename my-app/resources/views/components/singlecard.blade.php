<div class="shadow-md rounded-lg bg-white p-2 m-1 space-x-1 mx-auto max-w-max">
  <div class="flex justify-between items-center">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCjPJY_nkgiu4OvIqlDNpPRq_k28LsWELoELE5g-9j1BSc7hrzv6zLecWm&s=10"
      class="size-15 rounded-full object-cover" alt="">
    <div>
      <form action="{{ route('remove', $id) }}" method="post">
        @method('delete')
        <x-btn type="submit" class="bg-red-500 p-1">
          <i data-lucide="x" width="15" height="15"></i>
        </x-btn>
      </form>
      <!-- <x-btn class="bg-yellow-500 p-1">
        <a href="{{ route('remove', $id) }}" class="text-black "> <i data-lucide="pen" fill="#111" width="15"
            height="15"></i></a>
      </x-btn> -->
    </div>
  </div>
  <hr class="my-2">
  <h2>name is: <span class="font-bold text-lg">{{$name}}</span> </h2>
  <h2>email is: <span class="font-bold text-lg">{{$mail}}</span> </h2>
  <h2>Occupation is: <span class="font-bold text-lg">{{$occupation}}</span> </h2>
  <x-btn class="mt-2">
    <a href="/users">back</a>
  </x-btn>
</div>