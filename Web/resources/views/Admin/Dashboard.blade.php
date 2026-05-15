@extends('layouts.app')
@section('title', 'Painel do Admin')

@section('header')
    <div class="flex items-center justify-between border-b border-white mb-3 pb-4">
        <div class="text-white">
            <h1 class="text-xl font-bold">Work<span class="text-Secondary">Vale</span></h1>
            <p class="text-xs">Painel Administrativo</p>
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="px-2 py-1 rounded-xl border-2 border-white bg-transparent">
                <i class="fas fa-sign-out-alt text-white cursor-pointer transition"></i>
            </button>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-5 mb-8">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between flex-col text-center">
                <p class="text-sm text-gray-500">Total de Usuários</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">128</p>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> +12% este mês
                </p>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between flex-col text-center">
                <p class="text-sm text-gray-500">Trabalhos Ativos</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">32</p>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> +5 this week
                </p>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between flex-col text-center">
                <p class="text-sm text-gray-500">Taxa de Sucesso</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">94%</p>
                <p class="text-xs text-green-600 mt-2">
                    <i class="fas fa-arrow-up"></i> +2% este mês
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800" id="pageTitle">Dashboard</h2>
            <p class="text-sm text-gray-500 mt-1">Bem-vindo de volta, Admin! Aqui está o resumo da sua
                plataforma</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <i class="fas fa-bell text-gray-500 cursor-pointer hover:text-primary-dark transition"></i>
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
            </div>
            <div class="flex items-center gap-2 bg-white px-3 py-2 rounded-xl shadow-sm">
                <i class="fas fa-calendar-alt text-gray-400"></i>
                <span class="text-sm text-gray-600" id="currentDate"></span>
            </div>
        </div>
    </div>

    <div class="page-content">
        <!-- Gráficos -->
        <div class="flex flex-col gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Crescimento de Usuários</h3>
                <canvas id="usersChart" height="200"></canvas>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Trabalhos por Mês</h3>
                <canvas id="jobsChart" height="200"></canvas>
            </div>
        </div>

        <!-- Últimos Usuários -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Últimos Usuários Cadastrados</h3>
                <button class="text-sm" style="color: var(--primary-dark);">Ver todos <i
                        class="fas fa-arrow-right ml-1"></i></button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Usuário</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="table-row">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium text-gray-800">Maria Silva</p>
                                    <p class="text-xs text-gray-500">maria@email.com</p>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="status-badge"
                                    style="background: rgba(106, 38, 152, 0.1); color: var(--primary-dark);">Freelancer</span>
                            </td>
                            <td class="px-6 py-4"><span class="status-badge"
                                    style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">Ativo</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">23/04/2024</td>
                            <td class="px-6 py-4"><button class="text-gray-400 hover:text-primary-dark"><i
                                        class="fas fa-edit"></i></button></td>
                        </tr>
                        <tr class="table-row">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium text-gray-800">João Santos</p>
                                    <p class="text-xs text-gray-500">joao@email.com</p>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="status-badge"
                                    style="background: rgba(52, 152, 219, 0.1); color: var(--accent-blue);">Empresa</span>
                            </td>
                            <td class="px-6 py-4"><span class="status-badge"
                                    style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">Ativo</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">22/04/2024</td>
                            <td class="px-6 py-4"><button class="text-gray-400 hover:text-primary-dark"><i
                                        class="fas fa-edit"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
