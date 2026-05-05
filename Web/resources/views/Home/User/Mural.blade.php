@extends('Layouts.app')
@section('title', 'Mural')


@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Mural de Oportunidades</h1>
            </div>

            <div class="relative">
                <button
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-sliders-h text-Primary-dark"></i>
                </button>
            </div>
        </div>

        <p class="text-sm text-gray-200">Encontre as melhores oportunidades para você</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input type="text" id="searchInput" class="search-input w-full pl-12 pr-4 py-3 rounded-xl bg-white"
                placeholder="Buscar por título, empresa ou localização...">
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 overflow-x-auto whitespace-nowrap pb-2 scrollbar-hide">
        <div class="flex gap-2">
            <span
                class="filter-chip active px-4 py-2 rounded-full text-sm font-medium bg-Primary-dark text-white">Todas</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Tecnologia</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Design</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Marketing</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Remoto</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Presencial</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Alta Demanda</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-24">
        <!-- Results Count -->
        <div class="flex justify-between items-center mb-4">
            <p class="text-sm text-gray-500"><span id="resultsCount">12</span> oportunidades encontradas</p>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Ordenar por:</span>
                <select class="text-sm border-none bg-transparent font-medium" style="color: var(--primary-dark);">
                    <option>Mais recentes</option>
                    <option>Maior valor</option>
                    <option>Menor valor</option>
                    <option>Mais relevantes</option>
                </select>
            </div>
        </div>

        {{-- Aplicar a lista de Oportunidades --}}
        <div class="space-y-3">
            <!-- Cards -->
            @foreach ($works as $work)
                <div class="bg-white rounded-xl p-4 border border-gray-300 shadow-">
                    <div class="flex justify-between items-start mb-1">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="bg-Secondary text-black text-xs font-medium px-2 py-1 rounded-lg">
                                    Prioridade
                                </span>
                                <span class="bg-Primary text-white text-xs font-medium px-2 py-1 rounded-lg">
                                    Remoto
                                </span>
                            </div>

                            <span class="bg-Primary-light px-4 py-0.5 rounded-xl text-center">
                                <span class=" text-Primary-dark text-xs font-medium">Cores</span>
                            </span>
                        </div>
                    </div>

                    <div class="mb-2">
                        <h4 class=" font-bold text-Dark text-xl">
                            {{ $work->name_work }}
                        </h4>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-building mr-2"></i>
                            {{ $work->company->company_name }}
                        </p>
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star text-Secondary text-sm"></i>
                            <i class="fas fa-star text-Secondary text-sm"></i>
                            <i class="fas fa-star text-Secondary text-sm"></i>
                            <i class="fas fa-star text-Secondary text-sm"></i>
                            <i class="fas fa-star-half-alt text-Secondary text-sm"></i>
                            <span class="text-xs text-gray-500 ml-1">(48)</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-lg font-bold text-Success">R$ {{ $work->payment }}</p>
                        </div>

                        <button x-data @click="$dispatch('open-modal', { name: 'modal-{{ $work->id }}' })"
                            class="bg-Primary text-white px-4 py-2 rounded-lg font-medium hover:bg-Primary-dark transition-colors duration-300 cursor-pointer">
                            Ver detalhes <i class="fas fa-arrow-right text-xs ml-2"></i>
                        </button>

                        {{-- Modal de Works --}}
                        <x-modal-works name="modal-{{ $work->id }}" title="{{ $work->name_work }}">
                            <!-- Header com Imagem de Capa -->
                            <div class="relative">
                                <div class="h-32 bg-linear-to-r from-Primary-dark to-Primary"></div>
                                <div class="absolute -bottom-8 left-6">
                                    <div
                                        class="w-20 h-20 rounded-2xl bg-white shadow-lg flex items-center justify-center p-2">
                                        <i class="fas fa-palette text-4xl text-Primary-dark"></i>
                                    </div>
                                </div>

                                <button @click="show = false"
                                    class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white hover:bg-white/30 transition">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <!-- Conteúdo Principal -->
                            <div class="p-6 pt-10">
                                <!-- Título e Avaliação -->
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $work->name_work }}</h2>

                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center">
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                            </div>

                                            <span class="text-sm font-medium text-gray-700">4.8/5.0</span>
                                            <span class="text-xs text-gray-400">(24 avaliações)</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Empresa e Localização -->
                                <div class="flex items-center gap-4 mb-6 p-3 rounded-xl bg-gray-100">
                                    <div class=" w-12 h-12 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-building text-Primary text-2xl"></i>
                                    </div>

                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $work->company->company_name }}</p>
                                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                                            <span><i class="fas fa-map-marker-alt mr-1 text-Primary-dark"></i>
                                                {{ $work->company->city->city }}, {{ $work->company->city->uf }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Descrição -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center gap-2">
                                        <i class="fas fa-align-left text-Primary-dark"></i>
                                        Descrição
                                    </h3>

                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $work->description_work }}
                                    </p>
                                </div>

                                <!-- Requisitos -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center gap-2">
                                        <i class="fas fa-check-circle text-Primary-dark"></i>
                                        Requisitos
                                    </h3>
                                    <div class="flex flex-wrap gap-2">
                                        @forelse ($work->skills as $skill)
                                            <span
                                                class="px-3 py-1.5 rounded-full text-sm font-medium bg-Primary-light text-Primary-dark border border-Primary-dark">
                                                <i class="fas fa-paintbrush mr-1"></i> {{ $skill->skill }}
                                            </span>
                                        @empty
                                            <span class="text-gray-400">Nenhuma skill listada.</span>
                                        @endforelse
                                    </div>
                                </div>

                                <!-- Detalhes do Trabalho -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                        <i class="fas fa-info-circle text-Primary-dark"></i>
                                        Detalhes
                                    </h3>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-building text-Primary-dark"></i>
                                                <span class="text-xs text-gray-500">Empresa</span>
                                            </div>
                                            <p class="font-medium text-gray-800">{{ $work->company->company_name }}</p>
                                        </div>

                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-map-marker-alt text-Primary-dark"></i>
                                                <span class="text-xs text-gray-500">Localização</span>
                                            </div>
                                            <p class="font-medium text-gray-800">{{ $work->company->city->city }},
                                                {{ $work->company->city->uf }}</p>
                                        </div>

                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-star text-Secondary"></i>
                                                <span class="text-xs text-gray-500">Avaliação</span>
                                            </div>
                                            <p class="font-medium text-gray-800">4.8 / 5.0</p>
                                        </div>

                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-calendar-alt text-Primary-dark"></i>
                                                <span class="text-xs text-gray-500">Prazo</span>
                                            </div>
                                            <p class="font-medium text-gray-800">{{ $work->duration }}</p>
                                        </div>
                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-tag text-Success"></i>
                                                <span class="text-xs text-gray-500">Valor</span>
                                            </div>
                                            <p class="text-xl font-bold">R$ {{ $work->payment }}</p>
                                        </div>

                                        <div class="info-card p-3 rounded-xl bg-gray-100">
                                            <div class="flex items-center gap-2 mb-1">
                                                <i class="fas fa-briefcase text-Primary-dark"></i>
                                                <span class="text-xs text-gray-500">Tipo</span>
                                            </div>
                                            <p class="font-medium text-gray-800 font">{{ $work->type_work }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sobre a Empresa -->
                                <div class="mb-6 p-4 rounded-xl bg-Primary-light">
                                    <div class="flex items-center gap-2 mb-2">
                                        <i class="fas fa-medal text-Primary-dark"></i>
                                        <h4 class="font-semibold text-gray-800">Sobre a Empresa</h4>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">
                                        {{ $work->company->description }}
                                    </p>
                                    <div class="flex items-center gap-4 text-xs">
                                        <span><i class="fas fa-check-circle" style="color: var(--accent-green);"></i>
                                            Verificada</span>
                                        <span><i class="fas fa-trophy" style="color: var(--accent-yellow);"></i> Top
                                            Rated</span>
                                    </div>
                                </div>

                                <!-- Portfólio do Cliente -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                        <i class="fas fa-images text-Primary-dark"></i>
                                        Portfólio do Cliente
                                    </h3>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div
                                            class="aspect-square rounded-lg bg-gray-100 flex items-center justify-center cursor-pointer hover:opacity-75 transition">
                                            <i class="fas fa-image text-2xl text-gray-400"></i>
                                        </div>
                                        <div
                                            class="aspect-square rounded-lg bg-gray-100 flex items-center justify-center cursor-pointer hover:opacity-75 transition">
                                            <i class="fas fa-image text-2xl text-gray-400"></i>
                                        </div>
                                        <div
                                            class="aspect-square rounded-lg bg-gray-100 flex items-center justify-center cursor-pointer hover:opacity-75 transition">
                                            <i class="fas fa-image text-2xl text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botões de Ação -->
                                <div class="flex gap-3 pt-4 border-t border-gray-100">
                                    <button @click="show = false"
                                        class="flex-1 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">
                                        <i class="fas fa-times mr-2"></i> Fechar
                                    </button>
                                    <button
                                        class="flex-1 py-3 rounded-xl font-semibold transition bg-Primary-light border border-Primary-dark">
                                        <i class="far fa-bookmark mr-2"></i> Salvar
                                    </button>
                                    <button
                                        class=" flex-1 py-3 rounded-xl text-white font-semibold transition bg-Primary-dark">
                                        <i class="fas fa-paper-plane mr-2"></i> Candidatar-se
                                    </button>
                                </div>
                            </div>
                        </x-modal-works>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-6">
            <button class="px-6 py-2 rounded-lg text-sm font-medium transition"
                style="background: var(--primary-light); color: var(--primary-dark);">
                Carregar mais oportunidades
                <i class="fas fa-chevron-down ml-2"></i>
            </button>
        </div>
    </div>
@endsection
