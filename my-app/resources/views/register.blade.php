<x-layout>
  <x-slot:heading>
    Register
  </x-slot:heading>
  <form action="{{route('user.register')}}" method="post" class="border p-2 max-w-100 mx-auto flex flex-col mt-2 gap-2">
    <x-input type="text" value="{{old('name')}}" name="name" placeholder="enter your name" />
    <x-input type="email" value="{{old('name')}}" name="mail" placeholder="enter your mail" />
    <x-input type="password" name="password" placeholder="enter your password" />
    <x-btn color="text-white">signup</x-btn>
    <p>
      Already have an account? <a href="/login" class="underline text-blue-500">login</a>
    </p>
  </form>
</x-layout>