<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Painel Administrativo</title>
    <!-- TailwindCSS CDN + Font Awesome + Chart.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap');

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
            --accent-orange: #FF9800;
            --bg-light: #F8F9FA;
            --text-dark: #343A40;
            --text-gray: #6c757d;
            --white: #FFFFFF;
            --border-color: #e5e7eb;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar-item {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .sidebar-item:hover {
            background: rgba(106, 38, 152, 0.1);
            transform: translateX(5px);
        }

        .sidebar-item.active {
            background: var(--primary-dark);
            color: white;
        }

        .stat-card {
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background: var(--bg-light);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
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

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-dark);
            border-radius: 3px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-content {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>

<body style="background: var(--bg-light); font-family: 'Inter', sans-serif;">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside class="sidebar w-72 bg-white shadow-lg border-r border-gray-100 flex flex-col"
            style="background: linear-gradient(180deg, #fff 0%, #f8f9fa 100%);">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                        style="background: var(--primary-dark);">
                        <i class="fas fa-chart-line text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold" style="color: var(--primary-dark);">Work<span
                                style="color: var(--primary-dark);">Vale</span></h1>
                        <p class="text-xs text-gray-500">Painel Administrativo</p>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 space-y-1">
                <div class="sidebar-item active p-3 rounded-xl flex items-center gap-3" data-page="dashboard">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="usuarios">
                    <i class="fas fa-users w-5"></i>
                    <span class="font-medium">Usuários</span>
                    <span class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full">128</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="trabalhos">
                    <i class="fas fa-briefcase w-5"></i>
                    <span class="font-medium">Trabalhos</span>
                    <span class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full">45</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="categorias">
                    <i class="fas fa-tags w-5"></i>
                    <span class="font-medium">Categorias</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="empresas">
                    <i class="fas fa-building w-5"></i>
                    <span class="font-medium">Empresas</span>
                    <span class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full">32</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="freelancers">
                    <i class="fas fa-user-astronaut w-5"></i>
                    <span class="font-medium">Freelancers</span>
                    <span class="ml-auto text-xs bg-gray-100 px-2 py-0.5 rounded-full">96</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="transacoes">
                    <i class="fas fa-credit-card w-5"></i>
                    <span class="font-medium">Transações</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="denuncias">
                    <i class="fas fa-flag w-5"></i>
                    <span class="font-medium">Denúncias</span>
                    <span class="ml-auto text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">3</span>
                </div>
                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="configuracoes">
                    <i class="fas fa-cog w-5"></i>
                    <span class="font-medium">Configurações</span>
                </div>
            </nav>

            <!-- Footer do Sidebar -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3 p-2 rounded-xl bg-gray-50">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center"
                        style="background: var(--primary-light);">
                        <i class="fas fa-user-shield" style="color: var(--primary-dark);"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">Admin Master</p>
                        <p class="text-xs text-gray-500">admin@workvale.com</p>
                    </div>
                    <i class="fas fa-sign-out-alt text-gray-400 cursor-pointer hover:text-red-500 transition"></i>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">

                <!-- Header -->
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

                <!-- PÁGINA: DASHBOARD -->
                <div id="dashboardPage" class="page-content">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-4 gap-5 mb-8">
                        <div class="stat-card bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500">Total de Usuários</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-1">128</p>
                                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> +12% este mês
                                    </p>
                                </div>
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                                    style="background: rgba(106, 38, 152, 0.1);">
                                    <i class="fas fa-users text-xl" style="color: var(--primary-dark);"></i>
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

                    <!-- Gráficos -->
                    <div class="grid grid-cols-2 gap-6 mb-8">
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

                <!-- PÁGINA: USUÁRIOS -->
                <div id="usuariosPage" class="page-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Gerenciar Usuários</h3>
                            <button onclick="openUserModal()"
                                class="px-4 py-2 rounded-lg text-white text-sm font-medium"
                                style="background: var(--primary-dark);">
                                <i class="fas fa-plus mr-2"></i> Novo Usuário
                            </button>
                        </div>
                        <div class="p-4 border-b border-gray-100">
                            <div class="flex gap-3">
                                <div class="flex-1 relative">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" placeholder="Buscar usuários..."
                                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
                                </div>
                                <select class="px-4 py-2 rounded-lg border border-gray-200">
                                    <option>Todos os tipos</option>
                                    <option>Freelancer</option>
                                    <option>Empresa</option>
                                </select>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Nome</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Tipo</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">1</td>
                                        <td class="px-6 py-4 font-medium">Maria Silva</td>
                                        <td class="px-6 py-4 text-sm">maria@email.com</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background: rgba(106,38,152,0.1);color:var(--primary-dark);">Freelancer</span>
                                        </td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(110,203,99,0.1);color:var(--accent-green);">Ativo</span>
                                        </td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">2</td>
                                        <td class="px-6 py-4 font-medium">João Santos</td>
                                        <td class="px-6 py-4 text-sm">joao@email.com</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(52,152,219,0.1);color:var(--accent-blue);">Empresa</span>
                                        </td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(110,203,99,0.1);color:var(--accent-green);">Ativo</span>
                                        </td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">3</td>
                                        <td class="px-6 py-4 font-medium">Ana Costa</td>
                                        <td class="px-6 py-4 text-sm">ana@email.com</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(106,38,152,0.1);color:var(--primary-dark);">Freelancer</span>
                                        </td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(255,193,7,0.1);color:#d4a000;">Pendente</span>
                                        </td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <p class="text-sm text-gray-500">Mostrando 3 de 128 usuários</p>
                            <div class="flex gap-2"><button class="px-3 py-1 rounded border">Anterior</button><button
                                    class="px-3 py-1 rounded bg-primary-dark text-white">1</button><button
                                    class="px-3 py-1 rounded border">2</button><button
                                    class="px-3 py-1 rounded border">3</button><button
                                    class="px-3 py-1 rounded border">Próximo</button></div>
                        </div>
                    </div>
                </div>

                <!-- PÁGINA: TRABALHOS -->
                <div id="trabalhosPage" class="page-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Gerenciar Trabalhos</h3>
                            <button onclick="openJobModal()"
                                class="px-4 py-2 rounded-lg text-white text-sm font-medium"
                                style="background: var(--primary-dark);"><i class="fas fa-plus mr-2"></i> Novo
                                Trabalho</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Título</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Empresa</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Valor</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">1</td>
                                        <td class="px-6 py-4 font-medium">Desenvolvedor Java</td>
                                        <td class="px-6 py-4 text-sm">TechSolutions</td>
                                        <td class="px-6 py-4 text-sm font-semibold">R$ 3.500</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(106,38,152,0.1);color:var(--primary-dark);">Aberto</span>
                                        </td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">2</td>
                                        <td class="px-6 py-4 font-medium">Designer Gráfico</td>
                                        <td class="px-6 py-4 text-sm">Creative Agency</td>
                                        <td class="px-6 py-4 text-sm font-semibold">R$ 1.200</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(110,203,99,0.1);color:var(--accent-green);">Em
                                                andamento</span></td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    <tr class="table-row">
                                        <td class="px-6 py-4 text-sm">3</td>
                                        <td class="px-6 py-4 font-medium">Marketing Digital</td>
                                        <td class="px-6 py-4 text-sm">Digital Growth</td>
                                        <td class="px-6 py-4 text-sm font-semibold">R$ 4.200</td>
                                        <td class="px-6 py-4"><span class="status-badge"
                                                style="background:rgba(255,193,7,0.1);color:#d4a000;">Pendente</span>
                                        </td>
                                        <td class="px-6 py-4"><button class="text-primary-dark mr-2"><i
                                                    class="fas fa-edit"></i></button><button class="text-red-500"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- PÁGINA: CATEGORIAS -->
                <div id="categoriasPage" class="page-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Categorias</h3>
                            <button onclick="openCategoryModal()"
                                class="px-4 py-2 rounded-lg text-white text-sm font-medium"
                                style="background: var(--primary-dark);"><i class="fas fa-plus mr-2"></i> Nova
                                Categoria</button>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-6">
                            <div class="p-4 rounded-xl border border-gray-100 flex items-center justify-between">
                                <div><i class="fas fa-code text-xl" style="color:var(--primary-dark);"></i>
                                    <p class="font-medium mt-1">Tecnologia</p>
                                    <p class="text-xs text-gray-500">12 trabalhos</p>
                                </div><button class="text-gray-400 hover:text-primary-dark"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                            <div class="p-4 rounded-xl border border-gray-100 flex items-center justify-between">
                                <div><i class="fas fa-paintbrush text-xl" style="color:var(--primary-dark);"></i>
                                    <p class="font-medium mt-1">Design</p>
                                    <p class="text-xs text-gray-500">8 trabalhos</p>
                                </div><button class="text-gray-400 hover:text-primary-dark"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                            <div class="p-4 rounded-xl border border-gray-100 flex items-center justify-between">
                                <div><i class="fas fa-chart-line text-xl" style="color:var(--primary-dark);"></i>
                                    <p class="font-medium mt-1">Marketing</p>
                                    <p class="text-xs text-gray-500">6 trabalhos</p>
                                </div><button class="text-gray-400 hover:text-primary-dark"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configurações -->
                <div id="configuracoesPage" class="page-content hidden">
                    <div class="space-y-6">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <h3 class="text-lg font-semibold mb-4">Configurações Gerais</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium">Manutenção do Site</p>
                                        <p class="text-sm text-gray-500">Ativar modo de manutenção</p>
                                    </div><label class="toggle-switch"><input type="checkbox"
                                            class="w-10 h-5 rounded-full"
                                            style="accent-color:var(--primary-dark);"></label>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium">Registro de Novos Usuários</p>
                                        <p class="text-sm text-gray-500">Permitir novos cadastros</p>
                                    </div><label class="toggle-switch"><input type="checkbox" checked
                                            class="w-10 h-5 rounded-full"
                                            style="accent-color:var(--primary-dark);"></label>
                                </div>
                                <div><label class="block text-sm font-medium mb-2">Comissão da Plataforma
                                        (%)</label><input type="number" value="10"
                                        class="form-input w-32 px-3 py-2 rounded-lg"></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <h3 class="text-lg font-semibold mb-4">E-mails e Notificações</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium">E-mail de Boas-vindas</p>
                                    </div><label class="toggle-switch"><input type="checkbox" checked
                                            class="w-10 h-5 rounded-full"
                                            style="accent-color:var(--primary-dark);"></label>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium">Notificações de Novos Trabalhos</p>
                                    </div><label class="toggle-switch"><input type="checkbox" checked
                                            class="w-10 h-5 rounded-full"
                                            style="accent-color:var(--primary-dark);"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL DE USUÁRIO -->
    <div id="userModal" class="modal fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background:var(--primary-light);"><i class="fas fa-user-plus text-2xl"
                        style="color:var(--primary-dark);"></i></div>
                <h3 class="text-xl font-bold text-gray-800">Adicionar Usuário</h3>
            </div>
            <div class="space-y-4"><input type="text" placeholder="Nome completo"
                    class="form-input w-full px-4 py-2.5 rounded-lg"><input type="email" placeholder="E-mail"
                    class="form-input w-full px-4 py-2.5 rounded-lg"><select
                    class="form-input w-full px-4 py-2.5 rounded-lg">
                    <option>Tipo de usuário</option>
                    <option>Freelancer</option>
                    <option>Empresa</option>
                </select><input type="password" placeholder="Senha" class="form-input w-full px-4 py-2.5 rounded-lg">
            </div>
            <div class="flex gap-3 mt-6"><button onclick="closeModal('userModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700">Cancelar</button><button
                    onclick="closeModal('userModal')" class="flex-1 px-4 py-2 rounded-lg text-white"
                    style="background:var(--primary-dark);">Salvar</button></div>
        </div>
    </div>

    <script>
        // Navegação entre páginas
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        const pages = {
            dashboard: document.getElementById('dashboardPage'),
            usuarios: document.getElementById('usuariosPage'),
            trabalhos: document.getElementById('trabalhosPage'),
            categorias: document.getElementById('categoriasPage'),
            empresas: document.getElementById('usuariosPage'),
            freelancers: document.getElementById('usuariosPage'),
            transacoes: document.getElementById('dashboardPage'),
            denuncias: document.getElementById('dashboardPage'),
            configuracoes: document.getElementById('configuracoesPage')
        };

        sidebarItems.forEach(item => {
            item.addEventListener('click', function() {
                const page = this.getAttribute('data-page');
                sidebarItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                Object.keys(pages).forEach(key => {
                    if (pages[key]) pages[key].classList.add('hidden');
                });
                if (pages[page]) pages[page].classList.remove('hidden');
                document.getElementById('pageTitle').innerText = this.querySelector('span:first-of-type')
                    .innerText;
            });
        });

        // Modal functions
        function openUserModal() {
            document.getElementById('userModal').classList.remove('hidden');
            document.getElementById('userModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function openJobModal() {
            alert('Abrir modal de novo trabalho');
        }

        function openCategoryModal() {
            alert('Abrir modal de nova categoria');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function() {
                this.parentElement.classList.add('hidden');
                this.parentElement.classList.remove('flex');
                document.body.style.overflow = 'auto';
            });
        });

        // Data atual
        document.getElementById('currentDate').innerText = new Date().toLocaleDateString('pt-BR', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        // Gráficos
        new Chart(document.getElementById('usersChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Usuários',
                    data: [45, 62, 78, 95, 112, 128],
                    borderColor: '#6A2698',
                    backgroundColor: 'rgba(106,38,152,0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        new Chart(document.getElementById('jobsChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Trabalhos',
                    data: [12, 18, 22, 28, 35, 42],
                    backgroundColor: '#6A2698',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>

</html>
