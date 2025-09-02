@extends('layouts.dashboard')

@section('content')
    <div class="text-4xl font-bold mb-6">
        <a href={{ route('projects.index') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Projects</a><i
            class="fa fa-angle-right"></i><a href={{ route('projects.show', $project->id) }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Selected Project</a><i
            class="fa fa-angle-right"></i><a href={{ route('project-users.index', $project->id) }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Manage Members</a>
    </div>

    <div class="flex justify-center items-center gap-4 h-full min-h-[calc(100vh-300px)]">
        <div class="bg-white shadow-md rounded-xl p-6 w-1/3">
            <h1 class="text-xl font-semibold mb-4">Available Users</h1>
            <ul class="divide-y divide-gray-200 max-h-80 overflow-y-auto pr-2">
                @foreach ($users as $user)
                    <li class="flex items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                {{ $user->role }}
                            </span>
                            <span class="text-gray-700 font-medium">{{ $user->name }}</span>
                        </div>
                        <button class="p-2 rounded-full hover:bg-red-100 transition-colors">
                            <i class="fa-solid fa-user-plus text-red-500 hover:text-red-600"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6 w-1/3">
            <h1 class="text-xl font-semibold mb-4">Project Members</h1>
            <ul class="divide-y divide-gray-200 max-h-80 overflow-y-auto pr-2">
                @foreach ($users as $user)
                    <li class="flex items-center justify-between py-3">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                {{ $user->role }}
                            </span>
                            <span class="text-gray-700 font-medium">{{ $user->name }}</span>
                        </div>
                        <button class="p-2 rounded-full hover:bg-red-100 transition-colors">
                            <i class="fa-solid fa-trash text-red-500 hover:text-red-600"></i>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
