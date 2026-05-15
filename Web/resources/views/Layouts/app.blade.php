<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | @yield('title')</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans">
    <div class="max-w-md mx-auto relative min-h-screen">
        <!-- Header Profissional -->
        <div class="bg-linear-to-r from-Primary to-Primary-dark px-7 py-6 rounded-b-3xl mb-6">
            @yield('header')
        </div>

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" {{-- Some após 4 segundos --}}
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed bottom-5 right-5 z-50">
                <div class="bg-green-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3">
                    <i class="fas fa-check-circle text-xl"></i>
                    <div>
                        <p class="font-bold">Sucesso!</p>
                        <p class="text-sm opacity-90">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 hover:text-gray-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @elseif (session('error'))
            <div x-data="{ show: true }" x-show="show"
                class="fixed bottom-5 right-5 bg-red-600 text-white p-4 rounded-lg shadow-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Conteúdo Principal -->
        <div class="px-5">
            @yield('content')
        </div>

        <!-- Bottom Navigation Profissional -->
        <div
            class=" fixed bottom-4 left-4 right-4 max-w-sm mx-auto rounded-full shadow-lg p-2 flex justify-around items-center border border-Dark bg-white/8 backdrop-blur-xl">
            @if (Auth::guard('web')->check())
                <a href="{{ route('user.home') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('user.home') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-home text-lg"></i>
                    <span class=" text-xs mt-1">Início</span>
                </a>
            @elseif (Auth::guard('company')->check())
                <a href="{{ route('company.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-home text-lg"></i>
                    <span class=" text-xs mt-1">Dashboard</span>
                </a>
            @elseif (Auth::guard('admin')->check())
                <a href="{{ route('admin.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('admin.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-home text-lg"></i>
                    <span class=" text-xs mt-1">Dashboard</span>
                </a>
            @endif


            @if (Auth::guard('web')->check())
                <a href="{{ route('user.mural') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('user.mural') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-chart-bar text-lg"></i>
                    <span class=" text-xs mt-1">Mural</span>
                </a>
            @elseif (Auth::guard('company')->check())
                <a href="{{ route('company.newwork') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.newwork') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-plus text-lg"></i>
                    <span class=" text-xs mt-1">New Work</span>
                </a>
            @elseif (Auth::guard('admin')->check())
                <a href="{{ route('admin.users') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('admin.users') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-users w-5"></i>
                    <span class=" text-xs mt-1">Usuários</span>
                </a>
            @endif


            @if (Auth::guard('web')->check())
                <a href="{{ route('user.myjobs') }}"
                    class="flex flex-col items-center decoration-0 {{ request()->routeIs('user.myjobs') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-briefcase text-lg"></i>
                    <span class=" text-xs mt-1">Meus Jobs</span>
                </a>
            @elseif (Auth::guard('company')->check())
                <a href="{{ route('company.myjobs') }}"
                    class="flex flex-col items-center decoration-0 {{ request()->routeIs('company.myjobs') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-briefcase text-lg"></i>
                    <span class=" text-xs mt-1">Meus Jobs</span>
                </a>
            @elseif (Auth::guard('admin')->check())
                <a href="{{ route('company.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-briefcase w-5"></i>
                    <span class=" text-xs mt-1">Trabalhos</span>
                </a>
            @endif


            @if (Auth::guard('web')->check())
                <a href="{{ route('user.wallet') }}"
                    class="flex flex-col items-center decoration-0 {{ request()->routeIs('user.wallet') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-wallet text-lg"></i>
                    <span class=" text-xs mt-1">Carteira</span>
                </a>
            @elseif (Auth::guard('company')->check())
                <a href="{{ route('company.wallet') }}"
                    class="flex flex-col items-center decoration-0 {{ request()->routeIs('company.wallet') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-wallet text-lg"></i>
                    <span class=" text-xs mt-1">Carteira</span>
                </a>
            @elseif (Auth::guard('admin')->check())
                <a href="{{ route('company.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-tags w-5"></i>
                    <span class=" text-xs mt-1">Categorias</span>
                </a>
            @endif


            @if (Auth::guard('admin')->check())
                <a href="{{ route('company.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-credit-card w-5"></i>
                    <span class="text-xs mt-1">Transações</span>
                </a>
            @endif

            {{-- Denuncias Ficam na tela de users --}}
            {{-- @if (Auth::guard('admin')->check())
                <a href="{{ route('company.dashboard') }}"
                    class="flex flex-col items-center decoration-0  {{ request()->routeIs('company.dashboard') ? 'text-Primary-dark' : 'text-gray-600 hover:text-Primary-dark transition duration-200' }}">
                    <i class="fas fa-flag w-5"></i>
                    <span class=" text-xs mt-1">Denúncias</span>
                </a>
            @endif --}}
        </div>
        <div style="height: 5rem;"></div>
    </div>
</body>

</html>
