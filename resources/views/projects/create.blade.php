@extends('layouts.dashboard')

@section('content')
    <div class="text-4xl font-bold mb-6">
        <a href={{ route('projects.index') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Projects</a><i
            class="fa fa-angle-right"></i><a href={{ route('projects.create') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Create Project</a>
    </div>

    <div class="flex justify-center items-center">
        <form action="" method="POST" class="bg-white flex flex-col rounded-lg shadow-md w-1/2 p-6 gap-4 mt-4">
            @csrf

            <div class="flex flex-col w-auto">
                <label for="title" class="text-lg font-semibold text-gray-700">Project Title</label>
                <input type="text" id="title" name="title" required value=""
                    class="bg-gray-100 rounded-md border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
            </div>
            <div class="flex flex-col w-auto">
                <label for="description" class="text-lg font-semibold text-gray-700">Description</label>
                <textarea name="description" id="description"
                    class="bg-gray-100 rounded-md border border-gray-300 h-24 px-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"></textarea>
            </div>

            <div class="flex flex-col w-1/3">
                <label for="deadline" class="block font-semibold text-gray-700">Select Date</label>
                <input type="date" id="deadline" name="deadline" value=""
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <div class="flex gap-4 mt-6">
                <a href={{ route('projects.index') }}
                    class="bg-gray-200 px-3 py-2 text-gray-700 font-semibold rounded-md h-10 shadow-md w-1/2 text-center hover:bg-gray-300">Cancel</a>
                <button type="submit"
                    class=" bg-red-500 px-3 py-2 text-gray-50 font-semibold rounded-md h-10 shadow-md w-1/2 hover:bg-red-600">Save
                    Changes</button>
            </div>
        </form>
    </div>
@endsection
