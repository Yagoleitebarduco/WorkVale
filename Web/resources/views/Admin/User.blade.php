<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Minha Conta</title>
    <!-- TailwindCSS + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class=" bg-Light">
    <div class="max-w-3xl mx-auto px-4 py-6 pb-24">

        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('user.home') }}"
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <h1 class="text-2xl font-bold text-gray-800">Minha Conta</h1>
            </div>
            <p class="text-sm text-gray-500">Gerencie suas informações pessoais e profissionais</p>
        </div>

        <!-- Profile Header com Avatar -->
        <div class="bg-linear-to-r from-Primary to-Primary-dark rounded-2xl p-6 mb-6 text-white shadow-lg">
            <div class="flex items-center gap-5">
                <div class="relative">
                    <div
                        class="w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-4 border-white/30">
                        <i class="fas fa-user-circle text-5xl text-white"></i>
                    </div>

                    <button
                        class="edit-btn absolute bottom-0 right-0 w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md text-Primary-dark">
                        <i class="fas fa-camera text-xs"></i>
                    </button>
                </div>

                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-1">{{ Auth::user()->complete_name }}</h2>
                    <p class="text-white/80 text-sm mb-2 flex items-center">
                        <i class="fas fa-envelope mr-2"></i> {{ Auth::user()->email }}
                    </p>

                    <div class="flex items-center justify-between gap-3 mt-3">
                        <span class="bg-white/20 rounded-lg px-4 py-2 text-sm font-medium items-center gap-1">
                            <i class="fas fa-check-circle mr-1 text-green-400 text-sm"></i> Verificado
                        </span>

                        <div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="cursor-pointer p-2.5 rounded-lg border-2 border-Primary-light text-Primary-light font-medium flex justify-center items-center gap-2">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-briefcase text-xl text-Primary"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">12</p>
                <p class="text-xs text-gray-500">Trabalhos</p>
            </div>

            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-star text-xl text-Secondary"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">4.8</p>
                <p class="text-xs text-gray-500">Avaliação</p>
            </div>

            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-clock text-xl text-Success"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">98%</p>
                <p class="text-xs text-gray-500">Entregas no prazo</p>
            </div>
        </div>

        <!-- Tabs -->
        <div x-data="{ tab: 'dados' }" class="flex flex-col">
            <div class="flex gap-2 mb-6 bg-white p-1 rounded-xl shadow-sm border border-gray-100">
                <button @click="tab = 'dados'"
                    :class="tab === 'dados' ? 'bg-Primary-dark text-white' : 'text-gray-600'"
                    class="py-2 px-4 font-medium rounded-lg transition duration-200 flex items-center cursor-pointer flex-1">
                    <i class="fas fa-user mr-2"></i> Dados Pessoais
                </button>

                <button @click="tab = 'profissional'"
                    :class="tab === 'profissional' ? 'bg-Primary-dark text-white' : 'text-gray-600'"
                    class="py-2 px-4 font-medium rounded-lg transition duration-200 flex items-center cursor-pointer flex-1">
                    <i class="fas fa-briefcase mr-2"></i> Perfil Profissional
                </button>

                <button @click="tab = 'seguranca'"
                    :class="tab === 'seguranca' ? 'bg-Primary-dark text-white' : 'text-gray-600'"
                    class="py-2 px-4 font-medium rounded-lg transition duration-200 flex items-center cursor-pointer flex-1">
                    <i class="fas fa-shield-alt mr-2"></i> Segurança
                </button>
            </div>

            <!-- Tab: Dados Pessoais -->
            <div x-show="tab === 'dados'" x-cloak x-transition class="space-y-4">
                <!-- Informações Pessoais -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-id-card text-Primary-dark"></i>
                            Informações Pessoais
                        </h3>

                        <button class="text-sm text-Primary-dark cursor-pointer">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Nome completo</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->complete_name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">CPF</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->cpf }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Data de nascimento</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->birth_date }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">Gênero</p>
                            <p class="text-gray-800 font-medium">Feminino</p>
                        </div>
                    </div>
                </div>

                <!-- Contato -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-address-book text-Primary-dark"></i>
                            Contato
                        </h3>

                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">E-mail</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->email }}</p>
                            <span class="text-xs text-green-600"><i class="fas fa-check-circle"></i> Verificado</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">WhatsApp</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->phone_number }}</p>
                        </div>
                    </div>
                </div>

                <!-- Localização -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-Primary-dark"></i>
                            Localização
                        </h3>
                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Cidade</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->city->city }} -
                                {{ Auth::user()->city->uf }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">Bairro</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->neighborhood }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Endereço</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->address }},
                                {{ Auth::user()->number }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">CEP</p>
                            <p class="text-gray-800 font-medium">{{ Auth::user()->cep }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tab: Perfil Profissional -->
            <div x-show="tab === 'profissional'" x-cloak x-transition class="space-y-4">
                <!-- Sobre -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-info-circle text-Primary-dark"></i>
                            Sobre mim
                        </h3>
                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        @if (Auth::user()->bio === null)
                            <span class=" text-sm font-medium text-gray-400">Não Tem descrição pessoal</span>
                        @else
                            {{ Auth::user()->bio }}
                        @endif
                    </p>
                </div>

                <!-- Título Profissional -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-briefcase text-Primary-dark"></i>
                            Título Profissional
                        </h3>
                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-edit mr-1"></i> Editar
                        </button>
                    </div>
                    <p class="text-gray-800 font-medium text-lg">{{ Auth::user()->professional_title }}</p>
                </div>

                <!-- Habilidades -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-code text-Primary-dark"></i>
                            Habilidades Técnicas
                        </h3>

                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-plus mr-1"></i> Adicionar
                        </button>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($user->skills as $skill)
                            <span
                                class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium bg-Primary-light text-Primary-dark">
                                {{ $skill->skill }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Links / Portfólio -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-link text-Primary-dark"></i>
                            Links & Portfólio
                        </h3>
                        <button class="text-sm text-Primary-dark">
                            <i class="fas fa-plus mr-1"></i> Adicionar
                        </button>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                            <div>
                                <i class="fab fa-linkedin mr-2" style="color: #0077b5;"></i>
                                <span class="text-sm text-gray-700">linkedin.com/in/maria-silva</span>
                            </div>
                            <i class="fas fa-external-link-alt text-gray-400 text-xs cursor-pointer"></i>
                        </div>
                        <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                            <div>
                                <i class="fab fa-github mr-2" style="color: #333;"></i>
                                <span class="text-sm text-gray-700">github.com/mariasilva</span>
                            </div>
                            <i class="fas fa-external-link-alt text-gray-400 text-xs cursor-pointer"></i>
                        </div>
                        <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                            <div>
                                <i class="fas fa-briefcase mr-2 text-Primary-dark"></i>
                                <span class="text-sm text-gray-700">portifolio.com/mariasilva</span>
                            </div>
                            <i class="fas fa-external-link-alt text-gray-400 text-xs cursor-pointer"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tab: Segurança -->
            <div x-show="tab === 'seguranca'" x-cloak x-transition class="space-y-4">
                <!-- Alterar Senha -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-lock" style="color: var(--primary-dark);"></i>
                        Alterar Senha
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Senha atual</label>
                            <input type="password" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50"
                                placeholder="Digite sua senha atual">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nova senha</label>
                            <input type="password" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50"
                                placeholder="Digite a nova senha">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar nova senha</label>
                            <input type="password" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50"
                                placeholder="Confirme a nova senha">
                        </div>
                        <button type="submit" class="px-6 py-2 rounded-lg text-white font-medium"
                            style="background: var(--primary-dark);">
                            Atualizar senha
                        </button>
                    </form>
                </div>

                <!-- Autenticação de Dois Fatores -->
                {{-- <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-shield-alt" style="color: var(--primary-dark);"></i>
                                Autenticação de Dois Fatores
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">Adicione uma camada extra de segurança à sua conta
                            </p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" class="w-10 h-5 rounded-full"
                                style="accent-color: var(--primary-dark);">
                        </label>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="mt-6 bg-white rounded-2xl p-6 shadow-sm border border-red-100"
            style="background: linear-gradient(135deg, #fff5f5, white);">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-red-600 flex items-center gap-2">
                        <i class="fas fa-exclamation-triangle"></i>
                        Zona de Perigo
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">Ações irreversíveis para sua conta</p>
                </div>
                <button
                    class="px-4 py-2 rounded-lg text-red-600 font-medium border border-red-300 hover:bg-red-50 transition cursor-pointer">
                    Excluir conta
                </button>
            </div>
        </div>
    </div>
</body>

</html>
