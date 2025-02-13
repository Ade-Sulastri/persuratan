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
            {{-- form registrasi --}}
            <form action="{{ route('registrasi') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">Nip</label>
                    <input type="text" id="nip" name="nip"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your Nip" required>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your username" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your email" required>
                </div>
                <div>
                    <label for="kode_satker" class="block text-sm font-medium text-gray-700">Kode Satker</label>
                    <input type="text" id="kode_satker" name="kode_satker"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your Nip" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your password" required>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Registrasi</button>
                </div>
            </form>
            <div class="mt-4 text-center text-sm text-gray-600">
                <p>Already have an account? <a href="{{ route('showLogin') }}"
                        class="text-blue-500 hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</body>

</html>
