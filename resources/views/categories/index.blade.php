@extends('layouts.guest')

@section('content')
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold text-black tracking-widest">ITEMS</h3>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-6 text-center">
                @foreach ($menu->categories as $data)
                    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-xl ml-16 md:ml-0">
                        <img class=" h-64" src="{{ url('images/' . $data->image) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <div class="flex mb-2">
                                <span
                                    class="px-4 py-2 text-sm bg-green-600 rounded-full text-red-50">{{ $data->name }}</span>
                            </div>
                            <p class="leading-normal text-gray-700"> {{ $data->description }} </p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <span class="text-xl mb-0 text-green-600">{{ $data->price }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
