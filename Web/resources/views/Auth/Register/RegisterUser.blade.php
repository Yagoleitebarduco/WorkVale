<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Cadastro de Freelancer</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery e Mask Plugin -->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class=" bg-linear-to-r from-Light to-Primary-light min-h-screen flex flex-col">
    <div class="max-w-2xl mx-auto px-4 py-6 pb-24">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block">
                <h1 class="text-3xl font-bold text-Primary">
                    Work<span class="text-Primary-dark">Vale</span>
                </h1>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 mt-3">Cadastro de Freelancer</h2>
            <p class="text-sm text-gray-500 mt-1">Preencha seus dados para criar seu perfil</p>
        </div>

        <form id="registerForm" class="space-y-8" method="POST" action="{{ route('register.user') }}">
            @csrf

            <!-- Seção 1: Dados Pessoais -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-user-circle text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="complete_name"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white  border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu nome completo" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CPF <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="cpf" id="cpf"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="000.000.000-00" required>
                        @error('cpf')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Data de Nascimento <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="birth_date"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            required>
                        @error('birth_date')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="" required>
                    </div>
                </div>
            </div>

            <!-- Seção 2: Contato -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-address-card text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Contato</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="seu@email.com" required>
                        @error('email')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <p class="text-xs text-gray-400 mt-1">Será usado como login</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Numero <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="(99) 99999-9999" required>
                        @error('phone_number')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Seção 3: Localização -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-map-marker-alt text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Localização</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade <span class="text-red-500">*</span>
                        </label>

                        {{-- Ajustar --}}
                        <select name="city_id"
                            class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out">
                            <option selected class="hidden">Selecione sua cidade</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-400 mt-1">25 municípios do Vale do Ribeira</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CEP <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="cep" id="cep"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="99999-999" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="address"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu bairro" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Bairro <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="neighborhood"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu bairro" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Numero <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="number"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu bairro" required>
                    </div>
                </div>
            </div>

            <!-- Seção 4: Perfil Profissional -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-briefcase text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Perfil Profissional</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Título Profissional <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="professional_title"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Ex: Eletricista, Designer, Redator" required>
                    </div>

                    {{-- Nova Opção --}}
                    {{-- <div>
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
                                    <span class="ml-2 text-xs text-gray-500"
                                        x-text="`(${totalSelected} selecionados)`"></span>
                                </label>
                            </div>

                            <div class="space-y-6">
                                <template x-for="category in categories" :key="category">
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-800 mb-2 pb-1 border-b border-gray-200"
                                            x-text="category"></h4>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="skill in getSkillsByCategory(category)"
                                                :key="skill.id">
                                                <button type="button"
                                                    @click="toggleSkill(skill.id, skill.skill, skill.category)"
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
                    </div> --}}

                    <div>
                        <div x-data="{
                            selectedSkills: [],
                            skills: {{ $skills->toJson() }},
                            search: '', // Nova variável para armazenar o texto digitado
                        
                            get categories() {
                                const cats = new Set();
                                // Filtragem inteligente: só mostra a categoria se ela contiver alguma skill que bate com a busca
                                this.filteredSkills.forEach(skill => {
                                    cats.add(skill.category);
                                });
                                return Array.from(cats);
                            },
                        
                            // Nova computed property para centralizar o filtro da pesquisa
                            get filteredSkills() {
                                if (this.search.trim() === '') {
                                    return this.skills;
                                }
                                return this.skills.filter(skill =>
                                    skill.skill.toLowerCase().includes(this.search.toLowerCase())
                                );
                            },
                        
                            // Ajustado para buscar apenas dentro das skills já filtradas pela pesquisa
                            getSkillsByCategory(category) {
                                return this.filteredSkills.filter(skill => skill.category === category);
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
                        }"
                            class="max-w-4xl mx-auto rounded-2xl space-y-6">
                            <div
                                class="border-b border-gray-100 pb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <label class="block text-base font-semibold text-gray-900">
                                        Selecione seus serviços
                                    </label>
                                    <p class="text-xs text-gray-500 mt-0.5">Digite o que procura ou explore as
                                        categorias abaixo.</p>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                
                                <input type="text" x-model="search"
                                    placeholder="Buscar por uma habilidade específica... (ex: PHP, UI/UX, Financeiro)"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-Primary-dark/20 focus:border-Primary-dark transition-all duration-150 bg-gray-50/50">
                                <button type="button" x-show="search.length > 0" @click="search = ''"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 text-sm font-medium focus:outline-none"
                                    style="display: none;">
                                    Limpar
                                </button>
                            </div>

                            <div class="space-y-8">
                                <div x-show="categories.length === 0"
                                    class="text-center py-8 bg-gray-50 rounded-xl border border-dashed border-gray-200 animate-fadeIn"
                                    style="display: none;">
                                    <p class="text-sm text-gray-500 font-medium">Nenhuma habilidade encontrada para
                                        "<span class="font-bold text-gray-700" x-text="search"></span>"</p>
                                </div>

                                <template x-for="category in categories" :key="category">
                                    <div class="space-y-3" x-transition>
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400"
                                                x-text="category"></h4>
                                            <div class="h-px flex-1 bg-gradient-to-r from-gray-200 to-transparent">
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="skill in getSkillsByCategory(category)"
                                                :key="skill.id">
                                                <button type="button"
                                                    @click="toggleSkill(skill.id, skill.skill, skill.category)"
                                                    :class="isSelected(skill.id) ?
                                                        'bg-Primary-dark text-white border-Primary-dark shadow-sm shadow-Primary-dark/10 ring-2 ring-Primary-dark/10' :
                                                        'bg-white text-gray-600 border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900'"
                                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border text-sm font-medium transition-all duration-200 cursor-pointer select-none focus:outline-none">
                                                    <span class="text-xs transition-transform duration-200"
                                                        :class="isSelected(skill.id) ? 'scale-110 font-bold' : 'text-gray-400'"
                                                        x-text="isSelected(skill.id) ? '✓' : '+'">
                                                    </span>
                                                    <span x-text="skill.skill"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div x-show="totalSelected > 0" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                class="pt-4 border-t border-gray-100 space-y-2" style="display: none;">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 block">Sua
                                    seleção atual:</span>
                                <div class="flex flex-wrap gap-1.5">
                                    <template x-for="skill in selectedSkills" :key="skill.id">
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-1 bg-gray-100 text-gray-700 text-xs font-medium rounded-lg border border-gray-200/60 animate-fadeIn">
                                            <span x-text="skill.name"></span>
                                            <button type="button"
                                                @click="toggleSkill(skill.id, skill.name, skill.category)"
                                                class="text-gray-400 hover:text-red-500 font-bold ml-0.5 focus:outline-none">
                                                &times;
                                            </button>
                                        </span>
                                    </template>
                                </div>
                            </div>

                            <template x-for="skill in selectedSkills" :key="skill.id">
                                <input type="hidden" name="skills[]" :value="skill.id">
                            </template>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link de Portfólio ou LinkedIn
                        </label>
                        <input type="url" name="portifolio_link"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="https://seusite.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Breve Bio / Resumo de Experiência
                        </label>
                        <textarea rows="4" name="bio"
                            class="form-textarea w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white resize-none border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Conte um pouco sobre sua experiência, habilidades e objetivos profissionais..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Termos e Condições -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="terms" class="mt-0.5 accent-Primary cursor-pointer" required>
                    <label for="terms" class="text-sm text-gray-600">
                        Concordo com os <a href="#" class="text-Primary-dark font-medium">Termos de Uso</a>
                        e <a href="#" class="text-Primary-dark font-medium">Política de Privacidade</a>
                    </label>

                    @error('terms')
                        <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-3 pt-4">
                <a href="{{ route('selectScreen') }}"
                    class="flex-1 text-center px-6 py-3 rounded-xl border bg-white border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition cursor-pointer">
                    Cancelar</a>

                <button type="submit"
                    class="btn-primary flex-1 px-6 py-3 rounded-xl text-white font-medium bg-Primary-dark cursor-pointer hover:bg-Primary transition duration-200">
                    <i class="fas fa-check-circle mr-2"></i>
                    Criar Perfil
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-xs text-gray-400">
                © 2024 WorkVale - Conectando talentos, impulsionando negócios.
            </p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');

            $('#phone_number').mask('(00) 00000-0000');

            $('#cep').mask('00000-000');
        })
    </script>
</body>

</html>
