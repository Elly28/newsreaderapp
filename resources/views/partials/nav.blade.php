<nav class="bg-blue-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex space-x-6">
            <a href="/" class="text-white
                font-semibold hover:text-gray-200">Home
            </a>
            @foreach ($categories as $category)
                <a href="/{{ $category->name }}" class="text-white
                    font-semibold hover:text-gray-200">{{ ucfirst($category->name) }}
                </a>
            @endforeach
            <a href="{{ route('mostread') }}" class="text-white font-semibold hover:text-gray-200">
                Most Read
            </a>
            @auth
                <a href="{{ route('favorites') }}" class="text-white font-semibold hover:text-gray-200">
                    Favorites
                </a>
            @endauth
        </div>

        <div class="flex items-center space-x-4">            
            <!-- Dark Mode Toggle -->
            <button @click="darkMode = !darkMode" class="text-white bg-gray-800 px-4 py-2 rounded-md hover:bg-gray-700">
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode">🌞</span>
            </button>
            <div>
                <!-- Check if user is logged in or not -->
                @guest
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-white bg-blue-700 px-4 py-2 rounded-md hover:bg-blue-800">Login</a>
                        <a href="{{ route('register') }}" class="text-white bg-green-600 px-4 py-2 rounded-md hover:bg-green-700">Sign Up</a>
                    </div>
                @endguest
                <!-- If user is logged in -->
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-white">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>!</span>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="text-white bg-red-600 px-4 py-2 rounded-md hover:bg-red-700">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>