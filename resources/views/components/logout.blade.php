<div id="popupOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-20 hidden items-center justify-center fade-in">
    <div id="popupModal" class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full scale-in">

        <div class="flex justify-center items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">CONFIRM LOG OUT</h3>
        </div>

        <p class="text-gray-600 mb-6 text-center">Are you sure you want to log out of your account?</p>

        <div class="flex justify-center space-x-3">
            <button id="cancelBtn"
                class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors duration-200">
                Cancel
            </button>
            <form id="logout-form" action={{ route('logout') }} method="GET">
                @csrf
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors duration-200">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const logoutBtn = document.getElementById('logoutBtn');
    const popupOverlay = document.getElementById('popupOverlay');
    const cancelBtn = document.getElementById('cancelBtn');
    const logoutForm = document.getElementById('logout-form');

    function showPopup() {
        popupOverlay.style.display = 'flex';
    }

    function hidePopup() {
        popupOverlay.style.display = 'none';
    }

    logoutBtn.addEventListener('click', showPopup);
    cancelBtn.addEventListener('click', hidePopup);

    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            hidePopup();
        }
    });

    logoutForm.addEventListener('submit', (event) => {
        hidePopup();
    });
</script>
