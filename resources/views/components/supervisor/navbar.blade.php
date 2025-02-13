<!-- Navbar -->
<nav class="flex justify-between p-4 py-3 items-center text-black shadow-md">
    <button id="menu-toggle" class="md:hidden">☰</button>
    <div>Arya</div>
    <div class="flex gap-x-5 items-center">
        <p>Supervisor</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn border px-5 py-2 rounded-lg bg-[#2A3335] text-white">Logout</button>
        </form>
    </div>
</nav>
