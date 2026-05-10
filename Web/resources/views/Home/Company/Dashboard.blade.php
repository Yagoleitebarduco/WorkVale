@extends('Layouts.app')

@section('title', 'Dashboard Empresa - WorkVale')
@section('hideDefaultBottomNav', '1')

@section('header')
    <div class="top-0 z-10 border-b border-gray-100 pb-4 py-3 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">
                Work<span class="text-Secondary">Vale</span>
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-bell text-gray-500 text-sm"></i>
            </div>
            <!-- Engrenagem de configurações -->
            <button id="settingsBtn" class="settings-btn w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-cog text-gray-600 text-sm"></i>
            </button>
        </div>
    </div>

    <!-- Saudação -->
    <div class="mt-4 mb-5">
        <h2 class="text-xl font-semibold text-white">Olá, {{ Auth::user()->representative_name }}</h2>
        <p class="text-xs text-gray-200">Empresa {{ Auth::user()->company_name }}</p>
    </div>

    <div class="mt-2 mb-2">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="bg-gray-200 py-2 px-4 rounded-2xl cursor-pointer">Sair</button>
        </form>
    </div>

    <!-- Stats Cards (3 cards) -->
    @php
        $totalApplicants = $works->sum('applicants_count');
    @endphp
    <div class="grid grid-cols-3 gap-3 mb-6">
        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Primary-light">
                <i class="fas fa-briefcase text-lg text-Primary"></i>
            </div>
            @if ($works->count() > 0)
                <p class="text-xl font-bold text-gray-800">{{ $works->count() }}</p>
            @else
                <p class="text-xl font-bold text-gray-800">--</p>
            @endif
            <p class="text-xs text-gray-500">Vagas ativas</p>
        </div>

        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">

            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Success/15">
                <i class="fas fa-users text-lg text-green-500"></i>
            </div>
            @if ($totalApplicants >= 1)
                <p class="text-xl font-bold text-gray-800">{{ $totalApplicants }}</p>
            @else
                <p class="text-xl font-bold text-gray-800">--</p>
            @endif
            <p class="text-xs text-gray-500">Candidatos</p>
        </div>

        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Secondary/15">
                <i class="fas fa-check-circle text-lg text-yellow-500"></i>
            </div>
            <p class="text-xl font-bold text-gray-800">--</p>
            <p class="text-xs text-gray-500">Contratações</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Conteúdo Principal -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-6">
        <div class="flex justify-between items-center mb-3">
            <div>
                <h3 class="font-semibold text-gray-800 text-sm">Contratações por Mês</h3>
                <p class="text-xs text-gray-400">Últimos 6 meses</p>
            </div>
            <select id="anoSelect" class="text-xs border border-gray-200 rounded-lg px-2 py-1 bg-white">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <canvas id="hiringChart" height="180"></canvas>
    </div>

    <!-- Script simples -->
    <script>
        // Dados
        const dados = {
            2024: [5, 8, 12, 7, 15, 10],
            2023: [3, 6, 9, 4, 11, 8]
        };

        // Criar gráfico
        const ctx = document.getElementById('hiringChart').getContext('2d');
        let meuGrafico = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Contratações',
                    data: dados[2024],
                    borderColor: '#6A2698',
                    backgroundColor: 'rgba(106, 38, 152, 0.1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Mudar ano
        document.getElementById('anoSelect').addEventListener('change', function(e) {
            meuGrafico.data.datasets[0].data = dados[e.target.value];
            meuGrafico.update();
        });
    </script>

    <!-- Vagas Recentes -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6">
        <div class="p-4 border-b border-gray-100">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-semibold text-gray-800 text-sm">Vagas Recentes</h3>
                    <p class="text-xs text-gray-400">Últimas vagas publicadas</p>
                </div>
                <a href="{{ route('company.myjobs') }}" class="text-xs text-Primary-dark">
                    Ver todas
                </a>
            </div>

        </div>

        <div class="divide-y divide-gray-100">
            @forelse ($works as $work)
                <div class="p-3 flex items-center justify-between">
                    <div class="flex justify-between w-full">
                        <div>
                            <h4 class="font-medium text-gray-800 text-sm">{{ $work->name_work }}</h4>
                            <p class="text-xs text-gray-400 mt-0.5">
                                {{ $work->applicants_count }}
                                {{ $work->applicants_count == 1 ? 'candidato' : 'candidatos' }}
                                • há {{ $work->created_at->locale('pt_BR')->diffForHumans()}}
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex-1">
                                <button class="cursor-pointer" x-data
                                    @click="$dispatch('open-modal', { name: 'modal-{{ $work->id }}'})">
                                    <i class="fa-regular fa-pen-to-square text-Primary-dark"></i>
                                </button>

                                <x-modal-works name="modal-{{ $work->id }}" title="{{ $work->name_work }}">
                                    <div class="rounded-xl bg-white">
                                        {{-- Header --}}
                                        <div
                                            class="bg-linear-to-r from-Primary-dark to-Primary p-5 flex justify-between items-center">
                                            <div>
                                                <h2 class="text-xl font-bold text-white">Atualizar Trabalho</h2>
                                                <p class="text-white/80 text-sm mt-0.5">Atualize as informações do seu
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
                                                <h3
                                                    class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                                    <i class="fas fa-info-circle text-Primary-dark"></i>
                                                    Informações do Trabalho
                                                </h3>

                                                <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                                    <div class="flex items-start gap-3">
                                                        <div
                                                            class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                                            <i class="fas fa-code text-xl text-Primary-dark"></i>
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

                                                    <form action="{{ route('work.update', $work->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')


                                                        {{-- Nome --}}
                                                        <div class="md:col-span-2 mb-2">
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome
                                                                do trabalho</label>
                                                            <input type="text" name="name_work"
                                                                value="{{ $work->name_work }}"
                                                                class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                                                                placeholder="Ex: Desenvolvimento de Landing Page" required>
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
                                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tipo
                                                                do trabalho</label>

                                                            <div class="grid grid-cols-2 mb-1 py-4 px-2 gap-3">
                                                                <button type="button" @click="typeWork = 'freelancer'"
                                                                    :class="typeWork === 'freelancer' ?
                                                                        'bg-Primary-dark text-white' :
                                                                        'border-Primary-dark text-gray-700'"
                                                                    class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                                                                    Freelancer
                                                                </button>

                                                                <button type="button" @click="typeWork = 'efetivo'"
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

                                                            <input type="hidden" name="type_work" :value="typeWork"
                                                                required>
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
                                                                        x-model="startDate" min="{{ date('Y-m-d') }}"
                                                                        class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                </div>

                                                                <div>
                                                                    <label for="end_date"
                                                                        class="block text-sm font-medium text-gray-700">Data
                                                                        final</label>
                                                                    <input type="date" name="end_date"
                                                                        x-model="endDate" :min="startDate"
                                                                        class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                                                                </div>
                                                                @error('end_date')
                                                                    <div
                                                                        class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror


                                                                <div class="flex flex-col">
                                                                    <span class="text-gray-400 text-[12px]">3 dias de
                                                                        prazo minimo</span>
                                                                    <div class="flex items-center gap-2">
                                                                        <label
                                                                            class="block text-sm font-medium text-gray-700">Duração
                                                                            (dias)
                                                                        </label>
                                                                        <h1 class="text-lg font-bold"
                                                                            :class="calculateDays() < 3 &&
                                                                                endDate !== '' ?
                                                                                'text-Danger' : 'text-Primary-dark'"
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
                                                            <h4 class="text-sm font-bold text-gray-700 mb-3">Skills Atuais
                                                                (Clique para remover)
                                                                :</h4>
                                                            <div
                                                                class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200">
                                                                <template x-for="skill in selectedSkills"
                                                                    :key="skill.id">
                                                                    <button type="button" @click="toggleSkill(skill)"
                                                                        class="bg-Primary text-white px-3 py-1 rounded-full text-xs flex items-center hover:bg-red-500 transition">
                                                                        <span x-text="skill.skill"></span>
                                                                        <i class="fas fa-times ml-2"></i>
                                                                    </button>
                                                                </template>

                                                                <template x-if="selectedSkills.length === 0">
                                                                    <span class="text-gray-400 text-xs">Nenhuma skill
                                                                        selecionada.</span>
                                                                </template>
                                                            </div>
                                                        </div>

                                                        {{-- Novas Skills --}}
                                                        <div class="mb-6">
                                                            <h4 class="text-sm font-bold text-gray-700 mb-3">Adicionar
                                                                Novas Skills:</h4>
                                                            <div class="flex flex-wrap gap-2 max-h-40 overflow-y-auto p-2">
                                                                <template x-for="option in allOptions"
                                                                    :key="option.id">
                                                                    <button type="button" x-show="!isChosen(option.id)"
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
                                                            <input type="number" step="0.01" name="payment"
                                                                value="{{ $work->payment }}"
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
                                </x-modal-works>
                            </div>

                            <div x-data="{ openDelete: false }">
                                <button @click="openDelete = true" class="cursor-pointer">
                                    <i class="fa-regular fa-trash-can text-Danger"></i>
                                </button>

                                <div x-show="openDelete" x-cloak
                                    class=" fixed inset-0 z-50 flex items-center justify-center bg-Dark/50 transition-all"
                                    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                                    <div @click.away="openDelete = false"
                                        class="bg-white rounded-2xl p-6 max-w-sm w-full mx-4 shadow-xl"
                                        x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="scale-95 opacity-0"
                                        x-transition:enter-end="scale-100 opacity-100">


                                        <div class="text-center">
                                            <div
                                                class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                                                <i class="fas fa-exclamation-triangle text-red-600"></i>
                                            </div>

                                            <h3 class="text-lg font-bold text-gray-900">Confirmar Exclusão</h3>
                                            <p class="text-sm text-gray-500 mt-2">
                                                Tem certeza que deseja excluir <strong>{{ $work->name_work }}</strong>?
                                                Esta
                                                ação não pode ser desfeita.
                                            </p>
                                        </div>

                                        <div class="mt-6 flex gap-3">
                                            <button @click="openDelete = false" type="button"
                                                class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition">
                                                Cancelar
                                            </button>
                                            <form action="{{ route('works.delete', $work->id) }}" method="POST"
                                                class="flex-1">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="w-full px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-medium">
                                                    Sim, Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500 text-sm">
                    Nenhuma vaga recente encontrada
                </div>
            @endforelse
        </div>

        <div class="p-3 border-t border-gray-100">
            <a href="{{ route('company.newwork') }}"
                class="flex justify-center items-center py-2 rounded-lg text-sm font-medium transition bg-Primary-light cursor-pointer">
                <i class="fas fa-plus mr-2"></i> Nova Vaga
            </a>
        </div>
    </div>

    <!-- Próximos Passos e Top Candidatos lado a lado -->
    <div class="grid grid-cols-2 gap-3 mb-6">
        <!-- Próximos Passos -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3">
            <h3 class="font-semibold text-gray-800 text-xs mb-3">Próximos Passos</h3>
            <div class="space-y-2">
                <div class="flex items-center gap-2 p-2 rounded-lg bg-Light">
                    <div class="w-6 h-6 rounded-full flex items-center justify-center bg-orange-300">
                        <i class="fas fa-file-alt text-white text-[10px]"></i>
                    </div>

                    <div class="flex-1">
                        <p class="text-[11px] font-medium text-gray-800">Propostas pendentes</p>
                        @if ($totalApplicants >= 1)
                            <p class="text-[9px] text-gray-400">{{ $totalApplicants }} aguardando</p>
                        @else
                            <p class="text-[9px] text-gray-400">0</p>
                        @endif
                    </div>
                </div>

                <div class="flex items-center gap-2 p-2 rounded-lg bg-Light">
                    <div class="w-6 h-6 rounded-full flex items-center justify-center bg-blue-300">
                        <i class="fas fa-calendar-check text-white text-[10px]"></i>
                    </div>

                    <div class="flex-1">
                        <p class="text-[11px] font-medium text-gray-800">Entrevistas hoje</p>
                        <p class="text-[9px] text-gray-400">{{ $entrevistasHoje ?? 5 }} agendadas</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Candidatos -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-semibold text-gray-800 text-xs">Top Candidatos</h3>
                <a href="#" class="text-[10px] text-Primary-dark">Ver</a>
            </div>

            <div class="space-y-2">
                @forelse($topCandidatos ?? [] as $candidato)
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-user text-gray-500 text-[10px]"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-[11px] font-medium text-gray-800">{{ $candidato['nome'] }}</p>
                            <p class="text-[9px] text-gray-400">{{ $candidato['cargo'] }}</p>
                        </div>
                        <div class="flex items-center gap-0.5">
                            <i class="fas fa-star text-yellow-400 text-[9px]"></i>
                            <span class="text-[10px] font-semibold">{{ $candidato['nota'] }}</span>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 text-[10px] py-2">
                        Nenhum candidato em destaque
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
@endsection
