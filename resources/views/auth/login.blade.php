@extends('layouts.guest')

@section('content')
    <form action="{{ route('login.authenticate') }}" method="POST" class="flex flex-col bg-white p-10 rounded-lg shadow-xl w-96 gap-4">
        @csrf

        <h2 class="text-center font-bold text-3xl text-gray-800">LOGIN</h2>

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <div class="mt-1 relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <input type="text" id="username" name="username" required class="w-full bg-gray-100 border border-gray-300 rounded-md h-10 pl-10 px-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1 relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input type="password" id="password" name="password" required class="w-full bg-gray-100 border border-gray-300 rounded-md h-10 pl-10 px-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
            </div>
        </div>

        <div class="text-right">
            <a href="#" class="text-sm text-red-500 hover:underline">Forgot password?</a>
        </div>
       
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-md transition-colors mt-auto">LOGIN</button>

    </form>
@endsection