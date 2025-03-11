            <!-- Sidebar -->
            <aside class="w-64 bg-white dark:bg-gray-800 p-6 hidden md:block">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">TheBrightSide</h2>
                <nav class="space-y-2">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" 
                        class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded 
                                text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 
                                {{ request()->routeIs('dashboard') ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ url('/threads') }}" 
                        class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded 
                                text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 
                                {{ request()->routeIs('threads') ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                            Threads
                        </a>

                        <a href="{{ url('/content-creation') }}" 
                        class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded 
                                text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 
                                {{ request()->routeIs('content-creation') ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                            Content Creation
                        </a>

                        <a href="{{ url('/connect') }}" 
                        class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded 
                                text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 
                                {{ request()->routeIs('connect') ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                            Connect
                        </a>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-4 py-2 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </aside>
