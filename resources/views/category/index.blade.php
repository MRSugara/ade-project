<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('category.create') }}" type="button" class="btn btn-primary">Create</a>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $k)
        <tr>
            <th scope="row">{{ $loop->iteration}}</th>
            <td>{{ $k->name }}</td>
            <td></td>
        </tr>
    @endforeach
</tbody>
</table>
        </div>
    </div>
</x-app-layout>
