<!-- Sidebar -->
<div class="w-64 min-h-screen bg-[#2A3335] text-white p-5 hidden md:block">
    <h2 class="text-lg font-bold">Menu</h2>
    <ul class="mt-5">
        <li class="mb-3">
            <a href="{{ route('dashboardSupervisor') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                <span class="flex items-center gap-x-2">
                    Dashboard
                </span>
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('tambahSurat') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                <span class="flex items-center gap-x-2">
                    Tambah Surat
                </span>
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratMasukSupervisor') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                <span class="flex items-center gap-x-2">
                    Surat Masuk
                </span>
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratKeluarSupervisor') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                Surat Keluar
                </span>
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('managementUser') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                <span class="flex items-center gap-x-2">
                    Management User
                </span>
            </a>
        </li>
    </ul>
</div>

<!-- Mobile Sidebar -->
<div id="mobile-sidebar" class="fixed inset-0 bg-blue-600 text-white p-5 w-64 hidden">
    <button id="close-menu" class="text-right w-full">✖</button>
    <ul class="mt-5">
        <li class="mb-3"><a href="#" class="block p-2 hover:bg-blue-700 rounded">Surat Masuk</a></li>
        <li class="mb-3"><a href="#" class="block p-2 hover:bg-blue-700 rounded">Surat Keluar</a></li>
    </ul>
</div>
