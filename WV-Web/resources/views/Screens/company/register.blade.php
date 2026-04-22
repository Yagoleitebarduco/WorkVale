<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Empresa - WorkVale</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Otimizações WebView/Mobile */
        * { -webkit-tap-highlight-color: transparent; touch-action: manipulation; }
        body { overscroll-behavior: none; -webkit-overflow-scrolling: touch; }
        input, select, textarea { font-size: 16px; } /* Previne zoom no iOS */
    </style>
</head>
<body class="bg-gray-100 min-h-screen" x-data="companyRegister()">
    
    <!-- Header Fixo -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="max-w-md mx-auto px-4 py-3 flex items-center justify-between">
            <button @click="prevStep()" x-show="step > 1" class="w-10 h-10 rounded-full flex items-center justify-center text-gray-600 active:bg-gray-100 transition">
                <i class="fas fa-arrow-left text-lg"></i>
            </button>
            <h1 class="text-lg font-bold text-gray-800 flex-1 text-center" :class="{ 'ml-0': step === 1, 'ml-10': step > 1 }">
                Cadastro de Empresa
            </h1>
            <div class="w-10"></div>
        </div>
        
        <!-- Barra de Progresso -->
        <div class="max-w-md mx-auto px-4 pb-3">
            <div class="flex items-center justify-between mb-2">
                <template x-for="i in 3" :key="i">
                    <div class="flex items-center flex-1" :class="{ 'mr-2': i < 3 }">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold transition-colors"
                             :class="step >= i ? 'bg-[#6A2698] text-white' : 'bg-gray-200 text-gray-500'"
                             x-text="i"></div>
                        <div class="flex-1 h-1 mx-2 rounded-full transition-colors"
                             :class="step > i ? 'bg-[#6A2698]' : 'bg-gray-200'"
                             x-show="i < 3"></div>
                    </div>
                </template>
            </div>
            <p class="text-xs text-gray-500 text-center" x-text="getStepLabel()"></p>
        </div>
    </header>

    <!-- Conteúdo -->
    <main class="max-w-md mx-auto px-4 pt-40 pb-32 space-y-4">
        
        <!-- STEP 1: Dados da Empresa -->
        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center text-[#6A2698]"><i class="fas fa-building"></i></div>
                    <h2 class="font-semibold text-gray-800">Dados da Empresa</h2>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Razão Social ou Nome Fantasia <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.fantasy_name" placeholder="Nome da empresa" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">CNPJ ou CPF <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.cnpj" placeholder="00.000.000/0000-00" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Área de Atuação <span class="text-red-500">*</span></label>
                        <select x-model="form.industry" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none bg-white transition">
                            <option value="">Selecione a área</option>
                            <option value="tecnologia">Tecnologia</option>
                            <option value="saude">Saúde</option>
                            <option value="educacao">Educação</option>
                            <option value="varejo">Varejo</option>
                            <option value="servicos">Serviços</option>
                            <option value="industria">Indústria</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Contato e Localização -->
        <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600"><i class="fas fa-user"></i></div>
                    <h2 class="font-semibold text-gray-800">Contato Responsável</h2>
                </div>
                <div class="space-y-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Nome do Responsável <span class="text-red-500">*</span></label><input type="text" x-model="form.responsible_name" placeholder="Nome completo" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">E-mail Corporativo <span class="text-red-500">*</span></label><input type="email" x-model="form.email" placeholder="empresa@email.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Telefone <span class="text-red-500">*</span></label><input type="tel" x-model="form.phone" placeholder="(11) 99999-9999" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center text-green-600"><i class="fas fa-map-marker-alt"></i></div>
                    <h2 class="font-semibold text-gray-800">Localização</h2>
                </div>
                <div class="space-y-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Cidade Sede <span class="text-red-500">*</span></label><input type="text" x-model="form.city" placeholder="Ex: São Paulo" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Endereço Completo <span class="text-red-500">*</span></label><input type="text" x-model="form.address" placeholder="Rua, número, complemento" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                </div>
            </div>
        </div>

        <!-- STEP 3: Segurança e Descrição -->
        <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center text-[#6A2698]"><i class="fas fa-info-circle"></i></div>
                    <h2 class="font-semibold text-gray-800">Sobre a Empresa</h2>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Pequena descrição <span class="text-red-500">*</span></label>
                    <textarea x-model="form.description" rows="4" placeholder="Descreva sua empresa, missão e valores..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none resize-none transition"></textarea>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center text-red-600"><i class="fas fa-lock"></i></div>
                    <h2 class="font-semibold text-gray-800">Segurança</h2>
                </div>
                <div class="space-y-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Senha <span class="text-red-500">*</span></label><input type="password" x-model="form.password" placeholder="Mínimo 6 caracteres" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5">Confirmar Senha <span class="text-red-500">*</span></label><input type="password" x-model="form.password_confirmation" placeholder="Repita a senha" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#6A2698]/30 focus:border-[#6A2698] outline-none transition"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Fixo -->
    <footer class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50">
        <div class="max-w-md mx-auto px-4 py-4">
            <div class="flex gap-3">
                <button @click="prevStep()" x-show="step > 1" class="flex-1 px-6 py-3.5 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl active:bg-gray-50 transition text-base">Voltar</button>
                <button @click="nextStep()" class="flex-1 px-6 py-3.5 bg-[#6A2698] text-white font-semibold rounded-xl active:bg-[#5A1D80] transition shadow-lg shadow-purple-200 text-base" :class="{ 'opacity-50': loading }">
                    <span x-show="!loading && step < 3">Continuar</span>
                    <span x-show="!loading && step === 3">Finalizar Cadastro</span>
                    <span x-show="loading"><i class="fas fa-spinner fa-spin"></i></span>
                </button>
            </div>
        </div>
    </footer>

    <!-- Toast de Erro -->
    <div x-show="error" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200" class="fixed top-20 left-4 right-4 bg-red-500 text-white px-4 py-3 rounded-xl shadow-lg z-50 max-w-md mx-auto">
        <div class="flex items-center gap-2"><i class="fas fa-exclamation-circle"></i><span x-text="error"></span></div>
    </div>

    <script>
        function companyRegister() {
            return {
                step: 1,
                loading: false,
                error: '',
                form: {
                    fantasy_name: '', cnpj: '', industry: '', responsible_name: '',
                    email: '', phone: '', city: '', address: '', description: '',
                    password: '', password_confirmation: ''
                },
                getStepLabel() {
                    return { 1: 'Dados da Empresa', 2: 'Contato e Localização', 3: 'Segurança e Descrição' }[this.step];
                },
                validateStep() {
                    this.error = '';
                    const f = this.form;
                    if (this.step === 1) {
                        if (!f.fantasy_name) return this.error = 'Preencha o nome da empresa';
                        if (!f.cnpj) return this.error = 'Preencha o CNPJ/CPF';
                        if (!f.industry) return this.error = 'Selecione a área de atuação';
                    } else if (this.step === 2) {
                        if (!f.responsible_name) return this.error = 'Preencha o nome do responsável';
                        if (!f.email || !f.email.includes('@')) return this.error = 'E-mail inválido';
                        if (!f.phone) return this.error = 'Preencha o telefone';
                        if (!f.city) return this.error = 'Preencha a cidade';
                        if (!f.address) return this.error = 'Preencha o endereço';
                    } else if (this.step === 3) {
                        if (!f.description) return this.error = 'Preencha a descrição da empresa';
                        if (!f.password || f.password.length < 6) return this.error = 'Senha deve ter no mínimo 6 caracteres';
                        if (f.password !== f.password_confirmation) return this.error = 'As senhas não coincidem';
                    }
                    return true;
                },
                nextStep() {
                    if (this.validateStep() !== true) return;
                    if (this.step < 3) {
                        this.step++;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        this.submit();
                    }
                },
                prevStep() {
                    if (this.step > 1) { this.step--; window.scrollTo({ top: 0, behavior: 'smooth' }); }
                },
                async submit() {
                    this.loading = true;
                    this.error = '';
                    try {
                        const res = await fetch('/register/company', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(this.form)
                        });
                        const data = await res.json();
                        if (res.ok && data.success) {
                            window.location.href = data.redirect || '/company/dashboard';
                        } else {
                            this.error = data.message || 'Erro ao cadastrar. Verifique os dados.';
                        }
                    } catch (e) {
                        this.error = 'Erro de conexão. Tente novamente.';
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>
</body>
</html>