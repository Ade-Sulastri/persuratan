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
        <p>Operator</p>
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
