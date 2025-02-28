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
            background: rgba(243, 244, 246, 0.9); /* Warna abu-abu dengan opacity 90% */
            backdrop-filter: blur(10px); /* Efek blur */
            border: 1px solid rgba(255, 255, 255, 0.2); /* Border transparan */
        }

        /* Overlay untuk background */
        .overlay {
            background: rgba(0, 0, 0, 0.5); /* Overlay hitam dengan opacity 50% */
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

        <!-- Card Registrasi dengan Efek Glassmorphism -->
        <div class="w-full glassmorphism rounded-lg shadow-lg md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Mendaftar Ke Web Persuratan
                </h1>

                <!-- Form Registrasi -->
                <form action="{{ route('registrasi') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- NIP -->
                    <div>
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" id="nip" name="nip" minlength="18" maxlength="18"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                @error('nip') border-red-500 @enderror"
                            placeholder="Masukkan NIP" value="{{ $errors->has('nip') ? '' : old('nip') }}" required>
                        @error('nip')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Username" value="{{ old('username') }}" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                @error('email') border-red-500 @enderror"
                            placeholder="Masukkan Email" value="{{ $errors->has('email') ? '' : old('email') }}" required>
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kode Satker -->
                    <div>
                        <label for="kode_satker" class="block text-sm font-medium text-gray-700">Kode Satker</label>
                        <input type="text" id="kode_satker" name="kode_satker" minlength="16" maxlength="16"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Kode Satker" value="{{ old('kode_satker') }}" required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                                @error('password') border-red-500 @enderror"
                            placeholder="Masukkan Password" required>
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Konfirmasi Password" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Registrasi</button>
                    </div>
                </form>

                <div class="mt-4 text-center text-sm text-gray-600">
                    <p>Sudah punya akun? <a href="{{ route('showLogin') }}" class="text-blue-500 hover:underline">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>