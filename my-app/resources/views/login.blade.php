<x-layout>
  <x-slot:heading>
    login
  </x-slot:heading>
  <form action="" method="post" class="border p-2 max-w-100 mx-auto flex flex-col mt-2 gap-2">

    <x-input type="email" value="{{old('mail')}}" name="mail" placeholder="enter your mail" />
    <x-input type="password" name="password" placeholder="enter your password" />
    <x-btn color="text-white">login</x-btn>
    <p>
      Don't have account? <a href="/register" class="underline text-blue-500">signup</a>
    </p>
  </form>
</x-layout>