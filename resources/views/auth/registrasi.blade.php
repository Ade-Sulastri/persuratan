<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="h-screen bg-cover bg-center">
    <div class="h-screen flex justify-center items-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center mb-4">Registrasi</h1>

            {{-- Menampilkan error jika ada --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>⚠ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Registrasi --}}
            <form action="{{ route('registrasi') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Input NIP --}}
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                    <input type="text" id="nip" name="nip" minlength="18" maxlength="18"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan NIP" required>
                    <span id="nip-error" class="text-red-500 text-sm"></span>
                    @error('nip')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Input Username --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Username" required>
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Input Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Email" required>
                    <span id="email-error" class="text-red-500 text-sm"></span>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Input Kode Satker --}}
                <div>
                    <label for="kode_satker" class="block text-sm font-medium text-gray-700">Kode Satker</label>
                    <input type="text" id="kode_satker" name="kode_satker"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Kode Satker" required>
                    @error('kode_satker')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" minlength="8"
                        class="mt-1 w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Password" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Registrasi</button>
                </div>
            </form>

            {{-- Link ke Login --}}
            <div class="mt-4 text-center text-sm text-gray-600">
                <p>Sudah punya akun? <a href="{{ route('showLogin') }}" class="text-blue-500 hover:underline">Login</a>
                </p>
            </div>
        </div>
    </div>

    {{-- AJAX Cek NIP & Email --}}
    <script>
        $(document).ready(function() {
            // Cek NIP apakah sudah digunakan
            $('#nip').on('keyup', function() {
                var nip = $(this).val();

                if (nip.length === 18) { // Hanya cek jika sudah 18 karakter
                    $.ajax({
                        url: "{{ route('check.nip') }}",
                        type: "GET",
                        data: {
                            nip: nip
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#nip-error').text("NIP sudah digunakan!").addClass(
                                    'text-red-500');
                            } else {
                                $('#nip-error').text("").removeClass('text-red-500');
                            }
                        },
                        error: function() {
                            $('#nip-error').text("Terjadi kesalahan saat memeriksa NIP")
                                .addClass('text-red-500');
                        }
                    });
                } else {
                    $('#nip-error').text(""); // Kosongkan jika kurang dari 18 digit
                }
            });

            // Cek Email apakah sudah digunakan
            $('#email').on('keyup', function() {
                var email = $(this).val();

                if (email.length > 5) { // Hanya cek jika email memiliki panjang lebih dari 5 karakter
                    $.ajax({
                        url: "{{ route('check.nip') }}", // Ubah dengan route validasi email jika tersedia
                        type: "GET",
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#email-error').text("Email sudah digunakan!").addClass(
                                    'text-red-500');
                            } else {
                                $('#email-error').text("").removeClass('text-red-500');
                            }
                        },
                        error: function() {
                            $('#email-error').text("Terjadi kesalahan saat memeriksa email")
                                .addClass('text-red-500');
                        }
                    });
                } else {
                    $('#email-error').text(""); // Kosongkan jika email kurang dari 5 karakter
                }
            });
        });
    </script>

</body>

</html>
