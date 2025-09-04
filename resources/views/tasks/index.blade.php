@extends('layouts.dashboard')

@section('content')
    <div>
        <div class="flex flex-row items-baseline space-x-6">
            <a href={{ route('tasks.index') }}
                class="text-4xl font-bold mb-6 hover:text-gray-600 hover:underline transition-colors duration-200">Tasks</a>
        </div>

        <div class="flex flex-col gap-10 max-h-[calc(100vh-200px)] p-6 overflow-y-auto">
            @foreach ($projects as $project)
                <div class="flex flex-col p-6 rounded-lg shadow-lg w-full bg-white">
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <h1 class="text-xl font-semibold">{{ $project->title }}</h1>
                        <a href={{ route('tasks.manage', $project->id) }}
                            class="text-md font-medium text-red-500 hover:text-red-600">Manage Tasks</a>
                    </div>

                    {{-- TODO: Replace task placeholder with actual data from the database --}}
                    <div class="flex gap-4">
                        <div
                            class="flex flex-col flex-1 p-6 bg-white rounded-md shadow-md transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                            <h1 class="text-lg font-semibold text-gray-700">Task 1</h1>
                            <span
                                class="ml-auto px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">DELAYED</span>
                        </div>
                        <div
                            class="flex flex-col flex-1 p-6 bg-white rounded-md shadow-lg transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                            <h1 class="text-lg font-semibold text-gray-700">Task 2</h1>
                            <span
                                class="ml-auto px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">IN
                                PROGRESS
                            </span>
                        </div>
                        <div
                            class="flex flex-col flex-1 p-6 bg-white rounded-md shadow-lg transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                            <h1 class="text-lg font-semibold text-gray-700">Task 3</h1>
                            <span
                                class="ml-auto px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">COMPLETED
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
