<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('catalog.create') }}" class="btn btn-primary"></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <th></th>
                    </tbody>
                    @foreach ( $catalog as $c )
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->name }}</td>
                    <td>
                        <a href="{{ route('catalog.edit') }}"class ="btn btn-primary" type="button"></a>

                    </td>
                    @endforeach

            </table>
        </div>
    </div>
</x-app-layout>
