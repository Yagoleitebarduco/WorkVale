<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Minha Conta</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary-dark: #6A2698;
            --primary-medium: #5A1D80;
            --primary-light: #E2D4F0;
            --accent-yellow: #FFC107;
            --accent-green: #6ECB63;
            --accent-red: #FF6B6B;
            --accent-blue: #3498db;
            --bg-light: #F8F9FA;
            --text-dark: #343A40;
            --text-gray: #6c757d;
            --white: #FFFFFF;
            --border-color: #e5e7eb;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
        }

        .info-card {
            transition: all 0.2s ease;
        }

        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-card {
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .edit-btn {
            transition: all 0.2s ease;
        }

        .edit-btn:hover {
            background: var(--primary-light);
            transform: scale(1.05);
        }

        .modal {
            transition: all 0.3s ease;
        }

        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-content {
            animation: slideUp 0.3s ease-out forwards;
        }

        .form-input {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(106, 38, 152, 0.1);
        }

        .skill-tag {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .skill-tag:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .tab-btn {
            transition: all 0.2s ease;
        }

        .tab-btn.active {
            background: var(--primary-dark);
            color: white;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-dark);
            border-radius: 2px;
        }
    </style>
</head>

<body style="background: var(--bg-light); font-family: 'Inter', sans-serif;">

    <div class="max-w-3xl mx-auto px-4 py-6 pb-24">

        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center gap-3 mb-4">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-2xl font-bold text-gray-800">Minha Conta</h1>
            </div>
            <p class="text-sm text-gray-500">Gerencie suas informações pessoais e profissionais</p>
        </div>

        <!-- Profile Header com Avatar -->
        <div class="profile-header rounded-2xl p-6 mb-6 text-white shadow-lg">
            <div class="flex items-center gap-5">
                <div class="relative">
                    <div
                        class="w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-4 border-white/30">
                        <i class="fas fa-user-circle text-5xl text-white"></i>
                    </div>
                    <button
                        class="edit-btn absolute bottom-0 right-0 w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md"
                        style="color: var(--primary-dark);">
                        <i class="fas fa-camera text-xs"></i>
                    </button>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-1">Maria Silva Santos</h2>
                    <p class="text-white/80 text-sm mb-2">
                        <i class="fas fa-envelope mr-2"></i> maria.silva@email.com
                    </p>
                    <div class="flex items-center gap-3">
                        <span class="bg-white/20 rounded-full px-3 py-1 text-xs">
                            <i class="fas fa-check-circle mr-1"></i> Verificado
                        </span>
                        <span class="bg-white/20 rounded-full px-3 py-1 text-xs">
                            <i class="fas fa-star mr-1"></i> Membro desde Jan/2024
                        </span>
                    </div>
                </div>
                <button class="bg-white/20 hover:bg-white/30 transition px-4 py-2 rounded-xl text-sm font-medium">
                    <i class="fas fa-pen mr-2"></i> Editar Perfil
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-briefcase text-xl" style="color: var(--primary-dark);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">12</p>
                <p class="text-xs text-gray-500">Trabalhos</p>
            </div>
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-star text-xl" style="color: var(--accent-yellow);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">4.8</p>
                <p class="text-xs text-gray-500">Avaliação</p>
            </div>
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-clock text-xl" style="color: var(--accent-green);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1">98%</p>
                <p class="text-xs text-gray-500">Entregas no prazo</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6 bg-white p-1 rounded-xl shadow-sm border border-gray-100">
            <button class="tab-btn active flex-1 py-2.5 rounded-lg font-medium transition text-gray-600"
                data-tab="pessoal">
                <i class="fas fa-user mr-2"></i> Dados Pessoais
            </button>
            <button class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition text-gray-600"
                data-tab="profissional">
                <i class="fas fa-briefcase mr-2"></i> Perfil Profissional
            </button>
            <button class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition text-gray-600" data-tab="seguranca">
                <i class="fas fa-shield-alt mr-2"></i> Segurança
            </button>
        </div>

        <!-- Tab: Dados Pessoais -->
        <div id="pessoalTab" class="tab-content space-y-4">
            <!-- Informações Pessoais -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-id-card" style="color: var(--primary-dark);"></i>
                        Informações Pessoais
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Nome completo</p>
                        <p class="text-gray-800 font-medium">Maria Silva Santos</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">CPF</p>
                        <p class="text-gray-800 font-medium">123.456.789-00</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Data de nascimento</p>
                        <p class="text-gray-800 font-medium">15/03/1990</p>
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
                        <i class="fas fa-address-book" style="color: var(--primary-dark);"></i>
                        Contato
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">E-mail</p>
                        <p class="text-gray-800 font-medium">maria.silva@email.com</p>
                        <span class="text-xs text-green-600"><i class="fas fa-check-circle"></i> Verificado</span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">WhatsApp</p>
                        <p class="text-gray-800 font-medium">(13) 99999-9999</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Telefone alternativo</p>
                        <p class="text-gray-800 font-medium">(13) 3333-3333</p>
                    </div>
                </div>
            </div>

            <!-- Localização -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt" style="color: var(--primary-dark);"></i>
                        Localização
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Cidade</p>
                        <p class="text-gray-800 font-medium">Registro - SP</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Bairro</p>
                        <p class="text-gray-800 font-medium">Centro</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Endereço</p>
                        <p class="text-gray-800 font-medium">Rua Principal, 123</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">CEP</p>
                        <p class="text-gray-800 font-medium">11900-000</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab: Perfil Profissional -->
        <div id="profissionalTab" class="tab-content space-y-4 hidden">
            <!-- Sobre -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-info-circle" style="color: var(--primary-dark);"></i>
                        Sobre mim
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Desenvolvedora Full Stack com 5 anos de experiência, especializada em React, Node.js e banco de
                    dados.
                    Apaixonada por criar soluções inovadoras que resolvem problemas reais. Já trabalhei em mais de 20
                    projetos
                    para empresas de pequeno e médio porte.
                </p>
            </div>

            <!-- Título Profissional -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-briefcase" style="color: var(--primary-dark);"></i>
                        Título Profissional
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <p class="text-gray-800 font-medium text-lg">Desenvolvedora Full Stack Sênior</p>
            </div>

            <!-- Habilidades -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-code" style="color: var(--primary-dark);"></i>
                        Habilidades Técnicas
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-plus mr-1"></i> Adicionar
                    </button>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        JavaScript/TypeScript
                    </span>
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        React.js
                    </span>
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Node.js
                    </span>
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Python
                    </span>
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        SQL
                    </span>
                    <span class="skill-tag px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Git/GitHub
                    </span>
                </div>
            </div>

            <!-- Categorias de Atuação -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-tags" style="color: var(--primary-dark);"></i>
                        Categorias de Atuação
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </button>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: rgba(106, 38, 152, 0.1); color: var(--primary-dark);">
                        <i class="fas fa-code mr-1"></i> Tecnologia
                    </span>
                    <span class="px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: rgba(106, 38, 152, 0.1); color: var(--primary-dark);">
                        <i class="fas fa-paintbrush mr-1"></i> Design
                    </span>
                    <span class="px-3 py-1.5 rounded-lg text-sm font-medium"
                        style="background: rgba(106, 38, 152, 0.1); color: var(--primary-dark);">
                        <i class="fas fa-chart-line mr-1"></i> Consultoria
                    </span>
                </div>
            </div>

            <!-- Links / Portfólio -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fas fa-link" style="color: var(--primary-dark);"></i>
                        Links & Portfólio
                    </h3>
                    <button class="text-sm" style="color: var(--primary-dark);">
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
                            <i class="fas fa-briefcase mr-2" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">portifolio.com/mariasilva</span>
                        </div>
                        <i class="fas fa-external-link-alt text-gray-400 text-xs cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab: Segurança -->
        <div id="segurancaTab" class="tab-content space-y-4 hidden">
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
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-shield-alt" style="color: var(--primary-dark);"></i>
                            Autenticação de Dois Fatores
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Adicione uma camada extra de segurança à sua conta</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" class="w-10 h-5 rounded-full"
                            style="accent-color: var(--primary-dark);">
                    </label>
                </div>
            </div>

            <!-- Sessões Ativas -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-desktop" style="color: var(--primary-dark);"></i>
                    Sessões Ativas
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-laptop text-gray-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Windows - Chrome</p>
                                <p class="text-xs text-gray-500">São Paulo, SP • Último acesso agora</p>
                            </div>
                        </div>
                        <span class="text-xs text-green-600"><i class="fas fa-circle"></i> Ativo</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-mobile-alt text-gray-600"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-800">iPhone - Safari</p>
                                <p class="text-xs text-gray-500">Registro, SP • Último acesso há 2 dias</p>
                            </div>
                        </div>
                        <button class="text-xs text-red-500">Encerrar</button>
                    </div>
                </div>
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
                    class="px-4 py-2 rounded-lg text-red-600 font-medium border border-red-300 hover:bg-red-50 transition">
                    Excluir conta
                </button>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="fixed bottom-0 left-0 right-0 max-w-3xl mx-auto bg-white border-t border-gray-200 rounded-t-2xl shadow-lg px-4 py-2 flex justify-around items-center"
            style="margin: 0 auto;">
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs mt-1">Início</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-chart-line text-xl"></i>
                <span class="text-xs mt-1">Mural</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-briefcase text-xl"></i>
                <span class="text-xs mt-1">Meus Jobs</span>
            </a>
            <a href="#" class="flex flex-col items-center" style="color: var(--primary-dark);">
                <i class="fas fa-user-circle text-xl"></i>
                <span class="text-xs mt-1 font-medium">Conta</span>
            </a>
        </div>
    </div>

    <script>
        // Tabs
        const tabs = document.querySelectorAll('.tab-btn');
        const tabContents = {
            'pessoal': document.getElementById('pessoalTab'),
            'profissional': document.getElementById('profissionalTab'),
            'seguranca': document.getElementById('segurancaTab')
        };

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');

                tabs.forEach(t => {
                    t.classList.remove('active');
                    t.style.background = 'white';
                    t.style.color = 'var(--text-gray)';
                });

                this.classList.add('active');
                this.style.background = 'var(--primary-dark)';
                this.style.color = 'white';

                Object.keys(tabContents).forEach(key => {
                    if (key === tabId) {
                        tabContents[key].classList.remove('hidden');
                    } else {
                        tabContents[key].classList.add('hidden');
                    }
                });
            });
        });

        // Back button
        const backButton = document.querySelector('.fa-arrow-left').parentElement;
        backButton.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Voltando para página anterior...');
        });

        // Edit buttons
        const editButtons = document.querySelectorAll('.flex.justify-between .text-primary-dark');
        editButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                alert('Funcionalidade de edição em desenvolvimento');
            });
        });

        // Skill tags
        const skillTags = document.querySelectorAll('.skill-tag');
        skillTags.forEach(tag => {
            tag.addEventListener('click', function() {
                alert(`Habilidade: ${this.innerText}`);
            });
        });

        // Excluir conta
        const deleteBtn = document.querySelector('.border-red-300');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', () => {
                if (confirm('Tem certeza que deseja excluir sua conta? Esta ação é irreversível!')) {
                    alert('Conta excluída com sucesso!');
                }
            });
        }

        // Update password
        const updatePasswordBtn = document.querySelector('.bg-primary-dark');
        if (updatePasswordBtn) {
            updatePasswordBtn.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Senha atualizada com sucesso!');
            });
        }
    </script>
</body>

</html>
