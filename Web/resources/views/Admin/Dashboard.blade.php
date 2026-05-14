@extends('layouts.app')
@section('title', 'Painel do Admin')

@section('header')
    <div class="text-white mb-6 border-b border-white pb-3">
        <h1 class="text-xl font-bold">Work<span class="text-Secondary">Vale</span></h1>
        <p class="text-xs">Painel Administrativo</p>
    </div>

    <div class="grid grid-cols-2 gap-5 mb-8">
        <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500">Total de Usuários</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">128</p>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> +12% este mês</p>
                </div>

                <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-Dark/10">
                    <i class="fas fa-users text-xl text-Primary-dark"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500">Trabalhos Ativos</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">32</p>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> +5 this
                        week</p>
                </div>
                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                    style="background: rgba(255, 193, 7, 0.1);">
                    <i class="fas fa-briefcase text-xl" style="color: var(--accent-yellow);"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500">Volume Financeiro</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">R$ 42.5k</p>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> +18% este
                        mês</p>
                </div>
                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                    style="background: rgba(110, 203, 99, 0.1);">
                    <i class="fas fa-dollar-sign text-xl" style="color: var(--accent-green);"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500">Taxa de Sucesso</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">94%</p>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> +2% este
                        mês</p>
                </div>
                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                    style="background: rgba(52, 152, 219, 0.1);">
                    <i class="fas fa-chart-line text-xl" style="color: var(--accent-blue);"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
