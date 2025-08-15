import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const userIcon = document.getElementById("user-icon");
    const navigation = document.getElementById("navigation");
    const navigationLinks = sidebar.querySelectorAll("a");
    const labels = sidebar.querySelectorAll("span, h1, p");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("w-64");
        sidebar.classList.toggle("w-20");

        navigation.classList.toggle("space-y-4");
        navigationLinks.forEach((navigationLink) => {
            navigationLink.classList.add("py-4");
        });

        userIcon.classList.toggle("text-7xl");
        userIcon.classList.toggle("text-5xl");
        userIcon.classList.toggle("mb-4");
        userIcon.classList.toggle("mb-0");

        labels.forEach((label) => {
            label.classList.toggle("hidden");
        });
    });
});
