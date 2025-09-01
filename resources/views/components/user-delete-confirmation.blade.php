<div id="popupOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-20 hidden items-center justify-center fade-in">
    <div id="popupModal" class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full scale-in">

        <div class="flex justify-center items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">CONFIRM DELETE</h3>
        </div>

        <p class="text-gray-600 mb-6 text-center">Are you sure you want to delete this account?</p>

        <div class="flex justify-center space-x-3">
            <button id="cancelBtn"
                class="min-w-20 px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors duration-200">
                Cancel
            </button>
            <form id="modal-form" action="" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="min-w-20 px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors duration-200">
                    Yes
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const deleteBtn = document.getElementById('delete-btn');
    const popupOverlay = document.getElementById('popupOverlay');
    const cancelBtn = document.getElementById('cancelBtn');
    const modalForm = document.getElementById('modal-form');

    function showPopup() {
        popupOverlay.style.display = 'flex';
    }

    function hidePopup() {
        popupOverlay.style.display = 'none';
    }

    function deleteUser(userId) {
        const baseRoute = "{{ route('users.destroy', ['user' => ':id']) }}";
        const actionUrl = baseRoute.replace(':id', userId);

        document.getElementById('modal-form').action = actionUrl;

        showPopup();
    }

    cancelBtn.addEventListener('click', hidePopup);

    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            hidePopup();
        }
    });

    modalForm.addEventListener('submit', (event) => {
        hidePopup();
    });
</script>
