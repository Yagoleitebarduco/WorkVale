<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>Cadastro de Empresa - TalentHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
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

        .fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        /* Melhorias para webview */
        input,
        select,
        textarea {
            font-size: 16px;
            /* Previne zoom automático em iOS */
        }

        /* Estilo para scroll suave */
        html {
            scroll-behavior: smooth;
        }

        /* Personalização do scroll para mobile */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Container principal otimizado para mobile -->
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-4 sm:py-8 fade-in">

        <!-- Header com botão voltar -->
        <div class="mb-6 sm:mb-8">
            <a href="javascript:history.back()" class="inline-flex items-center text-primary hover:text-indigo-700 mb-4 transition-colors">
                <i class="fas fa-arrow-left mr-2 text-sm sm:text-base"></i>
                <span class="text-sm sm:text-base">Voltar</span>
            </a>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Cadastro de Empresa</h1>
            <p class="text-sm sm:text-base text-gray-600">Preencha os dados da sua empresa</p>
        </div>

        <!-- Formulário Principal -->
        <form id="companyForm" class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Seção 1: Dados do Negócio -->
            <div class="p-5 sm:p-8 border-b border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-building text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Dados do Negócio</h2>
                </div>

                <div class="space-y-5">
                    <!-- Razão Social ou Nome Fantasia -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Razão Social ou Nome Fantasia <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="razao_social"
                            placeholder="Nome da empresa"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                    </div>

                    <!-- CNPJ ou CPF -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            CNPJ ou CPF <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="cnpj_cpf"
                            placeholder="00.000.000/0000-00 ou 000.000.000-00"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                        <p class="text-xs text-gray-500 mt-2 flex items-start gap-1">
                            <i class="fas fa-store text-green-500 mt-0.5"></i>
                            <span>Para pequenos produtores/empreendedores individuais</span>
                        </p>
                    </div>

                    <!-- Área de Atuação -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Área de Atuação <span class="text-red-500">*</span>
                        </label>
                        <select name="area_atuacao"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition bg-white text-base">
                            <option value="">Selecione a área de atuação</option>
                            <option value="tecnologia">Tecnologia</option>
                            <option value="marketing">Marketing</option>
                            <option value="design">Design</option>
                            <option value="consultoria">Consultoria</option>
                            <option value="eventos">Eventos</option>
                            <option value="construcao">Construção</option>
                            <option value="educacao">Educação</option>
                            <option value="saude">Saúde</option>
                            <option value="alimentacao">Alimentação</option>
                            <option value="moda">Moda</option>
                            <option value="agronegocio">Agronegócio</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Seção 2: Sobre a Empresa -->
            <div class="p-5 sm:p-8 border-b border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-info-circle text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Sobre a Empresa</h2>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                        Pequena descrição da empresa <span class="text-red-500">*</span>
                    </label>
                    <textarea name="descricao"
                        rows="5"
                        placeholder="Descreva sua empresa, missão, valores e área de atuação..."
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none text-base"></textarea>
                    <p class="text-xs text-gray-500 mt-2 flex items-start gap-1">
                        <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                        <span>Esta descrição aparecerá nas vagas postadas</span>
                    </p>
                    <p class="text-xs text-gray-400 mt-1 text-right" id="descricaoCounter">500 caracteres restantes</p>
                </div>
            </div>

            <!-- Seção 3: Segurança -->
            <div class="p-5 sm:p-8 border-b border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-lock text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Segurança</h2>
                </div>

                <div class="space-y-5">
                    <!-- Senha -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Senha <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                            name="senha"
                            placeholder="Crie uma senha segura"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                        <p class="text-xs text-gray-500 mt-2">Mínimo 8 caracteres, incluindo letras e números</p>

                        <!-- Indicador de força da senha -->
                        <div class="mt-3">
                            <div class="flex gap-1 h-1.5">
                                <div class="flex-1 bg-gray-200 rounded-full transition-all duration-300" id="strength-1"></div>
                                <div class="flex-1 bg-gray-200 rounded-full transition-all duration-300" id="strength-2"></div>
                                <div class="flex-1 bg-gray-200 rounded-full transition-all duration-300" id="strength-3"></div>
                                <div class="flex-1 bg-gray-200 rounded-full transition-all duration-300" id="strength-4"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2" id="strength-text"></p>
                        </div>
                    </div>

                    <!-- Confirmar Senha -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Confirmar Senha <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                            name="confirmar_senha"
                            placeholder="Digite a senha novamente"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                    </div>
                </div>
            </div>

            <!-- Seção 4: Contato Responsável -->
            <div class="p-5 sm:p-8 border-b border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-user-tie text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Contato Responsável</h2>
                </div>

                <div class="space-y-5">
                    <!-- Nome do Responsável/Recrutador -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Nome do Responsável/Recrutador <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            name="responsavel"
                            placeholder="Nome completo do responsável"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                    </div>

                    <!-- E-mail Corporativo -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            E-mail Corporativo <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                            name="email"
                            placeholder="empresa@email.com"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                        <p class="text-xs text-gray-500 mt-2">Será usado como login</p>
                    </div>

                    <!-- Telefone de Contato da Empresa -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Telefone de Contato da Empresa <span class="text-red-500">*</span>
                        </label>
                        <input type="tel"
                            name="telefone"
                            placeholder="(13) 3333-3333"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition text-base">
                    </div>
                </div>
            </div>

            <!-- Seção 5: Localização -->
            <div class="p-5 sm:p-8">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-map-marker-alt text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Localização</h2>
                </div>

                <div class="space-y-5">
                    <!-- Cidade Sede -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Cidade Sede <span class="text-red-500">*</span>
                        </label>
                        <select name="cidade"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition bg-white text-base">
                            <option value="">Selecione a cidade sede</option>
                            <option value="registro">Registro</option>
                            <option value="ipeuna">Ipeúna</option>
                            <option value="eldorado">Eldorado</option>
                            <option value="jacupiranga">Jacupiranga</option>
                            <option value="pariquera-acu">Pariquera-Açu</option>
                            <option value="cajati">Cajati</option>
                            <option value="cananeia">Cananéia</option>
                            <option value="iguape">Iguape</option>
                            <option value="ilha-comprida">Ilha Comprida</option>
                            <option value="barra-do-turvo">Barra do Turvo</option>
                            <option value="sao-paulo">São Paulo</option>
                            <option value="rio-de-janeiro">Rio de Janeiro</option>
                            <option value="belo-horizonte">Belo Horizonte</option>
                            <option value="curitiba">Curitiba</option>
                            <option value="porto-alegre">Porto Alegre</option>
                            <option value="salvador">Salvador</option>
                            <option value="brasilia">Brasília</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-2">25 municípios do Vale do Ribeira e principais capitais</p>
                    </div>

                    <!-- Endereço Completo -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm sm:text-base">
                            Endereço Completo <span class="text-red-500">*</span>
                        </label>
                        <textarea name="endereco"
                            rows="2"
                            placeholder="Rua, número, complemento"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none text-base"></textarea>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="bg-gray-50 px-5 sm:px-8 py-6 flex flex-col sm:flex-row gap-3">
                <button type="button" id="clearBtn" class="order-2 sm:order-1 px-6 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 transition font-semibold">
                    <i class="fas fa-eraser mr-2"></i>
                    Limpar Formulário
                </button>
                <button type="submit" class="order-1 sm:order-2 flex-1 gradient-bg text-white py-3 rounded-xl font-semibold hover:shadow-lg transition transform hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-building mr-2"></i>
                    Cadastrar Empresa
                </button>
            </div>
        </form>

        <!-- Termos de Uso -->
        <div class="text-center mt-6 text-gray-600 text-xs sm:text-sm px-4 pb-8">
            <p>Ao criar sua conta, você concorda com nossos <a href="#" class="text-primary hover:underline">Termos de Uso</a> e <a href="#" class="text-primary hover:underline">Política de Privacidade</a></p>
        </div>
    </div>

    <script>
        // Máscara para CNPJ/CPF (detecta automaticamente)
        document.querySelector('input[name="cnpj_cpf"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length <= 11) {
                // CPF
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            } else {
                // CNPJ
                value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            }

            e.target.value = value.substring(0, 18);
        });

        // Máscara para telefone
        document.querySelector('input[name="telefone"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 10) {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }
            e.target.value = value.substring(0, 15);
        });

        // Contador de caracteres da descrição
        const descricaoTextarea = document.querySelector('textarea[name="descricao"]');
        const descricaoCounter = document.getElementById('descricaoCounter');
        const maxChars = 500;

        descricaoTextarea.addEventListener('input', function() {
            const remaining = maxChars - this.value.length;
            descricaoCounter.textContent = `${remaining} caracteres restantes`;

            if (remaining < 0) {
                this.value = this.value.substring(0, maxChars);
                descricaoCounter.textContent = `0 caracteres restantes`;
            }

            if (remaining <= 50) {
                descricaoCounter.classList.add('text-orange-500');
                descricaoCounter.classList.remove('text-gray-400');
            } else {
                descricaoCounter.classList.remove('text-orange-500');
                descricaoCounter.classList.add('text-gray-400');
            }
        });

        // Indicador de força da senha
        const senhaInput = document.querySelector('input[name="senha"]');
        const strengthText = document.getElementById('strength-text');

        function updatePasswordStrength() {
            const password = senhaInput.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[$@#&!]/)) strength++;

            // Reset bars
            for (let i = 1; i <= 4; i++) {
                const bar = document.getElementById(`strength-${i}`);
                bar.classList.remove('bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500');
                bar.classList.add('bg-gray-200');
            }

            // Update bars
            let color = '';
            let text = '';

            if (strength === 0) {
                text = '';
            } else if (strength <= 2) {
                color = 'bg-red-500';
                text = '🔒 Senha fraca';
                for (let i = 1; i <= 2; i++) {
                    const bar = document.getElementById(`strength-${i}`);
                    bar.classList.remove('bg-gray-200');
                    bar.classList.add(color);
                }
            } else if (strength <= 3) {
                color = 'bg-yellow-500';
                text = '🟡 Senha média';
                for (let i = 1; i <= 3; i++) {
                    const bar = document.getElementById(`strength-${i}`);
                    bar.classList.remove('bg-gray-200');
                    bar.classList.add(color);
                }
            } else {
                color = 'bg-green-500';
                text = '🟢 Senha forte';
                for (let i = 1; i <= 4; i++) {
                    const bar = document.getElementById(`strength-${i}`);
                    bar.classList.remove('bg-gray-200');
                    bar.classList.add(color);
                }
            }

            strengthText.textContent = text;
        }

        senhaInput.addEventListener('input', updatePasswordStrength);

        // Validação e submissão do formulário
        document.getElementById('companyForm').addEventListener('submit', (e) => {
            e.preventDefault();

            const senha = document.querySelector('input[name="senha"]').value;
            const confirmarSenha = document.querySelector('input[name="confirmar_senha"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const telefone = document.querySelector('input[name="telefone"]').value;

            // Validação de senha
            if (senha !== confirmarSenha) {
                alert('❌ As senhas não coincidem!');
                document.querySelector('input[name="confirmar_senha"]').focus();
                return;
            }

            if (senha.length < 8) {
                alert('❌ A senha deve ter no mínimo 8 caracteres!');
                document.querySelector('input[name="senha"]').focus();
                return;
            }

            // Validação de email
            if (!email.includes('@') || !email.includes('.')) {
                alert('❌ Por favor, insira um e-mail válido!');
                document.querySelector('input[name="email"]').focus();
                return;
            }

            // Validação de telefone
            const telefoneLimpo = telefone.replace(/\D/g, '');
            if (telefoneLimpo.length < 10) {
                alert('❌ Por favor, insira um telefone válido!');
                document.querySelector('input[name="telefone"]').focus();
                return;
            }

            // Sucesso
            alert('✅ Empresa cadastrada com sucesso! Você será redirecionado.');

            // Opcional: Fechar webview ou redirecionar
            if (window.ReactNativeWebView) {
                window.ReactNativeWebView.postMessage(JSON.stringify({
                    type: 'success',
                    data: 'Empresa cadastrada com sucesso!'
                }));
            } else {
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 500);
            }
        });

        // Botão limpar formulário
        document.getElementById('clearBtn').addEventListener('click', () => {
            if (confirm('Tem certeza que deseja limpar todos os dados do formulário?')) {
                document.getElementById('companyForm').reset();
                descricaoCounter.textContent = '500 caracteres restantes';
                descricaoCounter.classList.remove('text-orange-500');
                descricaoCounter.classList.add('text-gray-400');

                // Reset password strength indicators
                for (let i = 1; i <= 4; i++) {
                    const bar = document.getElementById(`strength-${i}`);
                    bar.classList.remove('bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500');
                    bar.classList.add('bg-gray-200');
                }
                strengthText.textContent = '';
            }
        });

        // Prevenir zoom em inputs no iOS (já está com font-size: 16px)
        // Adicionar suporte para webview React Native
        if (window.ReactNativeWebView) {
            console.log('Rodando dentro de WebView React Native');
        }
    </script>
</body>

</html>