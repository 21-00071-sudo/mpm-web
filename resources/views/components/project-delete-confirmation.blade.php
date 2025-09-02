<div id="deletePopupOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-20 hidden items-center justify-center fade-in">
    <div id="popupDeleteModal" class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full scale-in">

        <div class="flex justify-center items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">CONFIRM DELETE</h3>
        </div>

        <p class="text-gray-600 mb-6 text-center">Are you sure you want to delete this project?</p>

        <div class="flex justify-center space-x-3">
            <button id="deleteCancelBtn"
                class="min-w-20 px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors duration-200">
                Cancel
            </button>
            <form id="delete-modal-form" action="" method="POST">
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
    const deletePopupOverlay = document.getElementById('deletePopupOverlay');
    const deleteCancelBtn = document.getElementById('deleteCancelBtn');
    const deleteModalForm = document.getElementById('delete-modal-form');

    function showDeletePopup() {
        deletePopupOverlay.style.display = 'flex';
    }

    function hideDeletePopup() {
        deletePopupOverlay.style.display = 'none';
    }

    function deleteProject(projectId) {
        const baseRoute = "{{ route('projects.destroy', ['project' => ':id']) }}";
        const actionUrl = baseRoute.replace(':id', projectId);

        document.getElementById('delete-modal-form').action = actionUrl;

        showDeletePopup();
    }

    deleteCancelBtn.addEventListener('click', hideDeletePopup);

    deletePopupOverlay.addEventListener('click', (event) => {
        if (event.target === deletePopupOverlay) {
            hideDeletePopup();
        }
    });

    deleteModalForm.addEventListener('submit', (event) => {
        hideDeletePopup();
    });
</script>
