<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Freelancer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        /* Progress Bar */
        .progress-bar {
            padding: 24px 32px 0 32px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 16px;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            background: white;
            text-align: center;
            flex: 1;
            cursor: pointer;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-weight: bold;
            color: #999;
            transition: all 0.2s;
        }

        .step.completed .step-circle {
            background: #222;
            color: white;
        }

        .step.active .step-circle {
            background: #222;
            color: white;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
        }

        .step-label {
            font-size: 12px;
            color: #666;
        }

        .step.active .step-label {
            color: #222;
            font-weight: 500;
        }

        /* Header */
        .header {
            padding: 24px 32px;
            border-bottom: 1px solid #e0e0e0;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        /* Formulário */
        .form-container {
            padding: 32px;
        }

        .form-step {
            display: none;
        }

        .form-step.active-step {
            display: block;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #888;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .field-hint {
            font-size: 12px;
            color: #888;
            margin-top: 6px;
        }

        .security-note {
            background: #f9f9f9;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #555;
            border-left: 3px solid #ccc;
        }

        .info-box {
            background: #f9f9f9;
            padding: 12px 16px;
            border-radius: 6px;
            margin-top: 16px;
            font-size: 13px;
            color: #555;
            border-left: 3px solid #ccc;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input {
            width: auto;
            margin: 0;
        }

        .checkbox-item label {
            margin: 0;
            font-weight: normal;
            font-size: 14px;
        }

        .form-actions {
            margin-top: 32px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
        }

        .btn {
            padding: 12px 32px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #222;
            border-color: #222;
            color: white;
        }

        .btn-primary:hover {
            background: #333;
        }

        .btn-secondary:hover {
            background: #f0f0f0;
        }

        @media (max-width: 600px) {
            .form-container, .header {
                padding: 20px;
            }
            .progress-bar {
                padding: 20px 20px 0 20px;
            }
            .form-actions {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
            .checkbox-group {
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="progress-bar">
            <div class="progress-steps">
                <div class="step completed" data-step="1">
                    <div class="step-circle">1</div>
                    <div class="step-label">Dados Pessoais</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-circle">2</div>
                    <div class="step-label">Contato</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-circle">3</div>
                    <div class="step-label">Localização</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-circle">4</div>
                    <div class="step-label">Perfil Profissional</div>
                </div>
            </div>
        </div>

        <div class="header">
            <h1 id="header-title">Dados Pessoais</h1>
            <p id="header-subtitle">Informe seus dados básicos para começar</p>
        </div>

        <div class="form-container">
            <form method="POST" action="" id="cadastroForm">
                @csrf

                <!-- PASSO 1 - DADOS PESSOAIS -->
                <div class="form-step active-step" data-step="1">
                    <div class="form-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo">
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                        <div class="field-hint">Essencial para segurança e evitar perfis falsos</div>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="text" id="data_nascimento" name="data_nascimento" placeholder="dd/mm/aaaa">
                    </div>

                    <div class="security-note">
                        🔒 Seus dados estão protegidos e serão usados apenas para verificação de identidade
                    </div>
                </div>

                <!-- PASSO 2 - CONTATO -->
                <div class="form-step" data-step="2">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="seu@email.com">
                        <div class="field-hint">Será usado como login</div>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="tel" id="whatsapp" name="whatsapp" placeholder="(13) 99999-9999">
                        <div class="field-hint">Para contato rápido e notificações</div>
                    </div>
                </div>

                <!-- PASSO 3 - LOCALIZAÇÃO -->
                <div class="form-step" data-step="3">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <select id="cidade" name="cidade">
                            <option value="">Selecione sua cidade</option>
                            <option value="iguape">Iguape</option>
                            <option value="cananeia">Cananéia</option>
                            <option value="ilha_comprida">Ilha Comprida</option>
                            <option value="jacupiranga">Jacupiranga</option>
                            <option value="pariquera-acu">Pariquera-Açu</option>
                            <option value="registro">Registro</option>
                            <option value="sete_barras">Sete Barras</option>
                        </select>
                        <div class="field-hint">25 municípios do Vale do Ribeira</div>
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" name="bairro" placeholder="Digite seu bairro">
                    </div>

                    <div class="info-box">
                        📍 Sua localização ajuda a conectar você com oportunidades na sua região
                    </div>
                </div>

                <!-- PASSO 4 - PERFIL PROFISSIONAL -->
                <div class="form-step" data-step="4">
                    <div class="form-group">
                        <label for="titulo">Título Profissional</label>
                        <input type="text" id="titulo" name="titulo" placeholder="Ex: Eletricista, Designer, Redator">
                        <div class="field-hint">Seu título principal para aparecer nas buscas</div>
                    </div>

                    <div class="form-group">
                        <label>Categorias de Atuação</label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_manutencao" name="categorias[]" value="manutencao">
                                <label for="cat_manutencao">Manutenção</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_ti" name="categorias[]" value="ti">
                                <label for="cat_ti">TI</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_eventos" name="categorias[]" value="eventos">
                                <label for="cat_eventos">Eventos</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_design" name="categorias[]" value="design">
                                <label for="cat_design">Design</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_marketing" name="categorias[]" value="marketing">
                                <label for="cat_marketing">Marketing</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="cat_consultoria" name="categorias[]" value="consultoria">
                                <label for="cat_consultoria">Consultoria</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="portfolio">Link de Portfólio ou LinkedIn</label>
                        <input type="url" id="portfolio" name="portfolio" placeholder="https://seusite.com">
                        <div class="field-hint">Compartilhe exemplos do seu trabalho</div>
                    </div>

                    <div class="form-group">
                        <label for="bio">Breve Bio / Resumo de Experiência</label>
                        <textarea id="bio" name="bio" placeholder="Conte um pouco sobre sua experiência, habilidades e objetivos profissionais..."></textarea>
                    </div>
                </div>

                <!-- BOTÕES -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">← Voltar</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Próximo →</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn" style="display: none;">Finalizar Cadastro →</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Variáveis de controle
        let currentStep = 1;
        const totalSteps = 4;

        // Elementos
        const steps = document.querySelectorAll('.step');
        const formSteps = document.querySelectorAll('.form-step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const headerTitle = document.getElementById('header-title');
        const headerSubtitle = document.getElementById('header-subtitle');

        // Configurações de cada passo
        const stepConfig = {
            1: {
                title: 'Dados Pessoais',
                subtitle: 'Informe seus dados básicos para começar'
            },
            2: {
                title: 'Contato',
                subtitle: 'Como podemos entrar em contato com você?'
            },
            3: {
                title: 'Localização',
                subtitle: 'Onde você está localizado?'
            },
            4: {
                title: 'Perfil Profissional',
                subtitle: 'Conte-nos sobre sua experiência e habilidades'
            }
        };

        // Função para atualizar o passo atual
        function updateStep(step) {
            // Atualizar classes dos steps do progress bar
            steps.forEach((stepElement, index) => {
                const stepNumber = index + 1;
                stepElement.classList.remove('active', 'completed');
                
                if (stepNumber < step) {
                    stepElement.classList.add('completed');
                    stepElement.querySelector('.step-circle').textContent = '✓';
                } else if (stepNumber === step) {
                    stepElement.classList.add('active');
                    stepElement.querySelector('.step-circle').textContent = step;
                } else {
                    stepElement.querySelector('.step-circle').textContent = stepNumber;
                }
            });

            // Atualizar visibilidade dos forms
            formSteps.forEach(formStep => {
                const stepNum = parseInt(formStep.getAttribute('data-step'));
                if (stepNum === step) {
                    formStep.classList.add('active-step');
                } else {
                    formStep.classList.remove('active-step');
                }
            });

            // Atualizar header
            headerTitle.textContent = stepConfig[step].title;
            headerSubtitle.textContent = stepConfig[step].subtitle;

            // Atualizar botões
            if (step === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'inline-block';
            }

            if (step === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            } else {
                nextBtn.style.display = 'inline-block';
                submitBtn.style.display = 'none';
            }
        }

        // Função para validar o passo atual
        function validateStep(step) {
            const currentFormStep = document.querySelector(`.form-step[data-step="${step}"]`);
            const inputs = currentFormStep.querySelectorAll('input, select, textarea');
            let isValid = true;

            // Validação básica - campos obrigatórios
            inputs.forEach(input => {
                if (input.hasAttribute('required') || 
                    (input.type !== 'checkbox' && input.value.trim() === '' && 
                     input.id !== 'portfolio' && input.id !== 'bio')) {
                    
                    // Marcar campos vazios com borda vermelha
                    if (input.value.trim() === '' && input.type !== 'checkbox') {
                        input.style.borderColor = '#ff4444';
                        isValid = false;
                        
                        // Remover borda vermelha após 2 segundos
                        setTimeout(() => {
                            input.style.borderColor = '#ccc';
                        }, 2000);
                    } else {
                        input.style.borderColor = '#ccc';
                    }
                }
            });

            // Validação específica do passo 1 (CPF e Data)
            if (step === 1) {
                const cpf = document.getElementById('cpf').value.replace(/\D/g, '');
                if (cpf.length !== 11) {
                    alert('Por favor, informe um CPF válido com 11 dígitos');
                    isValid = false;
                }
            }

            // Validação específica do passo 2 (Email)
            if (step === 2) {
                const email = document.getElementById('email').value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email && !emailRegex.test(email)) {
                    alert('Por favor, informe um e-mail válido');
                    isValid = false;
                }
            }

            return isValid;
        }

        // Avançar passo
        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    updateStep(currentStep);
                }
            }
        }

        // Voltar passo
        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStep(currentStep);
            }
        }

        // Clicar no step do progress bar
        steps.forEach((stepElement, index) => {
            stepElement.addEventListener('click', () => {
                const targetStep = index + 1;
                if (targetStep < currentStep) {
                    // Pode voltar sem validação
                    currentStep = targetStep;
                    updateStep(currentStep);
                } else if (targetStep > currentStep) {
                    // Precisa validar os passos intermediários
                    let canGo = true;
                    for (let i = currentStep; i < targetStep; i++) {
                        if (!validateStep(i)) {
                            canGo = false;
                            break;
                        }
                    }
                    if (canGo) {
                        currentStep = targetStep;
                        updateStep(currentStep);
                    }
                }
            });
        });

        // Event listeners
        nextBtn.addEventListener('click', nextStep);
        prevBtn.addEventListener('click', prevStep);

        // Máscaras
        const cpfInput = document.getElementById('cpf');
        if(cpfInput) {
            cpfInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if(value.length <= 11) {
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    e.target.value = value;
                }
            });
        }

        const dateInput = document.getElementById('data_nascimento');
        if(dateInput) {
            dateInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if(value.length <= 8) {
                    if(value.length > 2) {
                        value = value.replace(/^(\d{2})(\d)/, '$1/$2');
                    }
                    if(value.length > 5) {
                        value = value.replace(/(\d{2})(\d{4})$/, '$1/$2');
                    }
                    e.target.value = value;
                }
            });
        }

        const whatsInput = document.getElementById('whatsapp');
        if(whatsInput) {
            whatsInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if(value.length <= 11) {
                    if(value.length > 2) {
                        value = value.replace(/^(\d{2})(\d)/, '($1) $2');
                    }
                    if(value.length > 9) {
                        value = value.replace(/(\d{5})(\d{4})$/, '$1-$2');
                    }
                    e.target.value = value;
                }
            });
        }

        // Submit do formulário
        const form = document.getElementById('cadastroForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateStep(currentStep)) {
                // Aqui você pode enviar via AJAX ou apenas submeter o form
                alert('Cadastro finalizado com sucesso!');
                // form.submit(); // Descomente para enviar ao backend
            }
        });

        // Inicializar
        updateStep(1);
    </script>
</body>
</html>