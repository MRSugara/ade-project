<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Example') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mb-3">
                <a href={{ route('example.create')}}  class="btn btn-primary ">Create</a>
            </div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Descirption</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($example as $p )
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $p->name }}</td>
      <td>{{ $p->description }}</td>
      <td>Rp. {{ Illuminate\Support\Number::format($p->price) }}</td>
      <td>
          <a href="{{ route('example.edit',$p->id) }}"class="btn btn-primary">Edit</a>
          <form action="{{ route('example.destroy',$p->id) }}"method="post" class="d-inline" >
             @csrf
              @method('delete')
            <button type="submit" class="btn btn-danger">delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
    </div>
</x-app-layout>
