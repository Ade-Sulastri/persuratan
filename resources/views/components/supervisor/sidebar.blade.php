<!-- Sidebar -->
<div id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-[#2A3335] text-white p-5 pt-16 md:block z-50 transition-transform duration-300 overflow-y-auto">
    <button id="toggle-sidebar" class="absolute top-4 right-4 text-white text-xl md:hidden">☰</button>
    <h2 class="text-lg font-bold">Menu</h2>
    <ul class="mt-5">
        <li class="mb-3">
            <a href="{{ route('dashboardSupervisor') }}"
                class="flex items-center gap-2 p-2 hover:bg-white hover:text-black rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratMasukSupervisor') }}"
                class="flex items-center gap-2 p-2 hover:bg-white hover:text-black rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path fill="currentColor"
                        d="M4 4a2 2 0 0 1 2-2h8a1 1 0 0 1 .707.293l5 5A1 1 0 0 1 20 8v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm13.586 4L14 4.414V8zM12 4H6v16h12V10h-5a1 1 0 0 1-1-1zm0 7.5a1 1 0 0 1 1 1v2.586l.293-.293a1 1 0 0 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 1 1 1.414-1.414l.293.293V12.5a1 1 0 0 1 1-1" />
                </svg>
                Surat Masuk
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('suratKeluarSupervisor') }}"
                class="flex items-center gap-2 p-2 hover:bg-white hover:text-black rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"
                    fill="currentColor">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="m213.334 85.333l85.333 85.334v256h-256V85.333zM195.66 128H85.334v256H256V188.34zM384 33.83l89.75 89.752l-30.169 30.17l-38.249-38.239V256c0 45.7-35.924 83.01-81.074 85.229l-4.259.104v-42.666c22.493 0 40.921-17.406 42.55-39.483l.117-3.184l-.001-140.486l-38.247 38.238l-30.17-30.17z" />
                </svg>
                Surat Keluar
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('managementUser') }}"
                class="flex items-center gap-2 p-2 hover:bg-white hover:text-black rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M200.876 277.332c-5.588 12.789-8.74 26.884-8.872 41.7L192 320v128H64v-85.333c0-46.676 37.427-84.569 83.922-85.322l1.411-.012zm161.79-42.665c47.13 0 85.334 38.205 85.334 85.333v128H213.333V320c0-47.128 38.205-85.333 85.334-85.333zM170.667 128c35.286 0 64 28.715 64 64s-28.714 64-64 64c-35.285 0-64-28.715-64-64s28.715-64 64-64m160-64c41.174 0 74.667 33.493 74.667 74.667s-33.493 74.666-74.666 74.666c-41.174 0-74.667-33.493-74.667-74.666C256 97.493 289.493 64 330.667 64" />
                </svg>
                Management User
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
