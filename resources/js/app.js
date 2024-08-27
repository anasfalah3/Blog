import './bootstrap';
$(document).ready(function () {
    const toggleButton = $('[data-collapse-toggle="mobile-menu-2"]');
    const mobileMenu = $("#mobile-menu-2");

    toggleButton.on("click", function () {
        const isExpanded = $(this).attr("aria-expanded") === "true";
        $(this).attr("aria-expanded", !isExpanded);
        mobileMenu.toggleClass("hidden");
    });
});
