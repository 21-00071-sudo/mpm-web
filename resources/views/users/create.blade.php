@extends('layouts.dashboard')

@section('content')
    <h1 class="text-4xl font-bold mb-6">Add User</h1>
    <div class="flex justify-center items-center">

        <form action={{ route('users.store') }} method="POST"
            class="flex flex-col bg-white p-10 rounded-lg shadow-xl w-1/2 gap-4">
            @csrf

            <div class="flex flex-col w-auto">
                <label for="name" class="text-lg font-semibold text-gray-700">Name</label>
                <input type="text" id="name" name="name" maxlength="150" required
                    class="bg-gray-100 rounded-md border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
            </div>
            <div class="flex flex-col w-auto">
                <label for="role" class="text-lg font-semibold text-gray-700">Role</label>
                <div class="flex flex-row justify-around">
                    <div>
                        <input type="radio" id="staff" name="role" value="staff" required>
                        <label for="staff">Staff</label>
                    </div>
                    <div>
                        <input type="radio" id="student" name="role" value="student">
                        <label for="student">Student</label>
                    </div>
                    <div>
                        <input type="radio" id="admin" name="role" value="admin">
                        <label for="admin">Admin</label>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="bg-red-500 text-gray-50 px-4 h-10 rounded-md shadow-lg font-semibold hover:bg-red-600 transition-colors">Add</button>
        </form>
    </div>
@endsection
