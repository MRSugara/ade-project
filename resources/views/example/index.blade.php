<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <a href={{ route('example.create')}}  class="btn btn-primary">Create</a>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Descirption</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($example as $p )
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $p->name }}</td>
      <td>{{ $p->description }}</td>
      <td>@mdo</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</x-app-layout>
