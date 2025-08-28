<aside id="sidebar" class="flex flex-col h-screen bg-red-500 w-64 shadow-lg p-4 transition-all duration-300">
    @auth
        <div class="flex flex-col justify-center items-center text-gray-50 transition-all duration-300">
            <i id="user-icon" class="fa-solid fa-circle-user text-7xl mb-4"></i>
            <h1 class="font-bold overflow-hidden">{{ Auth::user()->name }}</h1>
            <p class="text-xs overflow-hidden" style="text-transform: uppercase;">{{ Auth::user()->role }}</p>
        </div>


        <hr class="my-4 border-gray-50" />
        <nav class="flex flex-grow">
            <ul id="navigation" class="text-gray-50 flex-1 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex flex-1 items-center p-2 gap-2 rounded-md transition-all duration-300
                    {{ request()->routeIs('dashboard') ? 'bg-gray-50 text-red-500' : 'hover:bg-gray-50 hover:text-red-500' }}">
                        <i class="fas fa-home fa-xl"></i>
                        <span class="text-xl whitespace-nowrap overflow-hidden">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('projects.index') }}"
                        class="flex flex-1 items-center p-2 gap-2 rounded-md transition-all duration-300
                    {{ request()->routeIs('projects.*') ? 'bg-gray-50 text-red-500' : 'hover:bg-gray-50 hover:text-red-500' }}">
                        <i class="fas fa-diagram-project fa-xl"></i>
                        <span class="text-xl whitespace-nowrap overflow-hidden">Projects</span>
                    </a>
                </li>

                <li>
                    <a href={{ route('tasks.index') }}
                        class="flex flex-1 items-center p-2 gap-2 rounded-md transition-all duration-300
                    {{ request()->routeIs('tasks.*') ? 'bg-gray-50 text-red-500' : 'hover:bg-gray-50 hover:text-red-500' }}">
                        <i class="fas fa-list-check fa-xl"></i>
                        <span class="text-xl whitespace-nowrap overflow-hidden">Tasks</span>
                    </a>
                </li>

                <li>
                    <a href={{ route('files.index') }}
                        class="flex flex-1 items-center p-2 gap-2 rounded-md transition-all duration-300
                    {{ request()->routeIs('files.*') ? 'bg-gray-50 text-red-500' : 'hover:bg-gray-50 hover:text-red-500' }}">
                        <i class="fas fa-folder fa-xl"></i>
                        <span class="text-xl whitespace-nowrap overflow-hidden">Files</span>
                    </a>
                </li>

                @if (Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="flex flex-1 items-center p-2 gap-2 rounded-md transition-all duration-300
                        {{ request()->routeIs('users.*') ? 'bg-gray-50 text-red-500' : 'hover:bg-gray-50 hover:text-red-500' }}">
                            <i class="fas fa-users fa-xl"></i>
                            <span class="text-xl whitespace-nowrap overflow-hidden">Users</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

    @endauth
</aside>
