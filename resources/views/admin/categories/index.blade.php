@extends('layouts.admin')

@section('content')
    <div class="py-8 px-8 mx-auto">
        <div class=" flex justify-end mb-6">
            <a href="{{ route('admin.categories.create') }}"
                class=" px-2 py-3 bg-indigo-600 hover:bg-indigo-800 text-white rounded-lg"> New Category </a>
        </div>
        <div class=" relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Category name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-14 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->name }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->menu->name }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-2">
                                    <a href= "{{ route('admin.categories.edit', $data->id) }}"
                                        class="font-medium px-3 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-md">Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.categories.destroy', $data->id) }}"
                                        onsubmit="return confirm('Are You Sure?')"
                                        class=" px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md text-white font-semibold">
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
