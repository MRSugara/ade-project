<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('example.update', $example->id) }}"method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $example->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description"name="description" value="{{ $example->description }}">
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                    @foreach ($category as $c)
                        <option value="{{ $c->name }}" {{ $c->name == $example->category->name ? 'selected' : '' }} >{{ $c->name }}</option>
                    @endforeach
                </select>
                <div class="input-group mb-3 bg-white">
                    <img src="{{ asset('images/'.$example->image) }}" alt="" style="width: 100px">
                    <input type="file" class="form-control self-center mx-3" id="inputGroupFile02" name="image" value="{{ $example->image }}">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
