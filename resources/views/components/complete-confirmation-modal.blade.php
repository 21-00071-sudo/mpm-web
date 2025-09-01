<div id="popupOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-20 hidden items-center justify-center fade-in">
    <div id="completePopupModal" class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full scale-in">

        <div class="flex justify-center items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">MARK AS COMPLETED</h3>
        </div>

        <p class="text-gray-600 mb-6 text-center">Are you sure you want to mark this as completed?</p>

        <div class="flex justify-center space-x-3">
            <button id="completeCancelBtn"
                class="min-w-20 px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors duration-200">
                Cancel
            </button>
            <form id="complete-modal-form" action="" method="POST">
                @csrf

                <button type="submit"
                    class="min-w-20 px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors duration-200">
                    Yes
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const completeBtn = document.getElementById('complete-btn');
    const popupOverlay = document.getElementById('popupOverlay');
    const completeCancelBtn = document.getElementById('completeCancelBtn');
    const modalForm = document.getElementById('complete-modal-form');

    function showCompletePopup() {
        popupOverlay.style.display = 'flex';
    }

    function hideCompletePopup() {
        popupOverlay.style.display = 'none';
    }

    function markAsCompleted(projectId) {

        const actionUrl = `/projects/${projectId}/complete`;
        document.getElementById('complete-modal-form').action = actionUrl;

        showCompletePopup();
    }

    completeCancelBtn.addEventListener('click', hideCompletePopup);

    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            hideCompletePopup();
        }
    });

    modalForm.addEventListener('submit', (event) => {
        hideCompletePopup();
    });
</script>
