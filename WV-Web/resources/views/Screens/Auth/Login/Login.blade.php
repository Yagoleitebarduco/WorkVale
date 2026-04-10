<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Login</title>
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

        .form-input {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(106, 38, 152, 0.1);
        }

        .btn-login {
            transition: all 0.2s ease;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(106, 38, 152, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .social-btn {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .social-btn:hover {
            border-color: var(--primary-dark);
            background: var(--primary-light);
            transform: translateY(-2px);
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

        .login-container {
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .floating-shape {
            position: absolute;
            background: linear-gradient(135deg, var(--primary-light), transparent);
            border-radius: 50%;
            filter: blur(60px);
            z-index: 0;
        }

        .toggle-password {
            cursor: pointer;
        }

        .remember-checkbox {
            accent-color: var(--primary-dark);
            width: 1.125rem;
            height: 1.125rem;
            cursor: pointer;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .shake {
            animation: shake 0.3s ease-in-out;
        }
    </style>
</head>

<body
    style="background: linear-gradient(135deg, var(--bg-light) 0%, #f0eef3 100%); font-family: 'Inter', sans-serif; min-height: 100vh;">

    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden">

        <!-- Elementos decorativos flutuantes -->
        <div class="floating-shape w-96 h-96 top-20 -left-48 opacity-30"></div>
        <div class="floating-shape w-80 h-80 bottom-20 -right-48 opacity-20"></div>

        <!-- Container do Login -->
        <div class="login-container max-w-md w-full relative z-10">

            <!-- Logo e Header -->
            <div class="text-center mb-8">
                <div class="inline-block">
                    <h1 class="text-4xl font-extrabold"
                        style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium)); -webkit-background-clip: text; background-clip: text; color: transparent;">
                        Work<span style="color: var(--primary-dark);">Vale</span>
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-2">Conectando talentos, impulsionando negócios.</p>
            </div>

            <!-- Card de Login -->
            <div class="bg-white rounded-2xl shadow-xl p-8">

                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Bem-vindo de volta</h2>
                    <p class="text-sm text-gray-500 mt-1">Acesse sua conta para continuar</p>
                </div>

                <!-- Tipo de Login: Freelancer ou Empresa -->
                <div class="flex gap-3 mb-6 p-1 bg-gray-100 rounded-xl">
                    <button type="button" id="freelancerTab"
                        class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition-all"
                        style="background: var(--primary-dark); color: white;">
                        <i class="fas fa-user mr-2"></i>
                        Freelancer
                    </button>
                    <button type="button" id="empresaTab"
                        class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition-all text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-building mr-2"></i>
                        Empresa
                    </button>
                </div>

                <form id="loginForm">
                    <!-- Campo E-mail -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input type="email" id="email"
                                class="form-input w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 focus:bg-white"
                                placeholder="seu@email.com" required>
                        </div>
                    </div>

                    <!-- Campo Senha -->
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input type="password" id="password"
                                class="form-input w-full pl-10 pr-12 py-3 rounded-xl bg-gray-50 focus:bg-white"
                                placeholder="Digite sua senha" required>
                            <button type="button"
                                class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="far fa-eye text-gray-400 hover:text-gray-600"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Opções adicionais -->
                    <div class="flex justify-between items-center mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="remember-checkbox">
                            <span class="text-sm text-gray-600">Lembrar-me</span>
                        </label>
                        <a href="#" class="text-sm font-medium" style="color: var(--primary-dark);">Esqueceu a
                            senha?</a>
                    </div>

                    <!-- Botão Login -->
                    <button type="submit" class="btn-login w-full py-3 rounded-xl text-white font-semibold text-base">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Entrar
                    </button>
                </form>

                <!-- Separador -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-gray-500">ou continue com</span>
                    </div>
                </div>

                <!-- Botões Sociais -->
                <div class="grid grid-cols-2 gap-3">
                    <button
                        class="social-btn flex items-center justify-center gap-2 py-2.5 rounded-xl bg-white text-gray-700 font-medium">
                        <i class="fab fa-google" style="color: #DB4437;"></i>
                        Google
                    </button>
                    <button
                        class="social-btn flex items-center justify-center gap-2 py-2.5 rounded-xl bg-white text-gray-700 font-medium">
                        <i class="fab fa-linkedin" style="color: #0077b5;"></i>
                        LinkedIn
                    </button>
                </div>

                <!-- Link para cadastro -->
                <div class="text-center mt-6 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        Não tem uma conta?
                        <a href="#" id="signupLink" class="font-semibold ml-1"
                            style="color: var(--primary-dark);">
                            Cadastre-se
                        </a>
                    </p>
                    <div class="flex justify-center gap-4 mt-3 text-xs text-gray-400">
                        <a href="#" class="hover:text-gray-600">Termos de Uso</a>
                        <span>•</span>
                        <a href="#" class="hover:text-gray-600">Política de Privacidade</a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-xs text-gray-400">
                    © 2024 WorkVale - Todos os direitos reservados
                </p>
            </div>
        </div>
    </div>

    <script>
        // Alternar entre tabs (Freelancer / Empresa)
        let userType = 'freelancer';
        const freelancerTab = document.getElementById('freelancerTab');
        const empresaTab = document.getElementById('empresaTab');
        const loginForm = document.getElementById('loginForm');

        freelancerTab.addEventListener('click', function() {
            userType = 'freelancer';
            freelancerTab.style.background = 'var(--primary-dark)';
            freelancerTab.style.color = 'white';
            empresaTab.style.background = 'transparent';
            empresaTab.style.color = '#6c757d';
            empresaTab.style.backgroundColor = 'transparent';
        });

        empresaTab.addEventListener('click', function() {
            userType = 'empresa';
            empresaTab.style.background = 'var(--primary-dark)';
            empresaTab.style.color = 'white';
            freelancerTab.style.background = 'transparent';
            freelancerTab.style.color = '#6c757d';
            freelancerTab.style.backgroundColor = 'transparent';
        });

        // Toggle password visibility
        const togglePasswordBtn = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');

        togglePasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        // Validação e submit do login
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');

            let isValid = true;

            // Validação de email
            if (!email) {
                showError(emailField, 'E-mail é obrigatório');
                isValid = false;
            } else if (!isValidEmail(email)) {
                showError(emailField, 'E-mail inválido');
                isValid = false;
            } else {
                clearError(emailField);
            }

            // Validação de senha
            if (!password) {
                showError(passwordField, 'Senha é obrigatória');
                isValid = false;
            } else if (password.length < 6) {
                showError(passwordField, 'Senha deve ter no mínimo 6 caracteres');
                isValid = false;
            } else {
                clearError(passwordField);
            }

            if (isValid) {
                // Simular login
                const submitBtn = loginForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Entrando...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    const userTypeText = userType === 'freelancer' ? 'Freelancer' : 'Empresa';
                    alert(
                        `Login realizado com sucesso!\nBem-vindo(a) ao WorkVale!\nTipo: ${userTypeText}\nE-mail: ${email}`);

                    // Resetar botão
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;

                    // Limpar formulário
                    loginForm.reset();

                    // Resetar tabs para freelancer
                    userType = 'freelancer';
                    freelancerTab.click();
                }, 1500);
            }
        });

        // Função para mostrar erro
        function showError(field, message) {
            field.classList.add('shake');
            field.style.borderColor = 'var(--accent-red)';

            // Remover mensagem de erro existente
            const existingError = field.parentElement.parentElement.querySelector('.error-message');
            if (existingError) existingError.remove();

            // Adicionar nova mensagem de erro
            const errorDiv = document.createElement('p');
            errorDiv.className = 'error-message text-xs mt-1';
            errorDiv.style.color = 'var(--accent-red)';
            errorDiv.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i> ${message}`;
            field.parentElement.parentElement.appendChild(errorDiv);

            // Remover animação shake após 0.3s
            setTimeout(() => {
                field.classList.remove('shake');
            }, 300);
        }

        function clearError(field) {
            field.style.borderColor = 'var(--border-color)';
            const existingError = field.parentElement.parentElement.querySelector('.error-message');
            if (existingError) existingError.remove();
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Limpar erro ao digitar
        const inputs = document.querySelectorAll('#email, #password');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                clearError(this);
            });
        });

        // Link de cadastro
        document.getElementById('signupLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert(
                'Redirecionando para página de cadastro...\nEscolha entre:\n- Cadastro de Freelancer\n- Cadastro de Empresa');
        });

        // Esqueceu a senha
        document.querySelector('a[href="#"]').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Funcionalidade de recuperação de senha\nEm breve você receberá instruções por e-mail.');
        });

        // Botões sociais
        const socialBtns = document.querySelectorAll('.social-btn');
        socialBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const provider = this.innerText.trim();
                alert(`Login com ${provider} em desenvolvimento\nEm breve disponível!`);
            });
        });

        // Termos e política
        const footerLinks = document.querySelectorAll('.text-center a');
        footerLinks.forEach(link => {
            if (link.innerText.includes('Termos') || link.innerText.includes('Política')) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert(`Documento: ${this.innerText}\nEm breve disponível para consulta.`);
                });
            }
        });
    </script>
</body>

</html>
