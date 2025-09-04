@extends('layouts.dashboard')

@section('content')
    <div class="text-4xl font-bold mb-6">
        <a href={{ route('tasks.index') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Tasks</a><i
            class="fa fa-angle-right"></i><a href="#"
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Manage Tasks</a>
    </div>
@endsection
