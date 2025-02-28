<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body class="h-screen bg-gray-100 flex justify-center items-center">
    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-4 text-gray-900">Login</h1>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ route('submitLogin') }}" method="POST" class="space-y-4">
            @csrf
            <div class="relative">
                <label for="nip" class="block text-sm font-medium text-gray-700">Nip</label>
                <input type="number" id="nip" name="nip"
                    class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your Nip" oninput="this.value = this.value.slice(0, 18);" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" minlength="8"
                    class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>
        </form>

        <div class="mt-4 text-center text-sm text-gray-600">
            <p>Belum punya akun? <a href="{{ route('showRegistrasi') }}"
                    class="text-blue-500 hover:underline">Registrasi Disini</a></p>
        </div>
    </div>
</body>

</html>
