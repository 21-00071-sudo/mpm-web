@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col gap-6">
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

            <div class="flex justify-end mt-auto gap-2">
                <form action="" method="">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow hover:bg-red-600 transition">Mark
                        as Complete</button>
                </form>
                <a href={{ route('projects.edit', $project) }}
                    class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow hover:bg-red-600 transition">
                    Update Info
                </a>
            </div>
        </div>

        {{-- TODO: Replace with actual content --}}
        <div class="flex gap-4">
            <div class="bg-white rounded-xl shadow-md p-6 w-1/2">
                <h1 class="font-semibold text-xl">Tasks</h1>

                <hr class="my-4">
                <ul class="space-y-3">
                    <li class="flex justify-between">Lorem ipsum dolor sit amet consectetur adipisicing elit.<span
                            class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            DELAYED</span></li>
                    <li class="flex justify-between">Lorem ipsum dolor sit amet consectetur adipisicing elit.<span
                            class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            IN PROGRESS</span></li>
                    <li class="flex justify-between">Lorem ipsum dolor sit amet consectetur adipisicing elit.<span
                            class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            PENDING</span></li>
                    <li class="flex justify-between">Lorem ipsum dolor sit amet consectetur adipisicing elit.<span
                            class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            COMPLETED</span></li>
                </ul>
            </div>

            {{-- TODO: Replace with actual content --}}
            <div class="bg-white rounded-xl shadow-md p-6 w-1/3">
                <h1 class="font-semibold text-xl">Members</h1>

                <hr class="my-4">
                <ul class="space-y-2">
                    <li class="flex justify-start"><span
                            class="px-3 py-1 mr-2 min-w-24 text-xs font-semibold rounded-full bg-gray-100 text-gray-800"><i
                                class="fas fa-user mr-2"></i>ADMIN</span>John Doe</li>
                    <li class="flex justify-start"><span
                            class="px-3 py-1 mr-2 min-w-24 text-xs font-semibold rounded-full bg-gray-100 text-gray-800"><i
                                class="fas fa-user mr-2"></i>STAFF</span>Jane Doe</li>
                    <li class="flex justify-start"><span
                            class="px-3 py-1 mr-2 min-w-24 text-xs font-semibold rounded-full bg-gray-100 text-gray-800"><i
                                class="fas fa-user"></i>STUDENT</span>Foo Bar</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
