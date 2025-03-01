<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Efek Glassmorphism */
        .glassmorphism {
            background: rgba(243, 244, 246, 0.9);
            /* Warna abu-abu dengan opacity 90% */
            backdrop-filter: blur(10px);
            /* Efek blur */
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Border transparan */
        }

        /* Overlay untuk background */
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            /* Overlay hitam dengan opacity 50% */
        }
    </style>
</head>

<body class="h-screen bg-cover bg-center flex justify-center items-center relative"
    style="background-image: url('{{ asset('images/Kanwil DJPB Sultra Gambar (1).jpg') }}'); font-family: 'Inter', sans-serif;">

    <!-- Overlay untuk background -->
    <div class="absolute inset-0 overlay"></div>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 relative z-10">
        <!-- Logo dan Judul dengan Shadow pada Teks -->
        <div class="bg-white/20 backdrop-blur-sm rounded-lg shadow-lg p-4 mb-6 ml-4 transform -translate-x-2">
            <a class="flex items-center text-2xl font-semibold text-white drop-shadow-lg">
                <img src="{{ asset('images/Kanwil-Direktorat-Jenderal-Perbendaharaan-DJPb-04-scaled-removebg (1).png') }}"
                    alt="logo" class="w-40 h-17 mr-2">
                Kanwil DJPB <br>Sulawesi Tenggara
            </a>
        </div>

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

        <!-- Card Login dengan Efek Glassmorphism -->
        <div class="w-full glassmorphism rounded-lg shadow-lg md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Masuk Ke Web Persuratan
                </h1>

                <!-- Form Login -->
                <form action="{{ route('submitLogin') }}" method="POST" class="space-y-4 md:space-y-6">
                    @csrf
                    <div>
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-700">NIP</label>
                        <input type="number" id="nip" name="nip"
                            class="bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2 mt-1"
                            placeholder="Masukkan NIP Anda" oninput="this.value = this.value.slice(0, 18);" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" id="password" name="password" minlength="8"
                            class="bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Masukkan password Anda" required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Login
                    </button>
                    <p class="text-sm font-light text-gray-700">
                        Belum punya akun?
                        <a href="{{ route('showRegistrasi') }}" class="font-medium text-blue-600 hover:underline">
                            Registrasi Disini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
