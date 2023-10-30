@extends('layouts.admin')

@section('content')
    <div class="py-8 px-8 mx-auto">
        <div class=" flex justify-end">
            <a href="{{ route('admin.reservation.index') }}"
                class="px-3 py-3 bg-indigo-600 hover:bg-indigo-800 text-white font-semibold rounded-md">Reservations</a>
        </div>
        <div class=" relative overflow-x-auto shadow-md sm:rounded-lg mx-auto">
            <form method="POST" action="{{ route('admin.reservation.update', $reservation->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> First Name
                    </label>
                    <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('first_name') border-red-500 @enderror">
                    @error('first_name')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Last Name
                    </label>
                    <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('last_name') border-red-500 @enderror">
                    @error('last_name')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Email
                    </label>
                    <input type="email" id="email" name="email" value="{{ $reservation->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mob_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Phone
                        Number </label>
                    <input type="text" id="mob_number" name="mob_number" value="{{ $reservation->mob_number }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('mob_number') border-red-500 @enderror">
                    @error('mob_number')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="res_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Reservation
                        Date </label>
                    <input type="datetime-local" id="res_date" name="res_date" value="{{ $reservation->res_date }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('res_date') border-red-500 @enderror">
                    @error('res_date')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Guest
                        Number </label>
                    <input type="text" id="guest_number" name="guest_number" value="{{ $reservation->guest_number }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('guest_number') border-red-500 @enderror">
                    @error('guest_number')
                        <div class=" text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tables" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tables
                    </label>
                    <div class=" mt-1">
                        <select name="table_id"
                            class=" form-multiselect block w-full mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>
                                    {{ $table->name }}({{ $table->guest_number }} Guests)
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
