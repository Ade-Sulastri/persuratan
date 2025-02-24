<!-- Sidebar -->
<div id="sidebar"
class="fixed top-0 left-0 w-64 h-full bg-[#2A3335] text-white p-5 pt-16 md:block z-50 transition-transform duration-300 overflow-y-auto">
    <button id="toggle-sidebar" class="absolute top-4 right-4 text-white text-xl md:hidden">☰</button>
    <h2 class="text-lg font-bold">Menu</h2>
    <ul class="mt-5">
        <li class="mb-3">
            <a href="{{ route('dashboardOperator') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                Dashboard
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratMasukOperator') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                Surat Masuk
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratKeluarOperator') }}" class="block p-2 hover:bg-white hover:text-black rounded">
                Surat Keluar
            </a>
        </li>
    </ul>
    </div>

    <!-- Konten utama -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("main-content");
            const toggleSidebarButton = document.getElementById("toggle-sidebar");
            const submenu = document.querySelector("#submenu");
            const arrow = document.querySelector("#arrow");
            const submenuToggle = document.querySelector("#submenu-toggle");

            // Toggle sidebar and adjust main content margin
            function toggleSidebar() {
                sidebar.classList.toggle("hidden");
                if (sidebar.classList.contains("hidden")) {
                    mainContent.classList.remove("ml-64");
                    mainContent.classList.add("ml-0");
                } else {
                    mainContent.classList.remove("ml-0");
                    mainContent.classList.add("ml-64");
                }
            }

            // Toggle sidebar on button click
            toggleSidebarButton.addEventListener("click", toggleSidebar);

            // Dropdown function
            function dropdown() {
                if (submenu) {
                    submenu.classList.toggle("hidden");
                }
                if (arrow) {
                    arrow.classList.toggle("rotate-0");
                }
            }

            // Ensure submenuToggle exists before adding event listener
            if (submenuToggle) {
                submenuToggle.addEventListener("click", dropdown);
            }

            // Open sidebar from navbar button
            window.openSidebar = toggleSidebar;
        });
    </script>
