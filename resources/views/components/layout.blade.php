<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <meta name="author" content="wasilolly">
    <meta name="description" content="task-manager">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla w-auto flex">

    {{-- side dashboard --}}
    <aside class="relative bg-blue-600 w-54 shadow-xl">
        <div class="p-6">
            <a href="{{ route('task.index') }}"
                class="text-white text-3xl font-semibold uppercase hover:text-gray-300">TOpshiriqlar Paneli</a>
            <button
                class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i><a href="{{ route('task.create') }}">Yangi topshiriq</a>
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('task.index') }}"
                class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tasks mr-3"></i>
                Topshiriqlar
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        {{-- Account Details --}}
        <header class="w-full items-center bg-white py-2 px-6 sm:flex">
            <div class=" row w-1/2"> </div>
            @auth
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen" class="align-content relative z-10 w-auto h-10 mr-4 font-bold">
                        {{ ucwords(auth()->user()->name) }}
                    </button>
                    <button x-show="isOpen" @click="isOpen = false"
                        class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-25 bg-white rounded-lg shadow-lg py-2 mt-6">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 account-link hover:text-white">
                            Account
                        </a>

                        <form action="{{ route('logout') }}" method="post"
                            class="block px-4 py-2 account-link hover:text-white">
                            @csrf
                            <button>Tizimdan chiqish</button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <div class="relative w-1/2 flex justify-end">
                    <a href="/register" class="block px-4 py-2 account-link hover:text-white">Ro'yxatdan o'tish</a>
                    <a href="/login" class="block px-4 py-2 account-link hover:text-white">Tizimga kirish</a>
                </div>
            @endguest
        </header>

        @if (session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class=" fixed top left bg-blue-500 text-white py-2 px-4 w-1/4 rounded-xl text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif


        {{-- body --}}
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-auto flex-grow p-6">
                {{ $slot }}
            </main>

            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="https://t.me/Alimabil" class="underline">
                    Islomov Elyor tomonidan qilingan
                </a>
            </footer>
        </div>

    </div>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</body>

</html>
