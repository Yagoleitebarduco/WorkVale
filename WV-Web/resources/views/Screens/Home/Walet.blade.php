<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Carteira</title>
    <!-- TailwindCSS CDN + Font Awesome + Chart.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .balance-card {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            transition: all 0.3s ease;
        }

        .transaction-item {
            transition: all 0.2s ease;
        }

        .transaction-item:hover {
            background: var(--bg-light);
            transform: translateX(4px);
        }

        .withdraw-btn {
            transition: all 0.2s ease;
        }

        .withdraw-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(106, 38, 152, 0.3);
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

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        .pix-card {
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .pix-card:hover {
            border-color: var(--primary-dark);
            box-shadow: 0 4px 12px rgba(106, 38, 152, 0.1);
        }

        .copy-btn {
            transition: all 0.2s ease;
        }

        .copy-btn:hover {
            background: var(--primary-light);
            transform: scale(1.05);
        }

        /* Estilos para o gráfico */
        canvas {
            max-height: 250px;
            width: 100%;
        }
    </style>
</head>

<body style="background: var(--bg-light); font-family: 'Inter', sans-serif;">

    <div class="max-w-2xl mx-auto px-4 py-6 pb-24">

        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-gray-800">Carteira</h1>
                </div>
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center"
                        style="color: var(--primary-dark);">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <p class="text-sm text-gray-500">Gerencie seus ganhos e pagamentos</p>
        </div>

        <!-- Balance Card -->
        <div class="balance-card rounded-2xl p-6 mb-6 text-white shadow-lg">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm opacity-90 mb-1">Saldo disponível</p>
                    <p class="text-3xl font-bold" id="saldoDisponivel">R$ 5.850,00</p>
                </div>
                <div class="bg-white/20 rounded-full p-2">
                    <i class="fas fa-credit-card text-xl"></i>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs opacity-80 mb-1">Saldo a Receber</p>
                    <p class="text-lg font-semibold" id="saldoReceber">R$ 2.450,00</p>
                </div>
                <div>
                    <p class="text-xs opacity-80 mb-1">Total Ganho</p>
                    <p class="text-lg font-semibold" id="totalGanho">R$ 8.300,00</p>
                </div>
            </div>
        </div>

        <!-- Ações Rápidas -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <button onclick="openWithdrawModal()" class="withdraw-btn py-3 rounded-xl text-white font-semibold"
                style="background: var(--accent-green);">
                <i class="fas fa-money-bill-wave mr-2"></i> Sacar dinheiro
            </button>
            <button onclick="openPixModal()" class="withdraw-btn py-3 rounded-xl font-semibold"
                style="background: var(--white); color: var(--primary-dark); border: 1px solid var(--border-color);">
                <i class="fas fa-pix mr-2"></i> Gerenciar PIX
            </button>
        </div>

        <!-- Gráfico de Desempenho Mensal -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-6">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">Desempenho Mensal</h3>
                    <p class="text-xs text-gray-500">Últimos 6 meses</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full" style="background: var(--primary-dark);"></span>
                    <span class="text-xs text-gray-600">Ganhos</span>
                </div>
            </div>
            <canvas id="earningsChart" width="400" height="200"></canvas>
        </div>

        <!-- Chave PIX Cadastrada -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-6 pix-card">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">Chave PIX Cadastrada</h3>
                    <p class="text-xs text-green-600 mt-1">
                        <i class="fas fa-check-circle mr-1"></i> Verificada
                    </p>
                </div>
                <i class="fas fa-pix text-2xl" style="color: var(--primary-dark);"></i>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-sm text-gray-500">Tipo</span>
                    <span class="text-sm font-medium text-gray-800">CPF</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-sm text-gray-500">Chave</span>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-800" id="pixKey">123.456.789-00</span>
                        <button onclick="copyPixKey()" class="copy-btn text-xs px-2 py-1 rounded"
                            style="background: var(--primary-light); color: var(--primary-dark);">
                            <i class="far fa-copy"></i> Copiar
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-sm text-gray-500">Banco</span>
                    <span class="text-sm font-medium text-gray-800">Banco WorkVale</span>
                </div>
            </div>
            <button onclick="openPixModal()" class="w-full mt-4 py-2 rounded-lg text-sm font-medium transition"
                style="background: var(--primary-light); color: var(--primary-dark);">
                <i class="fas fa-edit mr-1"></i> Editar chave PIX
            </button>
        </div>

        <!-- Transações Recentes -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-800">Transações Recentes</h3>
                <a href="#" class="text-xs" style="color: var(--primary-dark);">Ver todas</a>
            </div>
            <div class="space-y-3">
                <!-- Transação 1 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto E-commerce • 02/04/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 1.500,00</p>
                    </div>
                </div>

                <!-- Transação 2 - Saque -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(255, 107, 107, 0.1);">
                            <i class="fas fa-arrow-up" style="color: var(--accent-red);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Saque realizado</p>
                            <p class="text-xs text-gray-500">PIX • 28/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-red);">-R$ 500,00</p>
                    </div>
                </div>

                <!-- Transação 3 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto Landing Page • 25/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 2.200,00</p>
                    </div>
                </div>

                <!-- Transação 4 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto API REST • 20/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 2.800,00</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="fixed bottom-0 left-0 right-0 max-w-2xl mx-auto bg-white border-t border-gray-200 rounded-t-2xl shadow-lg px-4 py-2 flex justify-around items-center"
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
                <i class="fas fa-wallet text-xl"></i>
                <span class="text-xs mt-1 font-medium">Carteira</span>
            </a>
        </div>
    </div>

    <!-- Modal de Saque -->
    <div id="withdrawModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--accent-green); background-opacity: 0.1;">
                    <i class="fas fa-money-bill-wave text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Sacar dinheiro</h3>
                <p class="text-sm text-gray-500 mt-1">O valor será transferido para sua conta</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Valor do saque</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                    <input type="number" id="withdrawAmount"
                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark"
                        placeholder="0,00" step="0.01">
                </div>
                <p class="text-xs text-gray-500 mt-1">Saldo disponível: <span id="modalSaldo">R$ 5.850,00</span></p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Chave PIX</label>
                <select
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
                    <option>123.456.789-00 (CPF)</option>
                    <option>maria.silva@email.com (E-mail)</option>
                </select>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('withdrawModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="confirmWithdraw()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--accent-green);">Confirmar saque</button>
            </div>
        </div>
    </div>

    <!-- Modal de Gerenciar PIX -->
    <div id="pixModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--primary-light);">
                    <i class="fab fa-pix text-2xl" style="color: var(--primary-dark);"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Gerenciar Chave PIX</h3>
                <p class="text-sm text-gray-500 mt-1">Cadastre ou altere sua chave PIX</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de chave</label>
                <select id="pixType"
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
                    <option value="cpf">CPF</option>
                    <option value="email">E-mail</option>
                    <option value="phone">Telefone</option>
                    <option value="random">Chave aleatória</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Chave</label>
                <input type="text" id="pixKeyInput"
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark"
                    placeholder="Digite sua chave PIX" value="123.456.789-00">
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('pixModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="savePixKey()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--primary-dark);">Salvar chave</button>
            </div>
        </div>
    </div>

    <script>
        // Dados do gráfico
        const ctx = document.getElementById('earningsChart').getContext('2d');
        const earningsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Out/23', 'Nov/23', 'Dez/23', 'Jan/24', 'Fev/24', 'Mar/24'],
                datasets: [{
                    label: 'Ganhos (R$)',
                    data: [1200, 2300, 1850, 3200, 2800, 4250],
                    borderColor: '#6A2698',
                    backgroundColor: 'rgba(106, 38, 152, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#6A2698',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `R$ ${context.raw.toLocaleString('pt-BR')}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'R$ ' + value.toLocaleString('pt-BR');
                            }
                        },
                        grid: {
                            color: '#e5e7eb'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Dados da carteira
        let saldoDisponivel = 5850;
        let saldoReceber = 2450;
        let totalGanho = 8300;

        // Atualizar saldos
        function updateBalances() {
            document.getElementById('saldoDisponivel').innerText = `R$ ${saldoDisponivel.toLocaleString('pt-BR')}`;
            document.getElementById('saldoReceber').innerText = `R$ ${saldoReceber.toLocaleString('pt-BR')}`;
            document.getElementById('totalGanho').innerText = `R$ ${totalGanho.toLocaleString('pt-BR')}`;
        }

        // Modal functions
        function openWithdrawModal() {
            document.getElementById('withdrawModal').classList.remove('hidden');
            document.getElementById('withdrawModal').classList.add('flex');
            document.getElementById('modalSaldo').innerText = `R$ ${saldoDisponivel.toLocaleString('pt-BR')}`;
            document.body.style.overflow = 'hidden';
        }

        function confirmWithdraw() {
            const amount = parseFloat(document.getElementById('withdrawAmount').value);

            if (!amount || amount <= 0) {
                alert('Por favor, insira um valor válido');
                return;
            }

            if (amount > saldoDisponivel) {
                alert('Saldo insuficiente para realizar o saque');
                return;
            }

            // Atualizar saldos
            saldoDisponivel -= amount;
            totalGanho -= amount;
            updateBalances();

            // Adicionar transação de saque
            addTransaction('Saque realizado', `PIX • ${new Date().toLocaleDateString('pt-BR')}`, -amount);

            closeModal('withdrawModal');
            alert(
                `Saque de R$ ${amount.toLocaleString('pt-BR')} realizado com sucesso! O valor será creditado em até 2 horas.`);
            document.getElementById('withdrawAmount').value = '';
        }

        function openPixModal() {
            document.getElementById('pixModal').classList.remove('hidden');
            document.getElementById('pixModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function savePixKey() {
            const pixType = document.getElementById('pixType').value;
            const pixKey = document.getElementById('pixKeyInput').value;

            if (!pixKey) {
                alert('Por favor, digite sua chave PIX');
                return;
            }

            // Atualizar chave PIX na interface
            document.getElementById('pixKey').innerText = pixKey;

            closeModal('pixModal');
            alert('Chave PIX atualizada com sucesso!');
        }

        function copyPixKey() {
            const pixKey = document.getElementById('pixKey').innerText;
            navigator.clipboard.writeText(pixKey);
            alert('Chave PIX copiada para a área de transferência!');
        }

        function addTransaction(title, date, amount) {
            const transactionsContainer = document.querySelector('.space-y-3');
            const isPositive = amount > 0;
            const amountText = isPositive ? `+R$ ${amount.toLocaleString('pt-BR')}` :
                `-R$ ${Math.abs(amount).toLocaleString('pt-BR')}`;
            const colorClass = isPositive ? 'var(--accent-green)' : 'var(--accent-red)';
            const iconClass = isPositive ? 'fa-arrow-down' : 'fa-arrow-up';
            const bgColor = isPositive ? 'rgba(110, 203, 99, 0.1)' : 'rgba(255, 107, 107, 0.1)';

            const newTransaction = `
        <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background: ${bgColor};">
              <i class="fas ${iconClass}" style="color: ${colorClass};"></i>
            </div>
            <div>
              <p class="font-medium text-gray-800">${title}</p>
              <p class="text-xs text-gray-500">${date}</p>
            </div>
          </div>
          <div>
            <p class="font-semibold" style="color: ${colorClass};">${amountText}</p>
          </div>
        </div>
      `;

            // Adicionar no início da lista
            transactionsContainer.insertAdjacentHTML('afterbegin', newTransaction);

            // Limitar a 5 transações visíveis
            const transactions = transactionsContainer.children;
            if (transactions.length > 5) {
                transactions[transactions.length - 1].remove();
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Fechar modais ao clicar no overlay
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function() {
                const modal = this.parentElement;
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            });
        });

        // Back button
        const backButton = document.querySelector('.fa-arrow-left').parentElement;
        backButton.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Voltando para página anterior...');
        });

        // Ver todas transações
        const viewAllLink = document.querySelector('.text-primary-dark');
        if (viewAllLink) {
            viewAllLink.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Abrindo histórico completo de transações...');
            });
        }

        // Inicializar
        updateBalances();
    </script>
</body>

</html>
