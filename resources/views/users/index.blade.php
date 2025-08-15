@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-red-200">
            <thead class="bg-red-500">
                <tr class="text-gray-50 font-semibold">
                    <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">Username</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs  uppercase tracking-wider">Role</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-red-50">

                @foreach ($users as $user)
                    <tr class="hover:bg-red-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $user->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="text-transform: uppercase;">
                            {{ $user->role }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $users->links() }}
@endsection
