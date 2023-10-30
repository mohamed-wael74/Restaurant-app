@extends('layouts.guest')

@section('content')
    <section class="mt-8 bg-white mb-20">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">Our Menu</h3>
        </div>
        <div class="container w-full px-5 py-8 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-y-6">
                @foreach ($menus as $data)
                    <div class="max-w-xs mx-4 mb-2 rounded-md shadow-xl ml-16 md:ml-4">
                        <img class="w-full h-56" src="{{ url('images/' . $data->image) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <div class="flex mb-2">
                                <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-white">
                                    <a href="{{ route('menus.show', $data->id) }}" class=" text-white">{{ $data->name }}</a></span>
                            </div>
                            <p class="leading-normal text-gray-700"> {{ $data->description }} </p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <span class="text-xl text-green-600">{{ $data->price }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
