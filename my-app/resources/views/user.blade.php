<x-layout>
  <div>
    <h1>this is user page</h1>
    <div class="border bg-white p-2 m-1 max-w-max">
      <img src="{{$employee->img}}" class="w-10 object-cover" alt="">
      <h2>user name is: {{$employee->name}}</h2>
      <h2>user mail is: {{$employee->email}}</h2>
      <p>
        {{$employee->created_at->format('M d,Y')}}
      </p>
    </div>
    <button>
      <a href="/users">back</a>
    </button>
  </div>
</x-layout>