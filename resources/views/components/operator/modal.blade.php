@props(['id', 'title'])

<div id="{{ $id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50 transition-opacity opacity-0 pointer-events-none">
    <div class="bg-white rounded-lg shadow-lg w-1/2 p-6">
        <div class="flex justify-between items-center border-b pb-2">
            <h2 class="text-xl font-semibold">{{ $title }}</h2>
            <button onclick="toggleModal('{{ $id }}')" class="text-gray-500 hover:text-gray-700">
                ✖
            </button>
        </div>
        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
</div>

<script>
    function toggleModal(id) {
        let modal = document.getElementById(id);
        modal.classList.toggle('hidden');
        modal.classList.toggle('opacity-0');
        modal.classList.toggle('pointer-events-none');
    }
</script>
