@extends('layouts.admin')

@section('content')
    <div class="py-8 px-8 mx-auto">
        <div class=" flex justify-end ">
            <a href="{{ route('admin.tables.index') }}"
                class=" px-2 py-3 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-lg"> Tables </a>
        </div>
        <div class=" relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">
            <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                    <input type="text" id="name" name="name" value="{{ $table->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Guest
                        Number </label>
                    <input type="text" id="guest_number" name="guest_number" value="{{ $table->guest_number }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('guest_number') border-red-500 @enderror">
                    @error('guest_number')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>
                    <div class=" mt-1">
                        <select name="status"
                            class=" form-multiselect block w-full mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Location
                    </label>
                    <div class=" mt-1">
                        <select name="location"
                            class=" form-multiselect block w-full mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach (App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>{{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="mr-5 px-3 py-2 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-md">Submit</button>
            </form>
        </div>
    </div>
@endsection
