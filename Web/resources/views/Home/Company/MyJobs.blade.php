@extends('Layouts.app')
@section('title')
    Meus Jobs
@endsection

@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Meus Trabalhos</h1>
            </div>
            <div class="relative">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center"
                    style="color: var(--primary-dark);">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>
        <p class="text-sm text-gray-200">Gerencie todos os seus trabalhos em andamento e concluídos</p>
    </div>

    <div class="grid grid-cols-3 gap-3 mb-6">
        @php
            $totalApplicants = $works->sum('applicants_count');
        @endphp
        <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <i class="fas fa-chart-line text-xl text-Primary-dark"></i>
            <p class="text-lg font-bold text-gray-800 mt-1">{{ $works->count() }}</p>
            <p class="text-xs text-gray-500">Vagas Ativas</p>
        </div>

        <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <i class="fas fa-clock text-xl" style="color: var(--accent-yellow);"></i>
            <p class="text-2xl font-bold text-gray-800 mt-1">3</p>
            <p class="text-xs text-gray-500">Em andamento</p>
        </div>

        <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <i class="fas fa-check-circle text-xl"></i>
            <p class="text-2xl font-bold text-gray-800 mt-1">2</p>
            <p class="text-xs text-gray-500">Concluídos
            </p>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto">
        <div x-data="{ tab: 'ativos' }">
            <!-- Tabs -->
            <div class="flex gap-2 mb-6 bg-white rounded-xl p-1 text-sm shadow-sm border border-gray-100">
                <button @click="tab = 'ativos'" class="flex-1 py-2.5 rounded-lg font-medium transition cursor-pointer"
                    :class="tab === 'ativos' ? 'bg-Primary-dark text-white' : 'text-gray-600'">
                    <i class="fa-solid fa-play mr-2"></i> Ativos
                </button>

                <button @click="tab = 'andamento'"
                    class="flex-1 py-3 px-1.5 rounded-lg font-medium transition cursor-pointer"
                    :class="tab === 'andamento' ? 'bg-Secondary text-black' : 'text-gray-600'">
                    <i class="fas fa-play-circle mr-2"></i> Em andamento
                </button>

                <button class="flex-1 py-1.5 rounded-lg font-medium transition text-gray-600"">
                    <i class="fas fa-check-circle mr-2"></i> Concluídos
                </button>
            </div>

            <!-- Trabalhos ativos -->
            <div x-show="tab === 'ativos'" class="space-y-4">
                @forelse ($works as $work)
                    @if ($work->status == 1)
                        <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <div class="flex flex-col mb-2">
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-bold flex-6 text-gray-800 text-base">{{ $work->name_work }}</h3>

                                            @if ($work->status == 1)
                                                <span
                                                    class="text-xs flex-1 text-center font-medium mb-1 rounded-full text-Primary-dark bg-Primary-light py-1.5 px-3">
                                                    Ativos
                                                </span>
                                                {{-- <i class="fas fa-spinner fa-pulse mr-1"></i> --}}
                                            @endif
                                        </div>

                                        <div class="flex gap-2">
                                            <span class="text-xs text-gray-400">Prazo: {{ $work->duration }} dais</span>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-1 text-xs text-gray-500 mb-3">
                                        <span><i class="fas fa-calendar-check mr-1"></i> Início: 01/04/2024</span>
                                        <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 10/04/2024</span>

                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl font-bold text-Primary-dark">R$ {{ $work->payment }}</span>
                                        <span class="text-xs text-gray-500">/projeto</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-2 pt-4 border-t border-gray-300">
                                {{-- Modal de Detalhes --}}
                                <div class="flex-1">
                                    <button x-data @click="$dispatch('open-modal', { name: 'detail-{{ $work->id }}'})"
                                        class="w-full py-2 rounded-lg text-sm font-medium transition bg-Primary-dark text-white cursor-pointer">
                                        <i class="fas fa-chart-line mr-1"></i> Ver Detalhes
                                    </button>

                                    <x-modal-works name="detail-{{ $work->id }}" title="{{ $work->name_work }}">
                                        <div class="rounded-xl bg-white">
                                            {{-- Header --}}
                                            <div x-data="{ tab: 'details' }">
                                                <div
                                                    class="bg-linear-to-r from-Primary-dark to-Primary p-5 flex justify-between items-center">

                                                    <div x-show="tab === 'details'" x-cloak x-transition>
                                                        <h2 class="text-xl font-bold text-white">Detalhes do Trabalho</h2>
                                                        <p class="text-white/80 text-sm mt-0.5">Veja as informações do seu
                                                            trabalho</p>
                                                    </div>

                                                    <div x-show="tab === 'edit'" x-cloak x-transition>
                                                        <h2 class="text-xl font-bold text-white">Atualizar do Trabalho</h2>
                                                        <p class="text-white/80 text-sm mt-0.5">Atualize as informações do
                                                            seu
                                                            trabalho</p>
                                                    </div>

                                                    <div>
                                                        <button @click="show = false"
                                                            class="w-8 h-8 rounded-full cursor-pointer bg-white/20 flex items-center justify-center text-white hover:bg-white/30 transition">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="mb-6">

                                                        <div class="flex items-center gap-4 mb-4">
                                                            <button @click="tab = 'details'"
                                                                class="py-2 px-4 cursor-pointer flex items-center rounded-xl text-base"
                                                                :class="tab === 'details' ? 'bg-Primary-dark text-white' :
                                                                    'text-gray-600'">
                                                                <i class="fa-solid fa-bars mr-2"></i> Detalhes
                                                            </button>

                                                            <button @click="tab = 'edit'"
                                                                class="py-2 px-4 cursor-pointer flex items-center rounded-xl text-base"
                                                                :class="tab === 'edit' ? 'bg-Primary-dark text-white' :
                                                                    'text-gray-600'">
                                                                <i class="fa-regular fa-pen-to-square mr-2"></i> Editar
                                                            </button>
                                                        </div>

                                                        <div x-show="tab === 'details'" x-cloak x-transition>
                                                            <h3
                                                                class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                                                <i class="fas fa-info-circle text-Primary-dark"></i>
                                                                Informações do Trabalho
                                                            </h3>

                                                            <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                                                <div class="flex items-start gap-3">
                                                                    <div
                                                                        class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                                                        <i
                                                                            class="fas fa-code text-xl text-Primary-dark"></i>
                                                                    </div>
                                                                    <div class="flex-1">
                                                                        <h4 class="font-bold text-gray-800">
                                                                            {{ $work->name_work }}
                                                                        </h4>
                                                                        <p class="text-xs text-gray-500">
                                                                            {{ $work->company->company_name }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-data="{
                                                                // Iniciamos com as skills que o trabalho JÁ possui
                                                                selectedSkills: {{ $work->skills->map(fn($s) => ['id' => $s->id, 'skill' => $s->skill])->toJson() }},
                                                            
                                                                // Todas as skills do sistema (as opções)
                                                                allOptions: {{ $allSkills->toJson() }},
                                                            
                                                                // Função para adicionar/remover
                                                                toggleSkill(skill) {
                                                                    const index = this.selectedSkills.findIndex(s => s.id === skill.id);
                                                                    if (index === -1) {
                                                                        this.selectedSkills.push({ id: skill.id, skill: skill.skill });
                                                                    } else {
                                                                        this.selectedSkills.splice(index, 1);
                                                                    }
                                                                },
                                                            
                                                                // Verifica se uma skill da lista de opções já está selecionada
                                                                isChosen(id) {
                                                                    return this.selectedSkills.some(s => s.id === id);
                                                                }
                                                            }">
                                                                {{-- Descricao --}}
                                                                <div class="md:col-span-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                                                                    <textarea name="description_work" rows="5" disabled
                                                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
                                                                {{ $work->description_work }}
                                                            </textarea>
                                                                </div>

                                                                {{-- Tipo de trabalho --}}
                                                                <div x-data="{ typeWork: '{{ $work->type_work }}' }">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Tipo
                                                                        do trabalho</label>
                                                                    <div class="flex mb-2">
                                                                        @if ($work->type_work == 'freelancer')
                                                                            <div
                                                                                class="flex items-center w-full py-2 px-4 bg-linear-to-r from-Primary to-Primary-dark text-white rounded-xl">
                                                                                Freelancer
                                                                            </div>
                                                                        @else
                                                                            <div
                                                                                class="flex items-center w-full py-2 px-4 bg-linear-to-r from-Primary to-Primary-dark text-white rounded-xl">
                                                                                Efetivo
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <input type="hidden" name="type_work"
                                                                        :value="typeWork" disabled required>
                                                                </div>

                                                                {{-- Datas --}}
                                                                <div>
                                                                    <div x-data="{
                                                                        startDate: '{{ $work->start_date }}',
                                                                        endDate: '{{ $work->end_date }}',
                                                                        calculateDays() {
                                                                            if (!this.startDate || !this.endDate) return 0;
                                                                            const start = new Date(this.startDate);
                                                                            const end = new Date(this.endDate);
                                                                            const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                                                                            return diff > 0 ? diff : 0;
                                                                        }
                                                                    }"
                                                                        class="grid grid-cols-2 gap-5 mb-3">
                                                                        <div>
                                                                            <label for="start_date"
                                                                                class="block text-sm font-medium text-gray-700">Data
                                                                                inicial</label>
                                                                            <input type="date" name="start_date"
                                                                                disabled x-model="startDate"
                                                                                min="{{ date('Y-m-d') }}"
                                                                                class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                        </div>

                                                                        <div>
                                                                            <label for="end_date"
                                                                                class="block text-sm font-medium text-gray-700">Data
                                                                                final</label>
                                                                            <input type="date" name="end_date" disabled
                                                                                x-model="endDate" :min="startDate"
                                                                                class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                        </div>


                                                                        <div class="flex flex-col">
                                                                            <span class="text-gray-400 text-[12px]">3 dias
                                                                                de
                                                                                prazo minimo</span>
                                                                            <div class="flex items-center gap-2">
                                                                                <label
                                                                                    class="block text-sm font-medium text-gray-700">Duração
                                                                                    (dias)
                                                                                </label>
                                                                                <h1 class="text-lg font-bold"
                                                                                    :class="calculateDays() < 3 &&
                                                                                        endDate !== '' ?
                                                                                        'text-Danger' :
                                                                                        'text-Primary-dark'"
                                                                                    x-text="calculateDays()"></h1>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="duration" disabled
                                                                            :value="calculateDays()">
                                                                    </div>
                                                                </div>

                                                                {{-- Skills Atuais --}}
                                                                <div class="mb-6">
                                                                    <h4 class="text-sm font-bold text-gray-700 mb-3">Skills
                                                                        Atuais</h4>
                                                                    <div
                                                                        class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200">
                                                                        <template x-for="skill in selectedSkills"
                                                                            :key="skill.id">
                                                                            <div
                                                                                class="bg-Primary text-white px-3 py-1 rounded-full text-xs flex items-center">
                                                                                <span x-text="skill.skill"></span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Pagamento
                                                                        (R$)</label>
                                                                    <input type="number" step="0.01" name="payment"
                                                                        disabled value="{{ $work->payment }}"
                                                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                        placeholder="Ex: 1500.00" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div x-show="tab === 'edit'" x-cloak x-transition>
                                                            <h3
                                                                class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                                                <i class="fas fa-info-circle text-Primary-dark"></i>
                                                                Informações do Trabalho
                                                            </h3>

                                                            <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                                                <div class="flex items-start gap-3">
                                                                    <div
                                                                        class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                                                        <i
                                                                            class="fas fa-code text-xl text-Primary-dark"></i>
                                                                    </div>
                                                                    <div class="flex-1">
                                                                        <h4 class="font-bold text-gray-800">
                                                                            {{ $work->name_work }}
                                                                        </h4>
                                                                        <p class="text-xs text-gray-500">
                                                                            {{ $work->company->company_name }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-data="{
                                                                // Iniciamos com as skills que o trabalho JÁ possui
                                                                selectedSkills: {{ $work->skills->map(fn($s) => ['id' => $s->id, 'skill' => $s->skill])->toJson() }},
                                                            
                                                                // Todas as skills do sistema (as opções)
                                                                allOptions: {{ $allSkills->toJson() }},
                                                            
                                                                // Função para adicionar/remover
                                                                toggleSkill(skill) {
                                                                    const index = this.selectedSkills.findIndex(s => s.id === skill.id);
                                                                    if (index === -1) {
                                                                        this.selectedSkills.push({ id: skill.id, skill: skill.skill });
                                                                    } else {
                                                                        this.selectedSkills.splice(index, 1);
                                                                    }
                                                                },
                                                            
                                                                // Verifica se uma skill da lista de opções já está selecionada
                                                                isChosen(id) {
                                                                    return this.selectedSkills.some(s => s.id === id);
                                                                }
                                                            }">

                                                                <form action="{{ route('work.update', $work->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')


                                                                    {{-- Nome --}}
                                                                    <div class="md:col-span-2 mb-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Nome
                                                                            do trabalho</label>
                                                                        <input type="text" name="name_work"
                                                                            value="{{ $work->name_work }}"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                            placeholder="Ex: Desenvolvimento de Landing Page"
                                                                            required>
                                                                    </div>

                                                                    {{-- Descricao --}}
                                                                    <div class="md:col-span-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                                                                        <textarea name="description_work" rows="5"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
                                                                {{ $work->description_work }}
                                                        </textarea>
                                                                    </div>

                                                                    {{-- Tipo de trabalho --}}
                                                                    <div x-data="{ typeWork: '{{ $work->type_work }}' }">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Tipo
                                                                            do trabalho</label>

                                                                        <div class="grid grid-cols-2 mb-1 py-4 px-2 gap-3">
                                                                            <button type="button"
                                                                                @click="typeWork = 'freelancer'"
                                                                                :class="typeWork === 'freelancer' ?
                                                                                    'bg-Primary-dark text-white' :
                                                                                    'border-Primary-dark text-gray-700'"
                                                                                class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                                                                                Freelancer
                                                                            </button>

                                                                            <button type="button"
                                                                                @click="typeWork = 'efetivo'"
                                                                                :class="typeWork === 'efetivo' ?
                                                                                    'bg-Primary-dark text-white' :
                                                                                    'border-Primary-dark text-gray-700'"
                                                                                class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                                                                                Efetivo
                                                                            </button>
                                                                        </div>
                                                                        @error('type_work')
                                                                            <div
                                                                                class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                        <input type="hidden" name="type_work"
                                                                            :value="typeWork" required>
                                                                    </div>

                                                                    {{-- Datas --}}
                                                                    <div>
                                                                        <div x-data="{
                                                                            startDate: '{{ $work->start_date }}',
                                                                            endDate: '{{ $work->end_date }}',
                                                                            calculateDays() {
                                                                                if (!this.startDate || !this.endDate) return 0;
                                                                                const start = new Date(this.startDate);
                                                                                const end = new Date(this.endDate);
                                                                                const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                                                                                return diff > 0 ? diff : 0;
                                                                            }
                                                                        }"
                                                                            class="grid grid-cols-2 gap-5 mb-3">
                                                                            <div>
                                                                                <label for="start_date"
                                                                                    class="block text-sm font-medium text-gray-700">Data
                                                                                    inicial</label>
                                                                                <input type="date" name="start_date"
                                                                                    x-model="startDate"
                                                                                    min="{{ date('Y-m-d') }}"
                                                                                    class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                            </div>

                                                                            <div>
                                                                                <label for="end_date"
                                                                                    class="block text-sm font-medium text-gray-700">Data
                                                                                    final</label>
                                                                                <input type="date" name="end_date"
                                                                                    x-model="endDate"
                                                                                    :min="startDate"
                                                                                    class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                            </div>
                                                                            @error('end_date')
                                                                                <div
                                                                                    class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror


                                                                            <div class="flex flex-col">
                                                                                <span class="text-gray-400 text-[12px]">3
                                                                                    dias
                                                                                    de
                                                                                    prazo minimo</span>
                                                                                <div class="flex items-center gap-2">
                                                                                    <label
                                                                                        class="block text-sm font-medium text-gray-700">Duração
                                                                                        (dias)
                                                                                    </label>
                                                                                    <h1 class="text-lg font-bold"
                                                                                        :class="calculateDays() < 3 &&
                                                                                            endDate !== '' ?
                                                                                            'text-Danger' :
                                                                                            'text-Primary-dark'"
                                                                                        x-text="calculateDays()"></h1>
                                                                                </div>
                                                                            </div>
                                                                            @error('duration')
                                                                                <div
                                                                                    class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror

                                                                            <input type="hidden" name="duration"
                                                                                :value="calculateDays()">
                                                                        </div>
                                                                    </div>

                                                                    {{-- Skills Atuais --}}
                                                                    <div class="mb-6">
                                                                        <h4 class="text-sm font-bold text-gray-700 mb-3">
                                                                            Skills
                                                                            Atuais
                                                                            (Clique para remover)
                                                                            :</h4>
                                                                        <div
                                                                            class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200">
                                                                            <template x-for="skill in selectedSkills"
                                                                                :key="skill.id">
                                                                                <button type="button"
                                                                                    @click="toggleSkill(skill)"
                                                                                    class="bg-Primary text-white px-3 py-1 rounded-full text-xs flex items-center hover:bg-red-500 transition">
                                                                                    <span x-text="skill.skill"></span>
                                                                                    <i class="fas fa-times ml-2"></i>
                                                                                </button>
                                                                            </template>

                                                                            <template x-if="selectedSkills.length === 0">
                                                                                <span class="text-gray-400 text-xs">Nenhuma
                                                                                    skill
                                                                                    selecionada.</span>
                                                                            </template>
                                                                        </div>
                                                                    </div>

                                                                    {{-- Novas Skills --}}
                                                                    <div class="mb-6">
                                                                        <h4 class="text-sm font-bold text-gray-700 mb-3">
                                                                            Adicionar
                                                                            Novas Skills:</h4>
                                                                        <div
                                                                            class="flex flex-wrap gap-2 max-h-40 overflow-y-auto p-2">
                                                                            <template x-for="option in allOptions"
                                                                                :key="option.id">
                                                                                <button type="button"
                                                                                    x-show="!isChosen(option.id)"
                                                                                    @click="toggleSkill(option)"
                                                                                    class="border border-gray-300 text-gray-600 px-3 py-1 rounded-full text-xs hover:border-Primary hover:text-Primary transition">
                                                                                    + <span x-text="option.skill"></span>
                                                                                </button>
                                                                            </template>
                                                                        </div>

                                                                        <template x-for="skill in selectedSkills"
                                                                            :key="skill.id">
                                                                            <input type="hidden" name="skills[]"
                                                                                :value="skill.id">
                                                                        </template>
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Pagamento
                                                                            (R$)</label>
                                                                        <input type="number" step="0.01"
                                                                            name="payment" value="{{ $work->payment }}"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                            placeholder="Ex: 1500.00" required>
                                                                    </div>

                                                                    <div class="flex gap-2 pt-4">
                                                                        <button type="submit"
                                                                            class="flex-1 py-2 rounded-xl text-white font-medium bg-Primary-dark cursor-pointer">
                                                                            Salvar Alterações
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal-works>
                                </div>

                                {{-- Modal de Candidatos --}}
                                <div class="flex-1">
                                    <button x-data
                                        @click="$dispatch('open-modal', { name: 'appliacants-{{ $work->id }}'})"
                                        class="w-full py-2 rounded-lg text-sm font-medium transition bg-Primary-light border-2 border-Primary-dark text-Primary-dark cursor-pointer">
                                        <i class="fa-solid fa-user-group"></i> Ver Candidatos
                                    </button>

                                    <x-modal-works name="appliacants-{{ $work->id }}"
                                        title="{{ $work->name_work }}">
                                        <!-- Header do Modal -->
                                        <div
                                            class="p-5 border-b border-gray-100 flex justify-between items-center bg-linear-to-r from-Primary to-Primary-dark">
                                            <div>
                                                <h2 class="text-xl font-bold text-white">
                                                    Candidatos para o trabalho
                                                </h2>
                                                <p class="text-white/80 text-sm mt-0.5">
                                                    {{ $work->name_work }} - {{ $work->company->company_name }}</p>
                                            </div>

                                            <button @click="show = false"
                                                class="w-8 h-8 rounded-full bg-white/20 cursor-pointer flex items-center justify-center text-white hover:bg-white/30 transition">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>

                                        <!-- Barra de Busca e Filtros -->
                                        <div class="p-4 border-b border-gray-100 bg-gray-50">
                                            <div class="flex gap-3 mb-3">
                                                <select id="sortSelect"
                                                    class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm">
                                                    <option value="recent">Mais recentes</option>
                                                    <option value="rating">Melhor avaliação</option>
                                                    <option value="price">Menor valor</option>
                                                    <option value="experience">Mais experiência</option>
                                                </select>
                                            </div>

                                            <div class="flex gap-2 overflow-x-auto pb-2">
                                                <span
                                                    class="filter-chip active px-3 py-1.5 rounded-full text-xs font-medium">Todos
                                                    (12)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Pendentes
                                                    (5)</span>
                                                <span class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Em
                                                    análise (4)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Aprovados
                                                    (2)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Recusados
                                                    (1)</span>
                                                <span class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">⭐
                                                    Destaque (3)</span>
                                            </div>
                                        </div>

                                        <!-- Corpo do Modal - Lista de Candidatos -->
                                        @forelse ($work->applicants as $applicant)
                                            <div class="space-y-3 p-5">
                                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100"
                                                    data-rating="4.7" data-date="2024-04-04" data-price="1500">
                                                    <div class="flex gap-4">
                                                        <div
                                                            class="w-16 h-16 rounded-full bg-gradient-to-br from-gray-500 to-gray-600 flex items-center justify-center text-white text-xl font-bold">
                                                            CS
                                                        </div>

                                                        <div class="flex-1">
                                                            <div class="flex justify-between items-start">
                                                                <div>
                                                                    <h3 class="font-bold text-gray-800 text-lg">
                                                                        {{ $applicant->complete_name }}
                                                                    </h3>
                                                                    <p class="text-xs text-gray-500">
                                                                        {{ $applicant->professional_title }}
                                                                    </p>
                                                                </div>

                                                                <div class="text-right">
                                                                    <div class="rating-stars">
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star-half-alt filled"></i>
                                                                    </div>
                                                                    <span class="text-xs text-gray-500">4.7 (8
                                                                        avaliações)</span>
                                                                </div>
                                                            </div>

                                                            <div class="flex flex-wrap gap-2 mt-2">
                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                                    {{ $applicant->city->city }},
                                                                    {{ $applicant->city->uf }}
                                                                </span>

                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-briefcase mr-1"></i> 5 anos exp.
                                                                </span>

                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-calendar-alt mr-1"></i>
                                                                    Candidatou-se há 3 dias
                                                                </span>
                                                            </div>

                                                            <div class="flex flex-wrap gap-1 mt-2">
                                                                @foreach ($applicant->skills as $skill)
                                                                    <span
                                                                        class="skill-tag px-2 py-0.5 rounded text-xs bg-Primary-light text-Primary-dark">
                                                                        {{ $skill->skill }}
                                                                    </span>
                                                                @endforeach
                                                            </div>

                                                            <div
                                                                class="flex justify-between items-center mt-3 pt-2 border-t border-gray-100">
                                                                <div>
                                                                    <span class="text-xs text-gray-500">Valor
                                                                        pretendido</span>
                                                                    <p class="text-xl font-bold text-Primary-dark">
                                                                        R$ 1.500
                                                                    </p>
                                                                </div>

                                                                <div class="flex gap-2">
                                                                    <button
                                                                        class="flex-1 cursor-pointer px-3 py-1.5 rounded-lg text-xs font-medium bg-Primary-light text-Primary-dark">
                                                                        <i class="fas fa-user mr-1"></i> Perfil
                                                                    </button>

                                                                    <form
                                                                        action="{{ route('work.accept', [$work->id, $applicant->id]) }}"
                                                                        method="post" class="flex-1">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <button
                                                                            class="w-full cursor-pointer px-3 py-1.5 rounded-lg text-xs font-medium bg-Success text-white">
                                                                            <i class="fas fa-check-circle mr-1"></i>
                                                                            Aprovar
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <!-- Resultados da busca (vazio) -->
                                            <div class="hidden text-center py-12">
                                                <div
                                                    class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-user-slash text-3xl text-gray-400"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nenhum
                                                    candidato encontrado</h3>
                                                <p class="text-sm text-gray-500">Tente ajustar os filtros ou a
                                                    busca</p>
                                            </div>
                                        @endforelse

                                        <!-- Footer do Modal -->
                                        <div
                                            class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl flex justify-between items-center">
                                            @php
                                                $totalApplicants = $works->sum('applicants_count');
                                            @endphp
                                            <div>
                                                <span class="text-sm text-gray-600">
                                                    Total de candidatos: <strong
                                                        id="totalCandidates">{{ $totalApplicants }}</strong>
                                                </span>
                                            </div>

                                            <div class="flex gap-2">
                                                <button
                                                    class="px-4 cursor-pointer py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                                                    <i class="fas fa-download mr-2"></i> Exportar lista
                                                </button>
                                            </div>
                                        </div>
                                    </x-modal-works>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="p-4 text-center text-gray-500 text-sm">
                        Nenhuma vaga recente encontrada
                    </div>
                @endforelse
            </div>

            {{-- Trabalhos em andamento --}}
            <div x-show="tab === 'andamento'" class="space-y-4">
                @forelse ($works as $work)
                    @if ($work->status == 2)
                        <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <div class="flex flex-col mb-2">
                                        <div class="flex items-center gap-1 justify-between">
                                            <h3 class="font-bold flex-2 text-gray-800 text-base">{{ $work->name_work }}
                                            </h3>

                                            @if ($work->status == 2)
                                                <span
                                                    class="text-xs flex-1 font-medium mb-1 rounded-full text-black bg-Secondary py-1.5 px-3">
                                                    <i class="fas fa-spinner fa-pulse mr-1"></i> Em Andamento
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex gap-2">
                                            <span class="text-xs text-gray-400">Prazo: {{ $work->duration }} dais</span>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-1 text-xs text-gray-500 mb-3">
                                        <span><i class="fas fa-calendar-check mr-1"></i> Início: 01/04/2024</span>
                                        <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 10/04/2024</span>

                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl font-bold text-Primary-dark">R$ {{ $work->payment }}</span>
                                        <span class="text-xs text-gray-500">/projeto</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-2 pt-4 border-t border-gray-300">
                                {{-- Modal de Detalhes --}}
                                <div class="flex-1">
                                    <button x-data @click="$dispatch('open-modal', { name: 'detail-{{ $work->id }}'})"
                                        class="w-full py-2 rounded-lg text-sm font-medium transition bg-Primary-dark text-white cursor-pointer">
                                        <i class="fas fa-chart-line mr-1"></i> Ver Detalhes
                                    </button>

                                    <x-modal-works name="detail-{{ $work->id }}" title="{{ $work->name_work }}">
                                        <div class="rounded-xl bg-white">
                                            {{-- Header --}}
                                            <div x-data="{ tab: 'details' }">
                                                <div
                                                    class="bg-linear-to-r from-Primary-dark to-Primary p-5 flex justify-between items-center">

                                                    <div x-show="tab === 'details'" x-cloak x-transition>
                                                        <h2 class="text-xl font-bold text-white">Detalhes do Trabalho</h2>
                                                        <p class="text-white/80 text-sm mt-0.5">Veja as informações do seu
                                                            trabalho</p>
                                                    </div>

                                                    <div x-show="tab === 'edit'" x-cloak x-transition>
                                                        <h2 class="text-xl font-bold text-white">Atualizar do Trabalho</h2>
                                                        <p class="text-white/80 text-sm mt-0.5">Atualize as informações do
                                                            seu
                                                            trabalho</p>
                                                    </div>

                                                    <div>
                                                        <button @click="show = false"
                                                            class="w-8 h-8 rounded-full cursor-pointer bg-white/20 flex items-center justify-center text-white hover:bg-white/30 transition">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="mb-6">

                                                        <div class="flex items-center gap-4 mb-4">
                                                            <button @click="tab = 'details'"
                                                                class="py-2 px-4 cursor-pointer flex items-center rounded-xl text-base"
                                                                :class="tab === 'details' ? 'bg-Primary-dark text-white' :
                                                                    'text-gray-600'">
                                                                <i class="fa-solid fa-bars mr-2"></i> Detalhes
                                                            </button>

                                                            <button @click="tab = 'edit'"
                                                                class="py-2 px-4 cursor-pointer flex items-center rounded-xl text-base"
                                                                :class="tab === 'edit' ? 'bg-Primary-dark text-white' :
                                                                    'text-gray-600'">
                                                                <i class="fa-regular fa-pen-to-square mr-2"></i> Editar
                                                            </button>
                                                        </div>

                                                        <div x-show="tab === 'details'" x-cloak x-transition>
                                                            <h3
                                                                class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                                                <i class="fas fa-info-circle text-Primary-dark"></i>
                                                                Informações do Trabalho
                                                            </h3>

                                                            <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                                                <div class="flex items-start gap-3">
                                                                    <div
                                                                        class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                                                        <i
                                                                            class="fas fa-code text-xl text-Primary-dark"></i>
                                                                    </div>
                                                                    <div class="flex-1">
                                                                        <h4 class="font-bold text-gray-800">
                                                                            {{ $work->name_work }}
                                                                        </h4>
                                                                        <p class="text-xs text-gray-500">
                                                                            {{ $work->company->company_name }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-data="{
                                                                // Iniciamos com as skills que o trabalho JÁ possui
                                                                selectedSkills: {{ $work->skills->map(fn($s) => ['id' => $s->id, 'skill' => $s->skill])->toJson() }},
                                                            
                                                                // Todas as skills do sistema (as opções)
                                                                allOptions: {{ $allSkills->toJson() }},
                                                            
                                                                // Função para adicionar/remover
                                                                toggleSkill(skill) {
                                                                    const index = this.selectedSkills.findIndex(s => s.id === skill.id);
                                                                    if (index === -1) {
                                                                        this.selectedSkills.push({ id: skill.id, skill: skill.skill });
                                                                    } else {
                                                                        this.selectedSkills.splice(index, 1);
                                                                    }
                                                                },
                                                            
                                                                // Verifica se uma skill da lista de opções já está selecionada
                                                                isChosen(id) {
                                                                    return this.selectedSkills.some(s => s.id === id);
                                                                }
                                                            }">
                                                                {{-- Descricao --}}
                                                                <div class="md:col-span-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                                                                    <textarea name="description_work" rows="5" disabled
                                                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
                                                                {{ $work->description_work }}
                                                            </textarea>
                                                                </div>

                                                                {{-- Tipo de trabalho --}}
                                                                <div x-data="{ typeWork: '{{ $work->type_work }}' }">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Tipo
                                                                        do trabalho</label>
                                                                    <div class="flex mb-2">
                                                                        @if ($work->type_work == 'freelancer')
                                                                            <div
                                                                                class="flex items-center w-full py-2 px-4 bg-linear-to-r from-Primary to-Primary-dark text-white rounded-xl">
                                                                                Freelancer
                                                                            </div>
                                                                        @else
                                                                            <div
                                                                                class="flex items-center w-full py-2 px-4 bg-linear-to-r from-Primary to-Primary-dark text-white rounded-xl">
                                                                                Efetivo
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <input type="hidden" name="type_work"
                                                                        :value="typeWork" disabled required>
                                                                </div>

                                                                {{-- Datas --}}
                                                                <div>
                                                                    <div x-data="{
                                                                        startDate: '{{ $work->start_date }}',
                                                                        endDate: '{{ $work->end_date }}',
                                                                        calculateDays() {
                                                                            if (!this.startDate || !this.endDate) return 0;
                                                                            const start = new Date(this.startDate);
                                                                            const end = new Date(this.endDate);
                                                                            const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                                                                            return diff > 0 ? diff : 0;
                                                                        }
                                                                    }"
                                                                        class="grid grid-cols-2 gap-5 mb-3">
                                                                        <div>
                                                                            <label for="start_date"
                                                                                class="block text-sm font-medium text-gray-700">Data
                                                                                inicial</label>
                                                                            <input type="date" name="start_date"
                                                                                disabled x-model="startDate"
                                                                                min="{{ date('Y-m-d') }}"
                                                                                class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                        </div>

                                                                        <div>
                                                                            <label for="end_date"
                                                                                class="block text-sm font-medium text-gray-700">Data
                                                                                final</label>
                                                                            <input type="date" name="end_date" disabled
                                                                                x-model="endDate" :min="startDate"
                                                                                class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                        </div>


                                                                        <div class="flex flex-col">
                                                                            <span class="text-gray-400 text-[12px]">3 dias
                                                                                de
                                                                                prazo minimo</span>
                                                                            <div class="flex items-center gap-2">
                                                                                <label
                                                                                    class="block text-sm font-medium text-gray-700">Duração
                                                                                    (dias)
                                                                                </label>
                                                                                <h1 class="text-lg font-bold"
                                                                                    :class="calculateDays() < 3 &&
                                                                                        endDate !== '' ?
                                                                                        'text-Danger' :
                                                                                        'text-Primary-dark'"
                                                                                    x-text="calculateDays()"></h1>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="duration" disabled
                                                                            :value="calculateDays()">
                                                                    </div>
                                                                </div>

                                                                {{-- Skills Atuais --}}
                                                                <div class="mb-6">
                                                                    <h4 class="text-sm font-bold text-gray-700 mb-3">Skills
                                                                        Atuais</h4>
                                                                    <div
                                                                        class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200">
                                                                        <template x-for="skill in selectedSkills"
                                                                            :key="skill.id">
                                                                            <div
                                                                                class="bg-Primary text-white px-3 py-1 rounded-full text-xs flex items-center">
                                                                                <span x-text="skill.skill"></span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-gray-700 mb-1">Pagamento
                                                                        (R$)</label>
                                                                    <input type="number" step="0.01" name="payment"
                                                                        disabled value="{{ $work->payment }}"
                                                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                        placeholder="Ex: 1500.00" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div x-show="tab === 'edit'" x-cloak x-transition>
                                                            <h3
                                                                class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                                                <i class="fas fa-info-circle text-Primary-dark"></i>
                                                                Informações do Trabalho
                                                            </h3>

                                                            <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                                                <div class="flex items-start gap-3">
                                                                    <div
                                                                        class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                                                        <i
                                                                            class="fas fa-code text-xl text-Primary-dark"></i>
                                                                    </div>
                                                                    <div class="flex-1">
                                                                        <h4 class="font-bold text-gray-800">
                                                                            {{ $work->name_work }}
                                                                        </h4>
                                                                        <p class="text-xs text-gray-500">
                                                                            {{ $work->company->company_name }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div x-data="{
                                                                // Iniciamos com as skills que o trabalho JÁ possui
                                                                selectedSkills: {{ $work->skills->map(fn($s) => ['id' => $s->id, 'skill' => $s->skill])->toJson() }},
                                                            
                                                                // Todas as skills do sistema (as opções)
                                                                allOptions: {{ $allSkills->toJson() }},
                                                            
                                                                // Função para adicionar/remover
                                                                toggleSkill(skill) {
                                                                    const index = this.selectedSkills.findIndex(s => s.id === skill.id);
                                                                    if (index === -1) {
                                                                        this.selectedSkills.push({ id: skill.id, skill: skill.skill });
                                                                    } else {
                                                                        this.selectedSkills.splice(index, 1);
                                                                    }
                                                                },
                                                            
                                                                // Verifica se uma skill da lista de opções já está selecionada
                                                                isChosen(id) {
                                                                    return this.selectedSkills.some(s => s.id === id);
                                                                }
                                                            }">

                                                                <form action="{{ route('work.update', $work->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')


                                                                    {{-- Nome --}}
                                                                    <div class="md:col-span-2 mb-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Nome
                                                                            do trabalho</label>
                                                                        <input type="text" name="name_work"
                                                                            value="{{ $work->name_work }}"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                            placeholder="Ex: Desenvolvimento de Landing Page"
                                                                            required>
                                                                    </div>

                                                                    {{-- Descricao --}}
                                                                    <div class="md:col-span-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                                                                        <textarea name="description_work" rows="5"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
                                                                            {{ $work->description_work }}
                                                                        </textarea>
                                                                    </div>

                                                                    {{-- Tipo de trabalho --}}
                                                                    <div x-data="{ typeWork: '{{ $work->type_work }}' }">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Tipo
                                                                            do trabalho</label>

                                                                        <div class="grid grid-cols-2 mb-1 py-4 px-2 gap-3">
                                                                            <button type="button"
                                                                                @click="typeWork = 'freelancer'"
                                                                                :class="typeWork === 'freelancer' ?
                                                                                    'bg-Primary-dark text-white' :
                                                                                    'border-Primary-dark text-gray-700'"
                                                                                class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                                                                                Freelancer
                                                                            </button>

                                                                            <button type="button"
                                                                                @click="typeWork = 'efetivo'"
                                                                                :class="typeWork === 'efetivo' ?
                                                                                    'bg-Primary-dark text-white' :
                                                                                    'border-Primary-dark text-gray-700'"
                                                                                class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                                                                                Efetivo
                                                                            </button>
                                                                        </div>
                                                                        @error('type_work')
                                                                            <div
                                                                                class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                        <input type="hidden" name="type_work"
                                                                            :value="typeWork" required>
                                                                    </div>

                                                                    {{-- Datas --}}
                                                                    <div>
                                                                        <div x-data="{
                                                                            startDate: '{{ $work->start_date }}',
                                                                            endDate: '{{ $work->end_date }}',
                                                                            calculateDays() {
                                                                                if (!this.startDate || !this.endDate) return 0;
                                                                                const start = new Date(this.startDate);
                                                                                const end = new Date(this.endDate);
                                                                                const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                                                                                return diff > 0 ? diff : 0;
                                                                            }
                                                                        }"
                                                                            class="grid grid-cols-2 gap-5 mb-3">
                                                                            <div>
                                                                                <label for="start_date"
                                                                                    class="block text-sm font-medium text-gray-700">Data
                                                                                    inicial</label>
                                                                                <input type="date" name="start_date"
                                                                                    x-model="startDate"
                                                                                    min="{{ date('Y-m-d') }}"
                                                                                    class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                            </div>

                                                                            <div>
                                                                                <label for="end_date"
                                                                                    class="block text-sm font-medium text-gray-700">Data
                                                                                    final</label>
                                                                                <input type="date" name="end_date"
                                                                                    x-model="endDate"
                                                                                    :min="startDate"
                                                                                    class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                            </div>
                                                                            @error('end_date')
                                                                                <div
                                                                                    class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror


                                                                            <div class="flex flex-col">
                                                                                <span class="text-gray-400 text-[12px]">3
                                                                                    dias
                                                                                    de
                                                                                    prazo minimo</span>
                                                                                <div class="flex items-center gap-2">
                                                                                    <label
                                                                                        class="block text-sm font-medium text-gray-700">Duração
                                                                                        (dias)
                                                                                    </label>
                                                                                    <h1 class="text-lg font-bold"
                                                                                        :class="calculateDays() < 3 &&
                                                                                            endDate !== '' ?
                                                                                            'text-Danger' :
                                                                                            'text-Primary-dark'"
                                                                                        x-text="calculateDays()"></h1>
                                                                                </div>
                                                                            </div>
                                                                            @error('duration')
                                                                                <div
                                                                                    class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror

                                                                            <input type="hidden" name="duration"
                                                                                :value="calculateDays()">
                                                                        </div>
                                                                    </div>

                                                                    {{-- Skills Atuais --}}
                                                                    <div class="mb-6">
                                                                        <h4 class="text-sm font-bold text-gray-700 mb-3">
                                                                            Skills
                                                                            Atuais
                                                                            (Clique para remover)
                                                                            :</h4>
                                                                        <div
                                                                            class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200">
                                                                            <template x-for="skill in selectedSkills"
                                                                                :key="skill.id">
                                                                                <button type="button"
                                                                                    @click="toggleSkill(skill)"
                                                                                    class="bg-Primary text-white px-3 py-1 rounded-full text-xs flex items-center hover:bg-red-500 transition">
                                                                                    <span x-text="skill.skill"></span>
                                                                                    <i class="fas fa-times ml-2"></i>
                                                                                </button>
                                                                            </template>

                                                                            <template x-if="selectedSkills.length === 0">
                                                                                <span class="text-gray-400 text-xs">Nenhuma
                                                                                    skill
                                                                                    selecionada.</span>
                                                                            </template>
                                                                        </div>
                                                                    </div>

                                                                    {{-- Novas Skills --}}
                                                                    <div class="mb-6">
                                                                        <h4 class="text-sm font-bold text-gray-700 mb-3">
                                                                            Adicionar
                                                                            Novas Skills:</h4>
                                                                        <div
                                                                            class="flex flex-wrap gap-2 max-h-40 overflow-y-auto p-2">
                                                                            <template x-for="option in allOptions"
                                                                                :key="option.id">
                                                                                <button type="button"
                                                                                    x-show="!isChosen(option.id)"
                                                                                    @click="toggleSkill(option)"
                                                                                    class="border border-gray-300 text-gray-600 px-3 py-1 rounded-full text-xs hover:border-Primary hover:text-Primary transition">
                                                                                    + <span x-text="option.skill"></span>
                                                                                </button>
                                                                            </template>
                                                                        </div>

                                                                        <template x-for="skill in selectedSkills"
                                                                            :key="skill.id">
                                                                            <input type="hidden" name="skills[]"
                                                                                :value="skill.id">
                                                                        </template>
                                                                    </div>

                                                                    <div>
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700 mb-1">Pagamento
                                                                            (R$)</label>
                                                                        <input type="text" placeholder="0,00"
                                                                            id="payment"
                                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                            placeholder="Ex: 1500.00" required>

                                                                        <input type="hidden" name="payment"
                                                                            id="payment_decimal">
                                                                    </div>

                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            // Aplica a máscara de dinheiro no campo visível
                                                                            $('#payment').mask('#.##0,00', {
                                                                                reverse: true
                                                                            });

                                                                            // Evento disparado toda vez que o usuário digita algo
                                                                            $('#payment').on('input', function() {
                                                                                // 1. Pega o valor atual formatado (ex: "1.250,50")
                                                                                let valorFormatado = $(this).val();

                                                                                // 2. Transforma no formato decimal (ex: "1250.50")
                                                                                let valorDecimal = valorFormatado
                                                                                    .replace(/\./g, '') // Remove todos os pontos de milhar
                                                                                    .replace(',', '.'); // Substitui a vírgula decimal por ponto

                                                                                // 3. Atualiza o input hidden com o valor limpo
                                                                                $('#payment_decimal').val(valorDecimal);
                                                                            });
                                                                        });
                                                                    </script>

                                                                    <div class="flex gap-2 pt-4">
                                                                        <button type="submit"
                                                                            class="flex-1 py-2 rounded-xl text-white font-medium bg-Primary-dark cursor-pointer">
                                                                            Salvar Alterações
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal-works>
                                </div>

                                {{-- Modal de Candidatos --}}
                                <div class="flex-1">
                                    <button x-data
                                        @click="$dispatch('open-modal', { name: 'appliacants-{{ $work->id }}'})"
                                        class="w-full py-2 rounded-lg text-sm font-medium transition bg-Primary-light text-Primary-dark border border-Primary-dark cursor-pointer">
                                        <i class="fa-solid fa-user-group"></i> Ver Candidatos
                                    </button>

                                    <x-modal-works name="appliacants-{{ $work->id }}"
                                        title="{{ $work->name_work }}">
                                        <!-- Header do Modal -->
                                        <div
                                            class="p-5 border-b border-gray-100 flex justify-between items-center bg-linear-to-r from-Primary to-Primary-dark">
                                            <div>
                                                <h2 class="text-xl font-bold text-white">
                                                    Candidatos para o trabalho
                                                </h2>
                                                <p class="text-white/80 text-sm mt-0.5">
                                                    {{ $work->name_work }} - {{ $work->company->company_name }}</p>
                                            </div>

                                            <button @click="show = false"
                                                class="w-8 h-8 rounded-full bg-white/20 cursor-pointer flex items-center justify-center text-white hover:bg-white/30 transition">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>

                                        <!-- Barra de Busca e Filtros -->
                                        <div class="p-4 border-b border-gray-100 bg-gray-50">
                                            <div class="flex gap-3 mb-3">
                                                <select id="sortSelect"
                                                    class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm">
                                                    <option value="recent">Mais recentes</option>
                                                    <option value="rating">Melhor avaliação</option>
                                                    <option value="price">Menor valor</option>
                                                    <option value="experience">Mais experiência</option>
                                                </select>
                                            </div>

                                            <div class="flex gap-2 overflow-x-auto pb-2">
                                                <span
                                                    class="filter-chip active px-3 py-1.5 rounded-full text-xs font-medium">Todos
                                                    (12)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Pendentes
                                                    (5)</span>
                                                <span class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Em
                                                    análise (4)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Aprovados
                                                    (2)</span>
                                                <span
                                                    class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">Recusados
                                                    (1)</span>
                                                <span class="filter-chip px-3 py-1.5 rounded-full text-xs font-medium">⭐
                                                    Destaque (3)</span>
                                            </div>
                                        </div>

                                        <!-- Corpo do Modal - Lista de Candidatos -->
                                        @forelse ($work->applicants as $applicant)
                                            <div class="space-y-3 p-5">
                                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100"
                                                    data-rating="4.7" data-date="2024-04-04" data-price="1500">
                                                    <div class="flex gap-4">
                                                        <div
                                                            class="w-16 h-16 rounded-full bg-linear-to-br from-gray-500 to-gray-600 flex items-center justify-center text-white text-xl font-bold">
                                                            CS
                                                        </div>

                                                        <div class="flex-1">
                                                            <div class="flex justify-between items-start">
                                                                <div>
                                                                    <h3 class="font-bold text-gray-800 text-lg">
                                                                        {{ $applicant->complete_name }}
                                                                    </h3>
                                                                    <p class="text-xs text-gray-500">
                                                                        {{ $applicant->professional_title }}
                                                                    </p>
                                                                </div>

                                                                <div class="text-right">
                                                                    <div class="rating-stars">
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star-half-alt filled"></i>
                                                                    </div>
                                                                    <span class="text-xs text-gray-500">4.7 (8
                                                                        avaliações)</span>
                                                                </div>
                                                            </div>

                                                            <div class="flex flex-wrap gap-2 mt-2">
                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                                                    {{ $applicant->city->city }},
                                                                    {{ $applicant->city->uf }}
                                                                </span>

                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-briefcase mr-1"></i> 5 anos exp.
                                                                </span>

                                                                <span class="text-xs text-gray-500">
                                                                    <i class="fas fa-calendar-alt mr-1"></i>
                                                                    Candidatou-se há 3 dias
                                                                </span>
                                                            </div>

                                                            <div class="flex flex-wrap gap-1 mt-2">
                                                                @foreach ($applicant->skills as $skill)
                                                                    <span
                                                                        class="skill-tag px-2 py-0.5 rounded text-xs bg-Primary-light text-Primary-dark">
                                                                        {{ $skill->skill }}
                                                                    </span>
                                                                @endforeach
                                                            </div>

                                                            <div
                                                                class="flex justify-between items-center mt-3 pt-2 border-t border-gray-100">
                                                                <div>
                                                                    <span class="text-xs text-gray-500">Valor
                                                                        pretendido</span>
                                                                    <p class="text-xl font-bold text-Primary-dark">
                                                                        R$ 1.500
                                                                    </p>
                                                                </div>

                                                                <div class="flex gap-2">
                                                                    <button
                                                                        class="flex-1 cursor-pointer px-3 py-1.5 rounded-lg text-xs font-medium bg-Primary-light text-Primary-dark">
                                                                        <i class="fas fa-user mr-1"></i> Perfil
                                                                    </button>

                                                                    <form
                                                                        action="{{ route('work.accept', [$work->id, $applicant->id]) }}"
                                                                        method="post" class="flex-1">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <button
                                                                            class="w-full cursor-pointer px-3 py-1.5 rounded-lg text-xs font-medium bg-Success text-white">
                                                                            <i class="fas fa-check-circle mr-1"></i>
                                                                            Aprovar
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <!-- Resultados da busca (vazio) -->
                                            <div class="hidden text-center py-12">
                                                <div
                                                    class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-user-slash text-3xl text-gray-400"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Nenhum
                                                    candidato encontrado</h3>
                                                <p class="text-sm text-gray-500">Tente ajustar os filtros ou a
                                                    busca</p>
                                            </div>
                                        @endforelse

                                        <!-- Footer do Modal -->
                                        <div
                                            class="p-4 border-t border-gray-100 bg-gray-50 rounded-b-2xl flex justify-between items-center">
                                            @php
                                                $totalApplicants = $works->sum('applicants_count');
                                            @endphp
                                            <div>
                                                <span class="text-sm text-gray-600">
                                                    Total de candidatos: <strong
                                                        id="totalCandidates">{{ $totalApplicants }}</strong>
                                                </span>
                                            </div>

                                            <div class="flex gap-2">
                                                <button
                                                    class="px-4 cursor-pointer py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                                                    <i class="fas fa-download mr-2"></i> Exportar lista
                                                </button>
                                            </div>
                                        </div>
                                    </x-modal-works>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="p-4 text-center text-gray-500 text-sm">
                        Nenhuma vaga recente encontrada
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

<!-- Candidato 1 - Destaque -->
{{-- <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
    <div class="flex gap-4">
        <!-- Avatar -->
        <div class="relative">
            <div
                class="w-16 h-16 rounded-full bg-linear-to-br from-Primary-dark to-Primary flex items-center justify-center text-white text-xl font-bold">
                AS
            </div>

            <div class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-yellow-400 flex items-center justify-center">
                <i class="fas fa-star text-white text-xs"></i>
            </div>
        </div>

        <!-- Informações -->
        <div class="flex-1">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Ana
                        Silva</h3>
                    <p class="text-xs text-gray-500">Desenvolvedora
                        Full Stack Sênior</p>
                </div>
                <div class="text-right">
                    <div class="rating-stars">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                    </div>
                    <span class="text-xs text-gray-500">5.0 (12
                        avaliações)</span>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 mt-2">
                <span class="text-xs text-gray-500"><i class="fas fa-map-marker-alt mr-1"></i>
                    Registro, SP</span>
                <span class="text-xs text-gray-500"><i class="fas fa-briefcase mr-1"></i> 8 anos
                    exp.</span>
                <span class="text-xs text-gray-500"><i class="fas fa-calendar-alt mr-1"></i>
                    Candidatou-se há 2 dias</span>
            </div>

            <div class="flex flex-wrap gap-1 mt-2">
                <span class="skill-tag px-2 py-0.5 rounded text-xs"
                    style="background: var(--primary-light); color: var(--primary-dark);">React</span>
                <span class="skill-tag px-2 py-0.5 rounded text-xs"
                    style="background: var(--primary-light); color: var(--primary-dark);">Node.js</span>
                <span class="skill-tag px-2 py-0.5 rounded text-xs"
                    style="background: var(--primary-light); color: var(--primary-dark);">TypeScript</span>
                <span class="skill-tag px-2 py-0.5 rounded text-xs"
                    style="background: var(--primary-light); color: var(--primary-dark);">Python</span>
            </div>

            <div class="flex justify-between items-center mt-3 pt-2 border-t border-gray-100">
                <div>
                    <span class="text-xs text-gray-500">Valor
                        pretendido</span>
                    <p class="text-xl font-bold" style="color: var(--primary-dark);">R$
                        1.200</p>
                </div>
                <div class="flex gap-2">
                    <button class="action-btn px-3 py-1.5 rounded-lg text-xs font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="viewCandidateProfile(this)">
                        <i class="fas fa-user mr-1"></i> Perfil
                    </button>
                    <button class="action-btn px-3 py-1.5 rounded-lg text-xs font-medium"
                        style="background: var(--accent-green); color: white;" onclick="approveCandidate(this)">
                        <i class="fas fa-check-circle mr-1"></i>
                        Aprovar
                    </button>
                    <button class="action-btn px-3 py-1.5 rounded-lg text-xs font-medium"
                        style="background: var(--accent-red); color: white;" onclick="rejectCandidate(this)">
                        <i class="fas fa-times-circle mr-1"></i>
                        Recusar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Card 1 - Em andamento -->
{{-- 
    <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
        <div class="flex justify-between items-start mb-3">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                    </span>
                    <span class="text-xs text-gray-400">Prazo: 5 dias</span>
                </div>

                <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvimento de E-commerce</h3>
                <p class="text-sm text-gray-500 mb-2">
                    <i class="fas fa-building mr-1"></i> TechSolutions Ltda
                </p>

                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span><i class="fas fa-calendar-check mr-1"></i> Início: 01/04/2024</span>
                        <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 10/04/2024</span>
                    </div>

                    <div class="mb-3">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-gray-600">Progresso</span>
                            <span class="font-medium" style="color: var(--primary-dark);">60%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="progress-bar h-2 rounded-full"
                                style="width: 60%; background: var(--primary-dark);"></div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 3.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>

                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>
        </div> 
    </div>
--}}
