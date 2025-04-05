<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bem Vindo(a)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #ffffff 0%, #fff9c4 30%, #fff59d 60%, #ffeb3b 100%);
            min-height: 100vh;
        }

        @keyframes fire-pulse {
            0% {
                color: #ff0000;
                text-shadow: 0 0 10px #ff0000, 0 0 20px #ff5555;
            }

            50% {
                color: #ff3333;
                text-shadow: 0 0 15px #ff0000, 0 0 30px #ff7777;
            }

            100% {
                color: #ff0000;
                text-shadow: 0 0 10px #ff0000, 0 0 20px #ff5555;
            }
        }

        .animate-fire-pulse {
            animation: fire-pulse 0.7s infinite ease-in-out;
            font-weight: 700;
            display: inline-block;
            padding: 0 5px;
            border-radius: 4px;
        }
    </style>
</head>

<body class="font-sans antialiased gradient-bg">
    <div class="text-black/50">

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                {{-- <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                        <button
                            class="bg-yellow-400 hover:bg-yellow-500 text-black font-medium py-2 px-4 rounded-md transition-colors duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            <a href="{{ url('/dashboard') }}" class="inline-block w-full h-full">
                                Dashboard
                            </a>
                        </button>
                        {{-- @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Register
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </header> --}}
                <!-- Logo -->
                <div class="mb-6 flex justify-center">
                    <a href="{{ route('login') }}" class="block hover:scale-105 transition-transform duration-200">
                        <img src="{{ asset('imagens/logo.png') }}" alt="Logo do Reforço Escolar"
                            class="w-64 h-64 md:w-80 md:h-80 rounded-full border-4 border-gray-300 hover:border-blue-500 transition-all 
                                   animate-pulse hover:animate-none animate-infinite animate-duration-[2000ms] animate-ease-in-out">
                    </a>
                </div>
                <div class="text-center mb-10">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 animate-fade-in">
                        Bem-vindo(a) a Escola <span class="text-blue-600">Reforço Escolar!</span>
                    </h1>

                    <div class="max-w-2xl mx-auto">
                        <p class="text-lg md:text-xl text-gray-600 mb-6 leading-relaxed">
                            <span class="block mb-3">Sua jornada educacional começa aqui.</span>
                            <span class="block text-sm md:text-base">
                                <span class="animate-fire-pulse">✨ ACESSE O SISTEMA CLICANDO NA LOGO ACIMA! ✨</span>
                            </span>
                        </p>

                        <div class="mt-6 text-sm text-gray-600 animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Ambiente seguro e exclusivo para nossa comunidade escolar
                        </div>
                    </div>
                </div>

                <footer class="py-6 text-center text-sm text-gray-600">
                    @if (Route::has('login'))
                    <div class="flex justify-center mb-4">
                        <!-- Adicionei mb-4 para margem abaixo do botão -->
                        <nav class="flex justify-center">
                            <!-- Simplifiquei a navegação -->
                            @auth
                            <a href="{{ url('/dashboard') }}"
                                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-medium py-2 px-4 rounded-md transition-colors duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                Dashboard
                            </a>
                            @endauth
                        </nav>
                    </div>
                    @endif

                    <div class="mt-4">
                        <!-- Adicionei um container para o texto de copyright -->
                        &copy; <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <span id="school-name">Nome da Escola</span>. Todos os direitos reservados.
                    </div>
                </footer>

                <script>
                    // Opcional: Pode carregar o nome da escola via API ou configuração
                    document.getElementById('school-name').textContent = 
                        window.schoolName || 'Reforço Escolar';
                </script>
            </div>
        </div>
    </div>
</body>

</html>