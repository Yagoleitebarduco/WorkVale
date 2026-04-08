<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Login - WorkVale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style type="text/tailwindcss">
        @theme {
            --color-Primary: #6A2698;
            --color-Primary-light: #E2D4F0;
            --color-Primary-dark: #5A1D80;

            --color-Secondary: #FFC107;
            --color-Success: #6ECB63;
            --color-Danger: #FF6B6B;
            --color-Light: #F8F9FA;

            --color-Dark: #343A40;
        }

        /* Aplicando as variáveis manualmente no CSS */
        .bg-primary {
            background-color: #6A2698;
        }

        .bg-primary-light {
            background-color: #E2D4F0;
        }

        .bg-primary-dark {
            background-color: #5A1D80;
        }

        .bg-secondary {
            background-color: #FFC107;
        }

        .bg-success {
            background-color: #6ECB63;
        }

        .bg-danger {
            background-color: #FF6B6B;
        }

        .bg-light {
            background-color: #F8F9FA;
        }

        .bg-dark {
            background-color: #343A40;
        }

        .text-primary {
            color: #6A2698;
        }

        .text-primary-light {
            color: #E2D4F0;
        }

        .text-primary-dark {
            color: #5A1D80;
        }

        .text-secondary {
            color: #FFC107;
        }

        .text-success {
            color: #6ECB63;
        }

        .text-danger {
            color: #FF6B6B;
        }

        .text-light {
            color: #F8F9FA;
        }

        .text-dark {
            color: #343A40;
        }

        .border-primary {
            border-color: #6A2698;
        }

        .border-primary-light {
            border-color: #E2D4F0;
        }

        .ring-primary:focus {
            ring-color: #6A2698;
        }

        .hover\:bg-primary-dark:hover {
            background-color: #5A1D80;
        }

        .hover\:bg-secondary-dark:hover {
            background-color: #e0a800;
        }

        .hover\:text-primary:hover {
            color: #6A2698;
        }

        .focus\:ring-primary:focus {
            --tw-ring-color: #6A2698;
        }

        .focus\:border-primary:focus {
            border-color: #6A2698;
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-primary-light/30 via-white to-primary-light/20 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-primary rounded-2xl shadow-lg mb-4">
                <i class="fas fa-briefcase text-3xl text-white"></i>
            </div>
            <h1 class="text-3xl font-bold text-primary">WorkVale</h1>
            <p class="text-gray-500 mt-1">Sua plataforma de serviços</p>
        </div>

        <!-- Card de Login -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            <!-- Cabeçalho do Card -->
            <div class="bg-primary p-6 text-center">
                <h2 class="text-white text-xl font-semibold">Bem-vindo de volta!</h2>
                <p class="text-primary-light text-sm mt-1">Faça login para continuar</p>
            </div>

            <!-- Formulário -->
            <form class="p-6 space-y-5">
                <!-- Campo E-mail -->
                <div>
                    <label class="block text-sm font-medium text-dark mb-2">
                        <i class="fas fa-envelope text-primary mr-2"></i>
                        E-mail
                    </label>
                    <input type="email" placeholder="seu@email.com"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-gray-800">
                </div>

                <!-- Campo Senha -->
                <div>
                    <label class="block text-sm font-medium text-dark mb-2">
                        <i class="fas fa-lock text-primary mr-2"></i>
                        Senha
                    </label>
                    <div class="relative">
                        <input type="password" placeholder="Digite sua senha"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-gray-800">
                        <button type="button"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Opções extras -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        <span class="text-sm text-gray-600">Lembrar-me</span>
                    </label>
                    <a href="#" class="text-sm text-primary hover:text-primary-dark transition">
                        Esqueceu a senha?
                    </a>
                </div>

                <!-- Botão de Login -->
                <button type="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-md">
                    Entrar
                </button>

                <!-- Divisor -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-gray-500">ou continue com</span>
                    </div>
                </div>

                <!-- Botões sociais -->
                <div class="grid grid-cols-2 gap-3">
                    <button type="button"
                        class="flex items-center justify-center gap-2 px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <i class="fab fa-google text-red-500"></i>
                        <span class="text-sm text-gray-700">Google</span>
                    </button>
                    <button type="button"
                        class="flex items-center justify-center gap-2 px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <i class="fab fa-facebook text-blue-600"></i>
                        <span class="text-sm text-gray-700">Facebook</span>
                    </button>
                </div>
            </form>

            <!-- Link para cadastro -->
            <div class="bg-light p-4 text-center border-t border-gray-100">
                <p class="text-sm text-gray-600">
                    Não tem uma conta?
                    <a href="#" class="text-primary font-semibold hover:text-primary-dark transition">
                        Cadastre-se gratuitamente
                    </a>
                </p>
            </div>
        </div>

        <!-- Mensagem de segurança -->
        <div class="text-center mt-6">
            <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                <i class="fas fa-shield-alt text-primary"></i>
                <span>Ambiente seguro e protegido</span>
                <i class="fas fa-lock text-primary"></i>
            </div>
        </div>

    </div>

    <!-- Script para mostrar/esconder senha -->
    <script>
        const togglePassword = document.querySelector('.fa-eye, .fa-eye-slash');
        const passwordInput = document.querySelector('input[type="password"]');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>

</body>

</html>
