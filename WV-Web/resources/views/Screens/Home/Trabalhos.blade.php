<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Meus Trabalhos</title>
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

        .work-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInUp 0.4s ease-out forwards;
        }

        .work-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(106, 38, 152, 0.12);
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

        .status-badge {
            transition: all 0.2s ease;
        }

        .progress-bar {
            transition: width 0.5s ease;
        }

        .tab-btn {
            transition: all 0.2s ease;
        }

        .tab-btn.active {
            background: var(--primary-dark);
            color: white;
        }

        .empty-state {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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

        .rating-star {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .rating-star:hover {
            transform: scale(1.1);
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
                    <h1 class="text-2xl font-bold text-gray-800">Meus Trabalhos</h1>
                </div>
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center"
                        style="color: var(--primary-dark);">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
            </div>
            <p class="text-sm text-gray-500">Gerencie todos os seus trabalhos em andamento e concluídos</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-clock text-xl" style="color: var(--accent-yellow);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="emAndamentoCount">3</p>
                <p class="text-xs text-gray-500">Em andamento</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-check-circle text-xl" style="color: var(--accent-green);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="concluidosCount">2</p>
                <p class="text-xs text-gray-500">Concluídos</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-chart-line text-xl" style="color: var(--primary-dark);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="totalGanhos">R$ 8.500</p>
                <p class="text-xs text-gray-500">Total ganho</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6 bg-white p-1 rounded-xl shadow-sm border border-gray-100">
            <button class="tab-btn active flex-1 py-2.5 rounded-lg font-medium transition text-gray-600"
                data-tab="andamento">
                <i class="fas fa-play-circle mr-2"></i> Em andamento
            </button>
            <button class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition text-gray-600" data-tab="concluidos">
                <i class="fas fa-check-circle mr-2"></i> Concluídos
            </button>
        </div>

        <!-- Trabalhos em Andamento -->
        <div id="andamentoTab" class="tab-content space-y-4">

            <!-- Card 1 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 5 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvimento de E-commerce</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> TechSolutions Ltda
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 01/04/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 10/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">60%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 60%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 3.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>

            <!-- Card 2 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 2 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Design de Interface Mobile</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Creative Agency
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 03/04/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 07/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">30%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 30%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 2.800</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>

            <!-- Card 3 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 8 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Marketing Digital para Startup</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Digital Growth
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 28/03/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 12/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 80%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 4.200</span>
                            <span class="text-xs text-gray-500">/mês</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>
        </div>

        <!-- Trabalhos Concluídos (inicialmente escondido) -->
        <div id="concluidosTab" class="tab-content space-y-4 hidden">

            <!-- Card 1 - Concluído -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="concluido">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">
                                <i class="fas fa-check-circle mr-1"></i> Concluído
                            </span>
                            <span class="text-xs text-gray-400">Entregue em: 30/03/2024</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Landing Page para Cliente</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> WebDesign Pro
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-star text-yellow-400 mr-1"></i> Avaliação: 4.8</span>
                            <span><i class="fas fa-clock mr-1"></i> Entregue antes do prazo</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--accent-green);">R$ 1.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="viewWorkDetails(this)">
                        <i class="fas fa-eye mr-1"></i> Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--accent-green); color: white;" onclick="openRatingModal(this)">
                        <i class="fas fa-star mr-1"></i> Avaliar cliente
                    </button>
                </div>
            </div>

            <!-- Card 2 - Concluído -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="concluido">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">
                                <i class="fas fa-check-circle mr-1"></i> Concluído
                            </span>
                            <span class="text-xs text-gray-400">Entregue em: 25/03/2024</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvimento de API REST</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Backend Solutions
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-star text-yellow-400 mr-1"></i> Avaliação: 5.0</span>
                            <span><i class="fas fa-clock mr-1"></i> Entregue no prazo</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--accent-green);">R$ 2.200</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="viewWorkDetails(this)">
                        <i class="fas fa-eye mr-1"></i> Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--accent-green); color: white;" onclick="openRatingModal(this)">
                        <i class="fas fa-star mr-1"></i> Avaliar cliente
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State (caso não tenha trabalhos) -->
        <div id="emptyState" class="empty-state hidden text-center py-12">
            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-briefcase text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Nenhum trabalho ainda</h3>
            <p class="text-sm text-gray-500 mb-4">Você ainda não pegou nenhum trabalho</p>
            <button class="px-6 py-2 rounded-lg text-white font-medium" style="background: var(--primary-dark);">
                Explorar oportunidades
            </button>
        </div>
    </div>

    <!-- Modal de Atualizar Progresso -->
    <div id="progressModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--primary-light);">
                    <i class="fas fa-chart-line text-2xl" style="color: var(--primary-dark);"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Atualizar Progresso</h3>
                <p class="text-sm text-gray-500 mt-1">Atualize o andamento do seu trabalho</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Progresso atual</label>
                <input type="range" min="0" max="100" value="60" class="w-full"
                    style="accent-color: var(--primary-dark);" id="progressSlider">
                <div class="text-center mt-2">
                    <span class="text-2xl font-bold" style="color: var(--primary-dark);" id="progressValue">60</span>
                    <span class="text-gray-600">%</span>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Comentários (opcional)</label>
                <textarea rows="3"
                    class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark"
                    placeholder="Adicione uma observação sobre o progresso..."></textarea>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('progressModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="updateProgress()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--primary-dark);">Atualizar</button>
            </div>
        </div>
    </div>

    <!-- Modal de Entregar Trabalho -->
    <div id="deliveryModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--accent-green); background-opacity: 0.1;">
                    <i class="fas fa-paper-plane text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Entregar Trabalho</h3>
                <p class="text-sm text-gray-500 mt-1">Envie o link ou arquivo do trabalho concluído</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Link do trabalho</label>
                <input type="url" class="w-full px-3 py-2 rounded-lg border border-gray-200"
                    placeholder="https://..." id="workLink">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ou envie um arquivo</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-500">Clique para enviar ou arraste</p>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Mensagem para o cliente</label>
                <textarea rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-200"
                    placeholder="Adicione uma mensagem sobre o trabalho entregue..."></textarea>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('deliveryModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="confirmDelivery()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--accent-green);">Entregar</button>
            </div>
        </div>
    </div>

    <!-- Modal de Avaliar Cliente -->
    <div id="ratingModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--accent-yellow); background-opacity: 0.1;">
                    <i class="fas fa-star text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Avaliar Cliente</h3>
                <p class="text-sm text-gray-500 mt-1">Compartilhe sua experiência com este cliente</p>
            </div>
            <div class="mb-4 text-center">
                <label class="block text-sm font-medium text-gray-700 mb-2">Sua avaliação</label>
                <div class="flex justify-center gap-2">
                    <i class="fas fa-star rating-star text-2xl" style="color: #d1d5db;" data-rating="1"></i>
                    <i class="fas fa-star rating-star text-2xl" style="color: #d1d5db;" data-rating="2"></i>
                    <i class="fas fa-star rating-star text-2xl" style="color: #d1d5db;" data-rating="3"></i>
                    <i class="fas fa-star rating-star text-2xl" style="color: #d1d5db;" data-rating="4"></i>
                    <i class="fas fa-star rating-star text-2xl" style="color: #d1d5db;" data-rating="5"></i>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Comentário</label>
                <textarea rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-200"
                    placeholder="Conte como foi trabalhar com este cliente..."></textarea>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('ratingModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Pular</button>
                <button onclick="submitRating()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--accent-yellow);">Enviar avaliação</button>
            </div>
        </div>
    </div>

    <script>
        // Tabs
        const tabs = document.querySelectorAll('.tab-btn');
        const andamentoTab = document.getElementById('andamentoTab');
        const concluidosTab = document.getElementById('concluidosTab');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');

                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Show/hide content
                if (tabId === 'andamento') {
                    andamentoTab.classList.remove('hidden');
                    concluidosTab.classList.add('hidden');
                } else {
                    andamentoTab.classList.add('hidden');
                    concluidosTab.classList.remove('hidden');
                }
            });
        });

        // Modal functions
        let currentWorkCard = null;

        function openProgressModal(button) {
            currentWorkCard = button.closest('.work-card');
            const progressBar = currentWorkCard.querySelector('.progress-bar');
            const currentProgress = parseInt(progressBar.style.width);
            const slider = document.getElementById('progressSlider');
            const progressValue = document.getElementById('progressValue');

            slider.value = currentProgress;
            progressValue.textContent = currentProgress;

            document.getElementById('progressModal').classList.remove('hidden');
            document.getElementById('progressModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function updateProgress() {
            const slider = document.getElementById('progressSlider');
            const newProgress = slider.value;
            const progressBar = currentWorkCard.querySelector('.progress-bar');
            const progressText = currentWorkCard.querySelector('.flex.justify-between.text-xs .font-medium');

            progressBar.style.width = newProgress + '%';
            progressText.textContent = newProgress + '%';

            closeModal('progressModal');
            alert('Progresso atualizado com sucesso!');
        }

        function openDeliveryModal(button) {
            currentWorkCard = button.closest('.work-card');
            document.getElementById('deliveryModal').classList.remove('hidden');
            document.getElementById('deliveryModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function confirmDelivery() {
            const workLink = document.getElementById('workLink').value;
            if (!workLink) {
                alert('Por favor, insira o link do trabalho');
                return;
            }

            // Mover card para concluídos
            const workTitle = currentWorkCard.querySelector('h3').innerText;
            currentWorkCard.remove();

            // Atualizar contadores
            updateCounters();

            closeModal('deliveryModal');
            alert(`Trabalho "${workTitle}" entregue com sucesso! O cliente será notificado.`);

            // Reset form
            document.getElementById('workLink').value = '';
        }

        function openRatingModal(button) {
            currentWorkCard = button.closest('.work-card');
            document.getElementById('ratingModal').classList.remove('hidden');
            document.getElementById('ratingModal').classList.add('flex');
            document.body.style.overflow = 'hidden';

            // Reset stars
            const stars = document.querySelectorAll('#ratingModal .rating-star');
            stars.forEach(star => {
                star.style.color = '#d1d5db';
            });
        }

        function submitRating() {
            const selectedRating = document.querySelector('#ratingModal .rating-star[style*="color: rgb(255, 193, 7)"]');
            if (!selectedRating) {
                alert('Por favor, selecione uma avaliação');
                return;
            }

            closeModal('ratingModal');
            alert('Avaliação enviada com sucesso! Obrigado pelo feedback.');
        }

        function viewWorkDetails(button) {
            const workTitle = button.closest('.work-card').querySelector('h3').innerText;
            alert(`Abrindo detalhes do trabalho: ${workTitle}`);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Update counters
        function updateCounters() {
            const andamentoCards = document.querySelectorAll('#andamentoTab .work-card').length;
            const concluidosCards = document.querySelectorAll('#concluidosTab .work-card').length;

            document.getElementById('emAndamentoCount').textContent = andamentoCards;
            document.getElementById('concluidosCount').textContent = concluidosCards;

            // Calculate total earnings
            let total = 0;
            document.querySelectorAll('#concluidosTab .work-card .text-2xl').forEach(el => {
                const value = parseFloat(el.innerText.replace('R$', '').replace('.', '').replace(',', '.'));
                total += value;
            });
            document.getElementById('totalGanhos').innerText = `R$ ${total.toLocaleString('pt-BR')}`;
        }

        // Progress slider
        const slider = document.getElementById('progressSlider');
        if (slider) {
            slider.addEventListener('input', function() {
                document.getElementById('progressValue').textContent = this.value;
            });
        }

        // Rating stars
        const ratingStars = document.querySelectorAll('#ratingModal .rating-star');
        ratingStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                ratingStars.forEach((s, index) => {
                    if (index < rating) {
                        s.style.color = '#FFC107';
                    } else {
                        s.style.color = '#d1d5db';
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

        // File upload simulation
        const uploadArea = document.querySelector('.border-dashed');
        if (uploadArea) {
            uploadArea.addEventListener('click', () => {
                alert('Selecione um arquivo para enviar');
            });
        }

        // Initialize counters
        updateCounters();
    </script>
</body>

</html>
