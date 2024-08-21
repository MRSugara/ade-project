<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('katalog.create') }}"type="button" class="btn btn-primary">create</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($katalog as $ca )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $ca->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-1">
                                    <a href="{{ route('katalog.edit',$ca->id) }}" type="button" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('katalog.destroy',$ca->id)}}"method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>


                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</x-app-layout>
