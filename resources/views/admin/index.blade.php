@extends('layouts.admin')

@section('content')

<h3 class="text-center mr-16 text-3xl">Hello <span>{{ Auth::user()->email }}</span> </h3>

@endsection
