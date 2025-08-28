@extends('layouts.dashboard')

@section('content')
    <div class="text-4xl font-bold mb-6">
        <a href={{ route('projects.index') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Projects</a><i
            class="fa fa-angle-right"></i><a href={{ route('projects.show', $project->id) }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Selected Project</a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 w-full">
        <div class="flex items-center mb-4">
            <h1 class="font-semibold text-xl text-gray-800">{{ $project->title }}</h1>
            <span class="ml-auto px-3 py-1 text-xs font-semibold rounded-full {{ $project->status_color }}">
                {{ $project->formatted_status }}
            </span>
        </div>

        <div class="space-y-3">
            <p class="text-gray-600 text-sm leading-relaxed">
                {{ $project->description }}
            </p>

            <div class="flex items-center text-sm text-gray-700">
                <i class="fas fa-calendar-day"></i>
                <span class="ml-1 text-gray-900">
                    {{ $project->deadline->format('F j, Y') }}
                </span>
            </div>
        </div>

        <div class="flex justify-end mt-auto">
            <a href=#
                class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow hover:bg-red-600 transition">
                Update
            </a>
        </div>
    </div>
@endsection
