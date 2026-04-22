<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','WorkVale')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 flex justify-between h-14 items-center">
            <a href="/" class="text-xl font-bold text-[#6A2698]">WorkVale</a>
            <div class="flex gap-4 text-sm">
                <a href="/company/dashboard" class="text-gray-600 hover:text-[#6A2698]">Dashboard</a>
                <a href="/company/jobs" class="text-gray-600 hover:text-[#6A2698]">Vagas</a>
            </div>
        </div>
    </nav>
    <main>@yield('content')</main>
</body>
</html>