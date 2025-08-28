@extends('layouts.dashboard')

@section('content')
    <div>
        <div class="flex flex-row items-baseline space-x-6">
            <a href=#
                class="text-4xl font-bold mb-6 hover:text-gray-600 hover:underline transition-colors duration-200">Projects</a>

            <a href=#
                class="bg-red-500 text-gray-50 font-semibold py-2 px-4 rounded-md shadow-md hover:bg-red-600 transition-colors m-0">Create
                Project</a>
        </div>

        <div>
            <ul>
                @foreach ($projects as $project)
                    <li>{{ $project->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
