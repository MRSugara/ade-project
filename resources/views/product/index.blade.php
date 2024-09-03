<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="container px-4 mx-auto">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $data['chart']->container() !!}
                </div>
            </div>
            <script src="{{ $data['chart']->cdn() }}"></script>

            {{ $data['chart']->script() }}
        </div>
    </div>
</x-app-layout>
