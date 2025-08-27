@extends('layouts.dashboard')

@section('content')
    <div class="text-4xl font-bold mb-6">
        <a href={{ route('users.index') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">User</a><i
            class="fa fa-angle-right"></i><a href={{ route('users.create') }}
            class="hover:text-gray-600 hover:underline transition-colors duration-200">Create User</a>
    </div>
    <div class="flex flex-col justify-center items-center gap-4">

        @if (session('user'))
            @php
                $user = session('user');
            @endphp

            <div class="flex flex-col bg-white p-6 rounded-lg shadow-xl font-semibold w-1/2 gap-4">
                <h2 class="bg-green-100 text-green-500 rounded-md font-semibold p-2 text-center">Account Created
                    Successfully
                </h2>
                <div class="bg-gray-100 p-4 rounded-md flex flex-col">
                    <p>NAME: <span id="name" class="text-gray-700">{{ $user->name }}</span></p>
                    <p>USERNAME: <span id="username" class="text-gray-700">{{ $user->username }}</span></p>
                    <p>PASSWORD: <span id="password" class="text-gray-700">{{ $user->plain_password }}</span></p>
                </div>

                <div class="flex justify-end">
                    <button id="copy-btn" onclick="copyCredentials()"
                        class="p-2 min-w-32 bg-red-500 text-gray-50 flex items-center justify-center rounded-md gap-2 hover:bg-red-600">
                        <i class="fas fa-copy"></i>Copy
                    </button>
                </div>
            </div>
        @endif

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

<script>
    function copyCredentials() {
        const copyBtn = document.getElementById('copy-btn')

        const copyName = document.getElementById('name');
        const copyUsername = document.getElementById('username');
        const copyPassword = document.getElementById('password');

        const combinedText = copyName.innerText + '\n' + copyUsername.innerText + '\n' + copyPassword.innerText;

        const tempInput = document.createElement('textarea');
        tempInput.value = combinedText;
        tempInput.style.position = 'absolute';
        tempInput.style.left = '-9999px';
        document.body.appendChild(tempInput);

        tempInput.select();

        try {
            const successful = document.execCommand('copy');
            // const msg = successful ? 'successful' : 'unsuccessful';
            if (successful) {
                copyBtn.innerHTML = '<i class="fas fa-check"></i>Copied!'
            }

        } catch (err) {
            console.error('Oops, unable to copy', err);
        }

        document.body.removeChild(tempInput);
    }
</script>
