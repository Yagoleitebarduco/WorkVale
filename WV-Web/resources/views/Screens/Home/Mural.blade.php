<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Mural de Oportunidades</title>
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
            --bg-light: #F8F9FA;
            --text-dark: #343A40;
            --text-gray: #6c757d;
            --white: #FFFFFF;
            --border-color: #e5e7eb;
        }

        .filter-chip {
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .filter-chip:hover {
            border-color: var(--primary-dark);
            background: var(--primary-light);
        }

        .filter-chip.active {
            background: var(--primary-dark);
            color: white;
            border-color: var(--primary-dark);
        }

        .opportunity-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeInUp 0.4s ease-out forwards;
        }

        .opportunity-card:hover {
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

        .badge-urgent {
            background: rgba(255, 107, 107, 0.1);
            color: var(--accent-red);
        }

        .badge-remote {
            background: rgba(110, 203, 99, 0.1);
            color: var(--accent-green);
        }

        .search-input {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(106, 38, 152, 0.1);
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .save-btn {
            transition: all 0.2s ease;
        }

        .save-btn.saved {
            color: var(--accent-red);
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
                    <h1 class="text-2xl font-bold text-gray-800">Mural de Oportunidades</h1>
                </div>
                <div class="relative">
                    <button id="filterModalBtn"
                        class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                    <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full"
                        style="background: var(--primary-dark);"></span>
                </div>
            </div>
            <p class="text-sm text-gray-500">Encontre as melhores oportunidades para você</p>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="searchInput" class="search-input w-full pl-12 pr-4 py-3 rounded-xl bg-white"
                    placeholder="Buscar por título, empresa ou localização...">
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-6 overflow-x-auto whitespace-nowrap pb-2 scrollbar-hide">
            <div class="flex gap-2">
                <span
                    class="filter-chip active px-4 py-2 rounded-full text-sm font-medium bg-primary-dark text-white">Todas</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Tecnologia</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Design</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Marketing</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Remoto</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Presencial</span>
                <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Alta Demanda</span>
            </div>
        </div>

        <!-- Results Count -->
        <div class="flex justify-between items-center mb-4">
            <p class="text-sm text-gray-500"><span id="resultsCount">12</span> oportunidades encontradas</p>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Ordenar por:</span>
                <select class="text-sm border-none bg-transparent font-medium" style="color: var(--primary-dark);">
                    <option>Mais recentes</option>
                    <option>Maior valor</option>
                    <option>Menor valor</option>
                    <option>Mais relevantes</option>
                </select>
            </div>
        </div>

        <!-- Opportunities List -->
        <div id="opportunitiesList" class="space-y-4">
            <!-- Card 1 - Urgente -->
            <div class="opportunity-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="badge-urgent text-xs font-medium px-2 py-1 rounded-full">🔥 Urgente</span>
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full">💻 Remoto</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvedor Full Stack</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> TechSolutions Ltda
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Remoto</span>
                            <span><i class="far fa-calendar-alt mr-1"></i> Publicado há 2h</span>
                            <span><i class="fas fa-users mr-1"></i> 12 candidatos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 3.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                    <button
                        class="save-btn w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 transition">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);">
                        Candidatar-se
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="opportunity-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full">🎨 Design</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">UI/UX Designer</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Creative Agency
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Híbrido - SP</span>
                            <span><i class="far fa-calendar-alt mr-1"></i> Publicado há 5h</span>
                            <span><i class="fas fa-users mr-1"></i> 8 candidatos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 2.800</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                    <button
                        class="save-btn w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 transition">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);">
                        Candidatar-se
                    </button>
                </div>
            </div>

            <!-- Card 3 - Alta Demanda -->
            <div class="opportunity-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">⭐ Alta Demanda</span>
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full">📊 Marketing</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Especialista em Marketing Digital</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Digital Growth
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Remoto</span>
                            <span><i class="far fa-calendar-alt mr-1"></i> Publicado há 1d</span>
                            <span><i class="fas fa-users mr-1"></i> 25 candidatos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 4.200</span>
                            <span class="text-xs text-gray-500">/mês</span>
                        </div>
                    </div>
                    <button
                        class="save-btn w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 transition">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);">
                        Candidatar-se
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="opportunity-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full">💻
                                Desenvolvimento</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvedor Mobile React Native</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> AppMaster
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Presencial - Registro/SP</span>
                            <span><i class="far fa-calendar-alt mr-1"></i> Publicado há 2d</span>
                            <span><i class="fas fa-users mr-1"></i> 5 candidatos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 5.000</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                    <button
                        class="save-btn w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 transition">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);">
                        Candidatar-se
                    </button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="opportunity-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="badge-remote text-xs font-medium px-2 py-1 rounded-full">✍️ Conteúdo</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Redator de Conteúdo SEO</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Content House
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-map-marker-alt mr-1"></i> Remoto</span>
                            <span><i class="far fa-calendar-alt mr-1"></i> Publicado há 3d</span>
                            <span><i class="fas fa-users mr-1"></i> 18 candidatos</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 1.800</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                    <button
                        class="save-btn w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 transition">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);">
                        Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);">
                        Candidatar-se
                    </button>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-6">
            <button class="px-6 py-2 rounded-lg text-sm font-medium transition"
                style="background: var(--primary-light); color: var(--primary-dark);">
                Carregar mais oportunidades
                <i class="fas fa-chevron-down ml-2"></i>
            </button>
        </div>

        <!-- Bottom Navigation -->
        <div class="fixed bottom-0 left-0 right-0 max-w-2xl mx-auto bg-white border-t border-gray-200 rounded-t-2xl shadow-lg px-4 py-2 flex justify-around items-center"
            style="margin: 0 auto;">
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs mt-1">Início</span>
            </a>
            <a href="#" class="flex flex-col items-center" style="color: var(--primary-dark);">
                <i class="fas fa-chart-line text-xl"></i>
                <span class="text-xs mt-1 font-medium">Mural</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-briefcase text-xl"></i>
                <span class="text-xs mt-1">Meus Jobs</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-primary-dark transition">
                <i class="fas fa-wallet text-xl"></i>
                <span class="text-xs mt-1">Carteira</span>
            </a>
        </div>
    </div>

    <!-- Filter Modal -->
    <div id="filterModal" class="fixed inset-0 z-50 hidden items-end justify-center">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-t-2xl max-w-2xl w-full p-6 max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Filtros Avançados</h3>
                <button id="closeFilterModal"
                    class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-times text-gray-500"></i>
                </button>
            </div>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Faixa de Preço</label>
                    <div class="flex gap-4">
                        <input type="number" placeholder="Mínimo"
                            class="flex-1 px-3 py-2 rounded-lg border border-gray-200">
                        <input type="number" placeholder="Máximo"
                            class="flex-1 px-3 py-2 rounded-lg border border-gray-200">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Contrato</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded" style="accent-color: var(--primary-dark);">
                            Projeto
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded" style="accent-color: var(--primary-dark);"> Mensal
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded" style="accent-color: var(--primary-dark);">
                            Horista
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Localização</label>
                    <select class="w-full px-3 py-2 rounded-lg border border-gray-200">
                        <option>Todas as cidades</option>
                        <option>Registro/SP</option>
                        <option>Remoto</option>
                        <option>Híbrido</option>
                    </select>
                </div>

                <div class="flex gap-3 pt-4">
                    <button class="flex-1 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Limpar
                        Filtros</button>
                    <button class="flex-1 py-2 rounded-lg text-white font-medium"
                        style="background: var(--primary-dark);">Aplicar Filtros</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Filter chips
        const filterChips = document.querySelectorAll('.filter-chip');
        filterChips.forEach(chip => {
            chip.addEventListener('click', function() {
                filterChips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                // Simular filtragem
                console.log('Filtrando por:', this.innerText);
            });
        });

        // Save buttons (favoritos)
        const saveBtns = document.querySelectorAll('.save-btn');
        saveBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.classList.add('saved');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.classList.remove('saved');
                }
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const opportunities = document.querySelectorAll('.opportunity-card');
        const resultsCount = document.getElementById('resultsCount');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;

            opportunities.forEach(card => {
                const title = card.querySelector('h3').innerText.toLowerCase();
                const company = card.querySelector('.text-gray-500.mb-2').innerText.toLowerCase();

                if (title.includes(searchTerm) || company.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            resultsCount.innerText = visibleCount;
        });

        // Filter Modal
        const filterModalBtn = document.getElementById('filterModalBtn');
        const filterModal = document.getElementById('filterModal');
        const closeFilterModal = document.getElementById('closeFilterModal');

        filterModalBtn.addEventListener('click', () => {
            filterModal.classList.remove('hidden');
            filterModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });

        function closeModal() {
            filterModal.classList.add('hidden');
            filterModal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        closeFilterModal.addEventListener('click', closeModal);
        filterModal.querySelector('.modal-overlay').addEventListener('click', closeModal);

        // Back button
        const backButton = document.querySelector('.fa-arrow-left').parentElement;
        backButton.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Voltando para página anterior...');
        });

        // Order select
        const orderSelect = document.querySelector('select');
        orderSelect.addEventListener('change', function() {
            console.log('Ordenar por:', this.value);
        });

        // Load more button
        const loadMoreBtn = document.querySelector('.text-center button');
        loadMoreBtn.addEventListener('click', () => {
            alert('Carregando mais oportunidades...');
        });

        // Candidatar-se buttons
        const applyBtns = document.querySelectorAll('.opportunity-card button:last-child');
        applyBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                alert('Iniciando processo de candidatura...');
            });
        });

        // Ver detalhes buttons
        const detailBtns = document.querySelectorAll('.opportunity-card button:first-child');
        detailBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                alert('Abrindo detalhes da oportunidade...');
            });
        });
    </script>
</body>

</html>
