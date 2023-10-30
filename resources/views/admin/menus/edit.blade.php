@extends('layouts.admin')

@section('content')
    <div class="py-8 px-8 mx-auto">
        <div class=" flex justify-end ">
            <a href="{{ route('admin.menus.index') }}"
                class=" px-2 py-3 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-lg">Menus </a>
        </div>
        <div class=" relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">
            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.menus.update', $menu->id) }}">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                    <input type="text" id="name" name="name" value="{{ $menu->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description </label>
                    <textarea rows="3" name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('description') border-red-500 @enderror">
                        {{ $menu->description }}
                    </textarea>
                    @error('description')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="Image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Image
                    </label>
                    <div>
                        <img src="{{ url('images/' . $menu->image) }}" class=" w-32 h-32" alt="">
                    </div>
                    <input type="file" id="image" name="image" value="{{ $menu->image }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('image') border-red-500 @enderror">
                    @error('image')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                    <button type="submit"
                        class="mr-5 px-3 py-2 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-md">Submit</button>
            </form>
        </div>
    </div>
@endsection
