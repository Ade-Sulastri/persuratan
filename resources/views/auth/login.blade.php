<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Animasi Floating (Naik Turun) */
        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-floating {
            animation: floating 3s infinite ease-in-out;
        }

        /* Animasi Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }

        /* Efek Glassmorphism */
        .glassmorphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="h-screen bg-cover bg-center flex justify-center items-center relative"
    style="background-image: url('{{ asset('images/DJPbSultra (1).jpeg') }}'); font-family: 'Inter', sans-serif;">

    <!-- Overlay agar teks lebih jelas -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Card Login dengan Animasi -->
    <div
        class="w-full max-w-sm glassmorphism p-6 rounded-lg shadow-lg relative z-10 animate-floating animate-fadeIn transform transition-all hover:shadow-xl hover:-translate-y-2">
        <div class="flex justify-center mb-4"> <!-- Mengurangi margin-bottom dari mb-6 ke mb-4 -->
            <img src="{{ asset('images\Kanwil-Direktorat-Jenderal-Perbendaharaan-DJPb-04-scaled-removebg (1).png') }}"
                alt="Logo" class="w-48 h-49 object-contain">
            <!-- Mengurangi ukuran logo dari w-60 h-60 ke w-48 h-48 -->
        </div>
        <!-- Logo -->

        <h1 class="text-2xl font-bold text-center mb-4 text-gray-800">Login</h1> <!-- Mengurangi margin-bottom -->

        <!-- Notifikasi Error / Success -->
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 text-sm" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('submitLogin') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                <input type="text" id="nip" name="nip"
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    placeholder="Masukkan NIP Anda" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" minlength="8"
                    class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    placeholder="Masukkan password Anda" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Login
            </button>
        </form>

        <!-- Link Registrasi -->
        <div class="mt-4 text-center text-sm text-gray-600"> <!-- Mengurangi margin-top -->
            <p>Belum punya akun?
                <a href="{{ route('showRegistrasi') }}" class="text-blue-500 hover:underline">
                    Registrasi Disini
                </a>
            </p>
        </div>
    </div>

</body>

</html>
