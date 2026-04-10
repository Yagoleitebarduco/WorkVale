<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Cadastro de Freelancer</title>
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

        .form-input,
        .form-select,
        .form-textarea {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(106, 38, 152, 0.1);
        }

        .category-chip {
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .category-chip:hover {
            border-color: var(--primary-dark);
            background: var(--primary-light);
        }

        .category-chip.selected {
            background: var(--primary-dark);
            color: white;
            border-color: var(--primary-dark);
        }

        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-indicator.active {
            background: var(--primary-dark);
            color: white;
        }

        .step-indicator.completed {
            background: var(--accent-green);
            color: white;
        }

        .btn-primary {
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(106, 38, 152, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        .info-tooltip {
            position: relative;
            cursor: help;
        }

        .info-tooltip:hover::after {
            content: attr(data-tip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--text-dark);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.7rem;
            white-space: nowrap;
            z-index: 10;
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

        .form-section {
            animation: fadeIn 0.4s ease-out forwards;
        }

        /* Custom checkbox */
        .checkbox-custom {
            width: 1.125rem;
            height: 1.125rem;
            border: 2px solid var(--border-color);
            border-radius: 0.25rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .checkbox-custom:checked {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
    </style>
</head>

<body style="background: linear-gradient(135deg, var(--bg-light) 0%, #f0eef3 100%); font-family: 'Inter', sans-serif;">

    <div class="max-w-2xl mx-auto px-4 py-6 pb-24">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block">
                <h1 class="text-3xl font-bold"
                    style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium)); -webkit-background-clip: text; background-clip: text; color: transparent;">
                    Work<span style="color: var(--primary-dark);">Vale</span>
                </h1>
            </div>
            <h2 class="text-xl font-semibold text-gray-800 mt-3">Cadastro de Freelancer</h2>
            <p class="text-sm text-gray-500 mt-1">Preencha seus dados para criar seu perfil</p>
        </div>

        <!-- Steps Indicator -->
        <div class="flex justify-between items-center mb-8 max-w-md mx-auto">
            <div
                class="step-indicator active w-8 h-8 rounded-full bg-primary-dark text-white flex items-center justify-center text-sm font-semibold">
                1</div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
            <div
                class="step-indicator w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">
                2</div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
            <div
                class="step-indicator w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">
                3</div>
        </div>

        <form id="registerForm" class="space-y-8">

            <!-- Seção 1: Dados Pessoais -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-user-circle" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Digite seu nome completo" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CPF <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="000.000.000-00" maxlength="14" required>
                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <i class="fas fa-shield-alt"></i> Essencial para segurança e evitar perfis falsos
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Data de Nascimento <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="dd/mm/aaaa" required>
                    </div>
                </div>
            </div>

            <!-- Seção 2: Contato -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-address-card" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Contato</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail <span class="text-red-500">*</span>
                        </label>
                        <input type="email" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="seu@email.com" required>
                        <p class="text-xs text-gray-400 mt-1">Será usado como login</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="(13) 99999-9999" required>
                    </div>
                </div>
            </div>

            <!-- Seção 3: Localização -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-map-marker-alt" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Localização</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade <span class="text-red-500">*</span>
                        </label>
                        <select class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white">
                            <option value="">Selecione sua cidade</option>
                            <option>Registro</option>
                            <option>Juquiá</option>
                            <option>Miracatu</option>
                            <option>Iguape</option>
                            <option>Cananéia</option>
                            <option>Ilha Comprida</option>
                            <option>Jacupiranga</option>
                            <option>Cajati</option>
                            <option>Pariquera-Açu</option>
                            <option>Eldorado</option>
                        </select>
                        <p class="text-xs text-gray-400 mt-1">25 municípios do Vale do Ribeira</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Bairro <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Digite seu bairro" required>
                    </div>
                </div>
            </div>

            <!-- Seção 4: Perfil Profissional -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-briefcase" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Perfil Profissional</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Título Profissional <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Ex: Eletricista, Designer, Redator" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Categorias de Atuação <span class="text-red-500">*</span>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="Manutenção">Manutenção</span>
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="TI">TI</span>
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="Eventos">Eventos</span>
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="Design">Design</span>
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="Marketing">Marketing</span>
                            <span class="category-chip px-3 py-1.5 rounded-full text-sm bg-gray-50"
                                data-category="Consultoria">Consultoria</span>
                        </div>
                        <input type="hidden" id="categories" name="categories">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link de Portfólio ou LinkedIn
                        </label>
                        <input type="url"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="https://seusite.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Breve Bio / Resumo de Experiência <span class="text-red-500">*</span>
                        </label>
                        <textarea rows="4" class="form-textarea w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white resize-none"
                            placeholder="Conte um pouco sobre sua experiência, habilidades e objetivos profissionais..." required></textarea>
                    </div>
                </div>
            </div>

            <!-- Termos e Condições -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="terms" class="checkbox-custom mt-0.5" required>
                    <label for="terms" class="text-sm text-gray-600">
                        Concordo com os <a href="#" class="text-primary-dark font-medium">Termos de Uso</a> e <a
                            href="#" class="text-primary-dark font-medium">Política de Privacidade</a>
                    </label>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-3 pt-4">
                <button type="button"
                    class="btn-secondary flex-1 px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                    Cancelar
                </button>
                <button type="submit" class="btn-primary flex-1 px-6 py-3 rounded-xl text-white font-medium"
                    style="background: var(--primary-dark);">
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
        // Máscara para CPF
        const cpfInput = document.querySelector('input[placeholder="000.000.000-00"]');
        if (cpfInput) {
            cpfInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 11) {
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    e.target.value = value;
                }
            });
        }

        // Máscara para WhatsApp
        const whatsappInput = document.querySelector('input[placeholder="(13) 99999-9999"]');
        if (whatsappInput) {
            whatsappInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 11) {
                    value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
                    value = value.replace(/(\d{5})(\d)/, '$1-$2');
                    e.target.value = value;
                }
            });
        }

        // Máscara para Data
        const dateInput = document.querySelector('input[placeholder="dd/mm/aaaa"]');
        if (dateInput) {
            dateInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 8) {
                    value = value.replace(/(\d{2})(\d)/, '$1/$2');
                    value = value.replace(/(\d{2})(\d)/, '$1/$2');
                    e.target.value = value;
                }
            });
        }

        // Categorias - seleção múltipla
        const categories = document.querySelectorAll('.category-chip');
        const categoriesHidden = document.getElementById('categories');
        let selectedCategories = [];

        categories.forEach(cat => {
            cat.addEventListener('click', function() {
                const categoryName = this.getAttribute('data-category');

                if (this.classList.contains('selected')) {
                    this.classList.remove('selected');
                    selectedCategories = selectedCategories.filter(c => c !== categoryName);
                } else {
                    this.classList.add('selected');
                    selectedCategories.push(categoryName);
                }

                categoriesHidden.value = selectedCategories.join(',');
            });
        });

        // Submit do formulário
        const form = document.getElementById('registerForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Validação simples
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--accent-red)';
                    isValid = false;
                } else {
                    field.style.borderColor = 'var(--border-color)';
                }
            });

            if (selectedCategories.length === 0) {
                alert('Selecione pelo menos uma categoria de atuação');
                isValid = false;
            }

            if (!document.getElementById('terms').checked) {
                alert('Você precisa concordar com os Termos de Uso');
                isValid = false;
            }

            if (isValid) {
                // Simular envio
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Criando perfil...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Perfil criado com sucesso! Redirecionando...');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    // window.location.href = '/dashboard';
                }, 1500);
            }
        });

        // Remover erro ao digitar
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = 'var(--border-color)';
            });
        });
    </script>
</body>

</html>
