<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Preencha seus dados para criar seu perfil de freelancer">

    <title>WorkVale - Cadastro de Freelancer</title>

    {{-- Links --}}
    <link rel="shortcut icon" href="{{ asset('IconB.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/Util/FreeScreen.css') }}">
    
    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
    
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/ec8f13948e.js" crossorigin="anonymous"></script>
    
    {{-- JQuery e JQuery Mask Plugin --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <div class="bg-gray-50 font-sans antialiased">
        {{-- Container Principal compassing responsivo --}}
        <div class="min-h-screen py-6 px-4 sm:py-10 sm:px-6 md:py-12 md:px-8 lg:py-16 lg:px-20">
            {{-- Card do formulário - centralizado e com largura máxima --}}
            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                {{-- Cabeçalho com cor primária --}}
                <div class="bg-gradient-to-r from-Primary to-Primary-dark px-6 py-8 sm:px-8 sm:py-10">
                    {{-- Sugestão de Design --}}
                    {{-- <h3 class="text-lg font-medium text-white">Bem Vindo</h3> --}}

                    {{-- Título Principal --}}
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-tight">
                        Workvale - Cadastro de Freelancer
                    </h1>

                    {{-- Descrição --}}
                    <p class=" text-Primary-light mt-2 text-sm sm:text-base">
                        Preencha seus dados para criar seu perfil de freelancer
                    </p>
                </div>

                {{-- Formulario de Cadastro de Freelancers --}}
                <div class="p-6 sm:p-8 md:p-10 space-y-8 sm:space-y-10">
                    {{-- indicadores de Etapas --}}
                    <div class="flex items-center justify-between mx-auto mb-8">
                        {{-- Etapa 1 --}}
                        <div class="flex flex-col items-center">
                            <div class="step-indicator w-15 h-15 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600 step-1 active"
                                data-step="1">1</div>
                            <span class="text-sm mt-2 text-gray-600">Dados Pessoais</span>
                        </div>


                        {{-- Etapa 2 --}}
                        <div class="flex flex-col items-center">
                            <div class="step-indicator w-15 h-15 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600 step-2"
                                data-step="2">2</div>
                            <span class="text-sm mt-2 text-gray-600">Contato</span>
                        </div>


                        {{-- Etapa 3 --}}
                        <div class="flex flex-col items-center">
                            <div class="step-indicator w-15 h-15 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600 step-3"
                                data-step="3">3</div>
                            <span class="text-sm mt-2 text-gray-600">Localização</span>
                        </div>


                        {{-- Etapa 4 --}}
                        <div class="flex flex-col items-center">
                            <div class="step-indicator w-15 h-15 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600 step-4"
                                data-step="4">4</div>
                            <span class="text-sm mt-2 text-gray-600">Perfil Profissional</span>
                        </div>


                        {{-- Etapa 5 --}}
                        <div class="flex flex-col items-center">
                            <div class="step-indicator w-15 h-15 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600 step-5"
                                data-step="5">5</div>
                            <span class="text-sm mt-2 text-gray-600">Bio</span>
                        </div>
                    </div>

                    <form action="#" method="POST" id="formRegister" class="">
                        @csrf

                        {{-- Etapa 1: Dados Pessoais --}}
                        <div class="form-step active" id="step-1">
                            <div class="mb-4 py-4 border-b-2 border-gray-200 flex items-center gap-3">
                                <div class="p-2 rounded-lg bg-Primary-light">
                                    <i class="fa-solid fa-user" style="color: #5A1D80"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-700">Dados Pessoais</h2>
                            </div>
                            
                            {{-- Nome Completo --}}
                            <div class="mb-5">
                                <label for="complete_name" class="block text-sm font-medium text-Dark mb-1">
                                    Nome Completo <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="complete_name" name="complete_name"
                                    placeholder="Digite seu Nome Completo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-Primary-dark focus:ring-2 focus:ring-Primary-light/20 transition"
                                    required
                                >
                            </div>

                            {{-- CPF --}}
                            <div class="mb-5">
                                <label for="cpf" class="block text-sm font-medium text-Dark mb-1">
                                    CPF <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="cpf" name="cpf"
                                    placeholder="000.000.000-00"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-Primary-dark focus:ring-2 focus:ring-Primary-light/20 transition"
                                    required
                                >
                                <p class="text-sm text-gray-500">Digite seu CPF no formato 000.000.000-00</p>
                            </div>

                            {{-- Data de Nascimento --}}
                            <div class="mb-5">
                                <label for="birth_date" class="block text-sm font-medium text-Dark mb-1">
                                    Data de Nascimento <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    id="birth_date" name="birth_date"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-Primary-dark focus:ring-2 focus:ring-Primary-light/20 transition"
                                    required
                                >
                            </div>
                        </div>

                        
                        {{-- Etapa 2: Dados de Contato --}}
                        <div class="form-step" id="step-2">
                            C
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
