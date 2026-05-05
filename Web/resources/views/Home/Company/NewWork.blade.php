@extends('Layouts.app')
@section('title', 'Novo Trabalho')

@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Novo Trabalho</h1>
            </div>

            <div class="relative">
                <button
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-plus text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('company.newwork') }}" method="post">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome do trabalho</label>
                <input type="text" name="name_work"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                    placeholder="Ex: Desenvolvimento de Landing Page" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <textarea name="description_work" rows="5"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"></textarea>
                </textarea>
            </div>

            <div>
                <div x-data="{
                    startDate: '{{ date('Y-m-d') }}',
                    endDate: '',
                    calculateDays() {
                        if (!this.startDate || !this.endDate) return 0;
                        const start = new Date(this.startDate);
                        const end = new Date(this.endDate);
                        const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                        return diff > 0 ? diff : 0;
                    }
                }" class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Data inicial</label>
                        <input type="date" name="start_date" x-model="startDate" min="{{ date('Y-m-d') }}"
                            class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">Data final</label>
                        <input type="date" name="end_date" x-model="endDate" :min="startDate"
                            class="mt-2 w-full border border-gray-400 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark transition duration-150">
                    </div>
                    @error('end_date')
                        <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="flex flex-col">
                        <span class="text-gray-400 text-[12px]">3 dias de prazo minimo</span>
                        <div class="flex items-center gap-2">
                            <label class="block text-sm font-medium text-gray-700">Duração (dias)</label>
                            <h1 class="text-lg font-bold"
                                :class="calculateDays() < 3 && endDate !== '' ? 'text-Danger' : 'text-Primary-dark'"
                                x-text="calculateDays()"></h1>
                        </div>
                    </div>
                    @error('duration')
                        <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="hidden" name="duration" :value="calculateDays()">
                </div>
            </div>

            <div>
                <div x-data="{ typeWork: '' }">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipo do trabalho</label>

                    <div class="grid grid-cols-2 mb-1 py-4 px-2 gap-3">
                        <button type="button" @click="typeWork = 'freelancer'"
                            :class="typeWork === 'freelancer' ? 'bg-Primary-dark text-white' :
                                'border-Primary-dark text-gray-700'"
                            class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                            Freelancer
                        </button>

                        <button type="button" @click="typeWork = 'efetivo'"
                            :class="typeWork === 'efetivo' ? 'bg-Primary-dark text-white' : 'border-Primary-dark text-gray-700'"
                            class="border py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                            Efetivo
                        </button>
                    </div>
                    @error('type_work')
                        <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <input type="hidden" name="type_work" :value="typeWork" required>
                </div>
            </div>

            <div>
                <div x-data="{
                    selectedSkills: [],
                    skills: {{ $skills->toJson() }},
                
                    get categories() {
                        const cats = new Set();
                        this.skills.forEach(skill => {
                            cats.add(skill.category);
                        });
                        return Array.from(cats);
                    },
                
                    getSkillsByCategory(category) {
                        return this.skills.filter(skill => skill.category === category);
                    },
                
                    toggleSkill(id, name, category) {
                        const index = this.selectedSkills.findIndex(s => s.id === id);
                
                        if (index === -1) {
                            this.selectedSkills.push({ id, name, category });
                        } else {
                            this.selectedSkills.splice(index, 1);
                        }
                    },
                
                    isSelected(id) {
                        return this.selectedSkills.some(s => s.id === id);
                    },
                
                    get totalSelected() {
                        return this.selectedSkills.length;
                    }
                }" class="space-y-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Selecione seus serviços
                            <span class="ml-2 text-xs text-gray-500" x-text="`(${totalSelected} selecionados)`"></span>
                        </label>
                    </div>

                    <div class="space-y-6">
                        <template x-for="category in categories" :key="category">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800 mb-2 pb-1 border-b border-gray-200"
                                    x-text="category"></h4>
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="skill in getSkillsByCategory(category)" :key="skill.id">
                                        <button type="button" @click="toggleSkill(skill.id, skill.skill, skill.category)"
                                            :class="isSelected(skill.id) ?
                                                'bg-Primary-dark text-white border-Primary-dark' :
                                                'bg-white text-gray-700 border-gray-300 hover:bg-Primary-light'"
                                            class="px-3 py-1.5 rounded-full border text-sm transition cursor-pointer duration-150">
                                            <span x-text="isSelected(skill.id) ? '✓' : '+'"></span>
                                            <span x-text="skill.skill"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div x-show="totalSelected > 0" class="text-sm text-gray-600 pt-2">
                        <span class="font-medium">Selecionados:</span>
                        <span x-text="selectedSkills.map(s => s.name).join(', ')"></span>
                    </div>

                    <template x-for="skill in selectedSkills" :key="skill.id">
                        <input type="hidden" name="skills[]" :value="skill.id">
                    </template>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pagamento (R$)</label>
                <input type="number" step="0.01" name="payment"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                    placeholder="Ex: 1500.00" required>
            </div>
        </div>

        <div class="flex gap-2 pt-4">
            <button type="submit" class="flex-1 py-2 rounded-xl text-white font-medium bg-Primary-dark">
                Salvar
            </button>
        </div>
    </form>
@endsection
