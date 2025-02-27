<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full bg-white shadow-md flex justify-between p-4 py-3 items-center text-black z-40">
    <!-- Tombol Toggle Sidebar untuk Mobile -->
    <span
        class="absolute text-white text-2xl top-4 left-4 cursor-pointer p-2 bg-gray-800 rounded-lg shadow-md hover:bg-gray-700 transition-all flex items-center justify-center w-10 h-10 "onclick=openSidebar()>
        <i class="bi bi-filter-left"></i>
    </span>

    <div></div>

    <!-- Bagian Kanan -->
    <div class="flex gap-x-5 items-center">
        <div class="flex gap-x-3 px-2 py-2">
            <p>Supervisor</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <circle cx="12" cy="6" r="4" fill="currentColor" />
                <path fill="currentColor"
                    d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" />
            </svg>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn border px-5 py-2 rounded-lg bg-[#2A3335] text-white">Logout</button>
        </form>
    </div>
</nav>

<script>
    function openSidebar() {
        document.querySelector("#sidebar").classList.toggle("hidden");
    }
</script>
