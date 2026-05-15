@extends('Layouts.app')
@section('title', 'Usuarios')

@section('header')
    <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-white">Gerenciar Usuários</h3>

        <div class="bg-white rounded-full px-2 py-1.5">
            <i class="fas fa-users w-5 text-Primary-dark"></i>
        </div>
    </div>
@endsection

@section('content')
    <!-- PÁGINA: USUÁRIOS -->
    <div class="flex justify-between items-center mb-3 gap-3">
        <div class="flex gap-3">
            <div class="flex-1 relative">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Buscar usuários..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
            </div>

            <select class="px-4 py-2 rounded-lg border border-gray-200">
                <option selected class="hidden">Todos os tipos</option>

                <option>Freelancer</option>
                <option>Empresa</option>
                <option>Admin</option>
            </select>
        </div>

        <div class="flex items-center justify-center">
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-x-5" x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                    @click.away="open = false"
                    class="absolute top-full right-full mb-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                    style="display: none;">

                    <div class="p-1">
                        <a href="#" class="block rounded-xl px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Freelancer
                        </a>
                        <a href="#" class="block rounded-xl px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Empresa
                        </a>
                        <a href="#" class="block rounded-xl px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Administrativo
                        </a>
                    </div>
                </div>

                <button @click="open = true"
                    class=" relative px-3 py-2 rounded-full text-white text-sm font-medium bg-Primary-dark">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        @foreach ($users as $user)
            <div class="bg-black rounded-xl relative">
                <div class="absolute top-0 left-0 p-4 bg-linear-to-r from-Primary-dark to-Primary flex justify-between items-center">
                    
                </div>

                <div>
                    Ola
                </div>
            </div>
        @endforeach
    </div>


    <div class="p-4 border-t border-gray-100 flex justify-between items-center">
        <p class="text-sm text-gray-500">Mostrando 3 de 128 usuários</p>
        <div class="flex gap-2"><button class="px-3 py-1 rounded border">Anterior</button><button
                class="px-3 py-1 rounded bg-primary-dark text-white">1</button><button
                class="px-3 py-1 rounded border">2</button><button class="px-3 py-1 rounded border">3</button><button
                class="px-3 py-1 rounded border">Próximo</button>
        </div>
    </div>
@endsection

<!-- Card 5 - Empresa Normal -->
{{-- <div class="user-card bg-white rounded-xl p-4 shadow-sm border border-gray-100" data-type="freelancer"
    data-status="inactive" data-name="Carlos Lima" data-email="carlos.lima@email.com">
    <div class="flex items-start gap-3">
        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0"
            style="background: linear-gradient(135deg, #6c757d, #495057);">
            <i class="fas fa-user text-white text-lg"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-1">
                <h3 class="font-semibold text-gray-800 text-base">Carlos Lima</h3>
                <div class="flex items-center gap-1">
                    <button class="action-btn w-8 h-8 rounded-full text-gray-400 hover:text-primary-dark"
                        onclick="editUser(4)">
                        <i class="fas fa-edit text-sm"></i>
                    </button>
                    <button class="action-btn w-8 h-8 rounded-full text-gray-400 hover:text-red-500"
                        onclick="deleteUser(4)">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </button>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-2 truncate">
                <i class="fas fa-envelope mr-1"></i> carlos.lima@email.com
            </p>
            <div class="flex flex-wrap items-center gap-2 mb-2">
                <span class="type-badge" style="background: rgba(106, 38, 152, 0.1); color: var(--primary-dark);">
                    <i class="fas fa-user-astronaut text-xs"></i> Freelancer
                </span>
                <span class="status-badge" style="background: rgba(108, 117, 125, 0.1); color: #6c757d;">
                    <i class="fas fa-ban text-xs"></i> Inativo
                </span>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400"><i class="far fa-calendar-alt mr-1"></i> Cadastro: 10/02/2024</span>
                <span class="text-gray-400"><i class="fas fa-briefcase mr-1"></i> 3 trabalhos</span>
            </div>
        </div>
    </div>
</div>

<!-- Card 5 - Empresa Premium -->
<div class="user-card bg-white rounded-xl p-4 shadow-sm border border-yellow-200"
    style="background: rgba(255, 193, 7, 0.05);" data-type="empresa" data-status="premium" data-name="TechSolutions"
    data-email="contato@techsolutions.com">
    <div class="flex items-start gap-3">
        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0"
            style="background: linear-gradient(135deg, #FFC107, #FF9800);">
            <i class="fas fa-crown text-white text-lg"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-1">
                <div class="flex items-center gap-2">
                    <h3 class="font-semibold text-gray-800 text-base">TechSolutions</h3>
                    <i class="fas fa-crown text-xs" style="color: var(--accent-yellow);"></i>
                </div>
                <div class="flex items-center gap-1">
                    <button class="action-btn w-8 h-8 rounded-full text-gray-400 hover:text-primary-dark"
                        onclick="editUser(5)">
                        <i class="fas fa-edit text-sm"></i>
                    </button>
                    <button class="action-btn w-8 h-8 rounded-full text-gray-400 hover:text-red-500"
                        onclick="deleteUser(5)">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </button>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-2 truncate">
                <i class="fas fa-envelope mr-1"></i> contato@techsolutions.com
            </p>
            <div class="flex flex-wrap items-center gap-2 mb-2">
                <span class="type-badge" style="background: rgba(52, 152, 219, 0.1); color: var(--accent-blue);">
                    <i class="fas fa-building text-xs"></i> Empresa
                </span>
                <span class="status-badge" style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                    <i class="fas fa-gem text-xs"></i> Premium
                </span>
                <span class="status-badge" style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">
                    <i class="fas fa-check-circle text-xs"></i> Verificado
                </span>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400"><i class="far fa-calendar-alt mr-1"></i> Cadastro: 05/01/2024</span>
                <span class="text-gray-400"><i class="fas fa-briefcase mr-1"></i> 15 vagas</span>
            </div>
        </div>
    </div>
</div> --}}
