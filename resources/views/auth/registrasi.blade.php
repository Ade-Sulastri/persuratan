<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body class="h-screen bg-cover bg-center">
    <div class="h-screen flex justify-center items-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center mb-4">Registrasi</h1>

            {{-- Form registrasi --}}
            <form action="{{ route('registrasi') }}" method="POST" class="space-y-4">
                @csrf

                <!-- NIP -->
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                    <input type="number" id="nip" name="nip"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 
                        @error('nip') border-red-500 @enderror"
                        placeholder="Masukkan NIP" 
                        value="{{ $errors->has('nip') ? '' : old('nip') }}" oninput="this.value = this.value.slice(0, 18);" required>
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
                        placeholder="Masukkan Email" 
                        value="{{ $errors->has('email') ? '' : old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode Satker -->
                <div>
                    <label for="kode_satker" class="block text-sm font-medium text-gray-700">Kode Satker</label>
                    <input type="number" id="kode_satker" name="kode_satker"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Kode Satker" value="{{ old('kode_satker') }}" oninput="this.value = this.value.slice(0, 6);" required>
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
                <p>Sudah punya akun? <a href="{{ route('showLogin') }}"
                        class="text-blue-500 hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</body>

</html>
