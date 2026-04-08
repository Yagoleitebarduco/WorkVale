<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Carteira - WorkVale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom smooth transitions */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:active {
            transform: scale(0.98);
        }

        /* Gráfico simples estilo mobile */
        .chart-bar {
            transition: height 0.5s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen">

    <div class="max-w-md mx-auto px-4 py-6 pb-20">

        <!-- Cabeçalho -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-bold text-gray-900">Carteira</h1>
                <div class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center">
                    <i class="fas fa-user text-gray-600 text-lg"></i>
                </div>
            </div>
            <p class="text-gray-500 text-sm">Gerencie seus ganhos e pagamentos</p>
        </div>

        <!-- Cards de Saldo e Serviços -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <!-- Saldo a Receber -->
            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                <div class="flex items-start justify-between mb-2">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-wallet text-green-600 text-sm"></i>
                    </div>
                    <i class="fas fa-ellipsis-h text-gray-400 text-xs"></i>
                </div>
                <p class="text-xs text-gray-500 mb-1">Saldo a Receber</p>
                <p class="text-xl font-bold text-gray-900">R$ 5.850,00</p>
                <div class="mt-2 flex items-center gap-1">
                    <i class="fas fa-arrow-up text-green-500 text-xs"></i>
                    <span class="text-xs text-green-600">+12% este mês</span>
                </div>
            </div>

            <!-- Serviços Realizados -->
            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                <div class="flex items-start justify-between mb-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-briefcase text-blue-600 text-sm"></i>
                    </div>
                    <i class="fas fa-ellipsis-h text-gray-400 text-xs"></i>
                </div>
                <p class="text-xs text-gray-500 mb-1">Serviços Realizados</p>
                <p class="text-xl font-bold text-gray-900">24</p>
                <div class="mt-2 flex items-center gap-1">
                    <i class="fas fa-calendar-check text-blue-500 text-xs"></i>
                    <span class="text-xs text-gray-500">últimos 30 dias</span>
                </div>
            </div>
        </div>

        <!-- Seção PIX -->
        <div class="bg-white rounded-xl shadow-sm mb-6 overflow-hidden">
            <div class="px-4 pt-4 pb-2 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fab fa-pix text-purple-600 text-sm"></i>
                        </div>
                        <h2 class="text-base font-semibold text-gray-900">Gerenciamento PIX</h2>
                    </div>
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Recomendado</span>
                </div>
            </div>

            <div class="p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-medium text-gray-700">Chave PIX Cadastrada</h3>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-check-circle text-green-500 text-xs"></i>
                        <span class="text-xs font-medium text-green-600">Verificada</span>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-3 space-y-2 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">Tipo</span>
                        <span class="text-sm font-medium text-gray-800">CPF</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">Chave</span>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-mono text-gray-800">123.456.789-00</span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-copy text-xs"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">Banco</span>
                        <span class="text-sm font-medium text-gray-800">Banco WorkVale</span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button
                        class="flex-1 bg-gray-100 text-gray-700 text-sm font-medium py-2 rounded-lg hover:bg-gray-200 transition flex items-center justify-center gap-2">
                        <i class="fas fa-edit text-xs"></i>
                        Editar
                    </button>
                    <button
                        class="flex-1 bg-purple-600 text-white text-sm font-medium py-2 rounded-lg hover:bg-purple-700 transition flex items-center justify-center gap-2">
                        <i class="fas fa-copy text-xs"></i>
                        Copiar Chave
                    </button>
                </div>
            </div>
        </div>

        <!-- Desempenho Mensal -->
        <div class="bg-white rounded-xl shadow-sm mb-6">
            <div class="px-4 pt-4 pb-2">
                <div class="flex items-center justify-between mb-1">
                    <h2 class="text-base font-semibold text-gray-900">Desempenho Mensal</h2>
                    <div class="flex items-center gap-1 text-xs text-gray-500">
                        <i class="fas fa-chart-line text-xs"></i>
                        <span>Últimos 6 meses</span>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Trabalhos Realizados por Mês</p>
            </div>

            <div class="p-4 pt-2">
                <!-- Gráfico de barras simples -->
                <div class="flex items-end justify-between gap-2 h-48">
                    <!-- Mês 1: Setembro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-100 rounded-t-lg chart-bar" style="height: 48px"></div>
                        <span class="text-xs text-gray-600 font-medium">Set</span>
                        <span class="text-[11px] text-gray-400">4 jobs</span>
                    </div>
                    <!-- Mês 2: Outubro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-200 rounded-t-lg chart-bar" style="height: 72px"></div>
                        <span class="text-xs text-gray-600 font-medium">Out</span>
                        <span class="text-[11px] text-gray-400">6 jobs</span>
                    </div>
                    <!-- Mês 3: Novembro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-300 rounded-t-lg chart-bar" style="height: 96px"></div>
                        <span class="text-xs text-gray-600 font-medium">Nov</span>
                        <span class="text-[11px] text-gray-400">8 jobs</span>
                    </div>
                    <!-- Mês 4: Dezembro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-400 rounded-t-lg chart-bar" style="height: 120px"></div>
                        <span class="text-xs text-gray-600 font-medium">Dez</span>
                        <span class="text-[11px] text-gray-400">10 jobs</span>
                    </div>
                    <!-- Mês 5: Janeiro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-500 rounded-t-lg chart-bar" style="height: 84px"></div>
                        <span class="text-xs text-gray-600 font-medium">Jan</span>
                        <span class="text-[11px] text-gray-400">7 jobs</span>
                    </div>
                    <!-- Mês 6: Fevereiro -->
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="w-full bg-purple-600 rounded-t-lg chart-bar" style="height: 108px"></div>
                        <span class="text-xs text-gray-600 font-medium">Fev</span>
                        <span class="text-[11px] text-gray-400">9 jobs</span>
                    </div>
                </div>

                <!-- Linha de tendência (opcional) -->
                <div class="mt-4 pt-3 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-xs text-gray-500">Média mensal: 7,3 jobs</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-trend-up text-green-500 text-xs"></i>
                            <span class="text-xs text-green-600">+25% vs último semestre</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dicas rápidas (extra para mobile) -->
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-4">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 bg-purple-200 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-lightbulb text-purple-600 text-sm"></i>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-800 mb-1">Dica WorkVale</h4>
                    <p class="text-xs text-gray-600">Mantenha sua chave PIX sempre atualizada para receber pagamentos
                        mais rápido.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Script para cópia da chave -->
    <script>
        document.querySelectorAll('.fa-copy, button:has(.fa-copy)').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const chave = '123.456.789-00';
                navigator.clipboard.writeText(chave).then(() => {
                    // Feedback visual simples
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check text-xs"></i> Copiado!';
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                    }, 2000);
                });
            });
        });
    </script>

</body>

</html>
