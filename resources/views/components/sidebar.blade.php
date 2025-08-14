<aside class="flex flex-col h-screen bg-red-500 w-64 shadow-lg p-4">
    @auth
        <div class="flex flex-col justify-center items-center text-gray-50">
            <i class="fa-solid fa-circle-user text-7xl mb-4"></i>
            <h1 class="font-bold ">{{ Auth::user()->name }}</h1>
            <p class="text-xs" style="text-transform: uppercase;">{{ Auth::user()->role }}</p>
        </div>
    @endauth

    <hr class=" my-4 border-gray-50" />
    <nav class="flex flex-grow">
        <ul class="text-gray-50 space-y-2 flex-1">
            <li>
                <a href="#" class="flex flex-1 items-center p-2 gap-2 rounded-md hover:bg-gray-50 hover:text-red-500 transition-all duration-300">
                    <i class="fas fa-home fa-xl"></i>
                    <span class="text-xl">Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-1 items-center p-2 gap-2 rounded-md hover:bg-gray-50 hover:text-red-500 transition-all duration-300">
                    <i class="fas fa-diagram-project fa-xl"></i>
                    <span class="text-xl">Projects</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-1 items-center p-2 gap-2 rounded-md hover:bg-gray-50 hover:text-red-500 transition-all duration-300">
                    <i class="fas fa-list-check fa-xl"></i>
                    <span class="text-xl">Tasks</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-1 items-center p-2 gap-2 rounded-md hover:bg-gray-50 hover:text-red-500 transition-all duration-300">
                    <i class="fas fa-folder fa-xl"></i>
                    <span class="text-xl">Files</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex flex-1 items-center p-2 gap-2 rounded-md hover:bg-gray-50 hover:text-red-500 transition-all duration-300">
                    <i class="fas fa-users fa-xl"></i>
                    <span class="text-xl">Users</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>