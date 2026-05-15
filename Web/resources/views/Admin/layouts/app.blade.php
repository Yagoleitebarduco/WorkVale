<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Painel Administrativo</title>
    <!-- TailwindCSS CDN + Font Awesome + Chart.js -->
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-Light">
    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR -->
        <aside class="w-72 shadow-lg border-r border-gray-100 flex flex-col bg-linear-to-t from-Primary-dark to-Primary">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center gap-2 text-white">
                    <div>
                        <h1 class="text-xl font-bold">Work<span class="text-Secondary">Vale</span></h1>
                        <p class="text-xs">Painel Administrativo</p>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 space-y-1 text-white">
                <div class="sidebar-item active p-3 rounded-xl flex items-center gap-3" data-page="dashboard">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </div>

                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="usuarios">
                    <i class="fas fa-users w-5"></i>
                    <span class="font-medium">Usuários</span>
                </div>

                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="trabalhos">
                    <i class="fas fa-briefcase w-5"></i>
                    <span class="font-medium">Trabalhos</span>
                </div>

                <div class="sidebar-item p-3 rounded-xl flex items-center gap-3" data-page="categorias">
                    <i class="fas fa-tags w-5"></i>
                    <span class="font-medium">Categorias</span>
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
