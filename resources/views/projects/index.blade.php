@extends('layouts.dashboard')

@section('content')
    <div>
        <div class="flex flex-row items-baseline space-x-6">
            <a href={{ route('projects.index') }}
                class="text-4xl font-bold mb-6 hover:text-gray-600 hover:underline transition-colors duration-200">Projects</a>

            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'staff')
                <a href=#
                    class="bg-red-500 text-gray-50 font-semibold py-2 px-4 rounded-md shadow-md hover:bg-red-600 transition-colors m-0">Create
                    Project</a>
            @endif
        </div>

        <div class="flex flex-wrap -mx-2 gap-4">
            @foreach ($projects as $project)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)] flex flex-col min-h-[230px]">
                    <div class="p-6 flex-1">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">
                            {{ $project->title }}
                        </h2>
                    </div>

                    <div class="p-6 pt-0 mt-auto">
                        <div class="mb-4 text-right">
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->status_color }}">
                                {{ $project->formatted_status }}
                            </span>
                        </div>
                        <a href={{ route('projects.show', $project->id) }}
                            class="w-full text-center bg-red-500 text-white font-semibold py-2 px-4 rounded-md inline-block hover:bg-red-600 transition-colors">
                            Select
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $projects->links() }}
    </div>
@endsection
