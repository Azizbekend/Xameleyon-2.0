//=== Вывод панели для мобильного разрешения ===
panel = document.querySelector('.lesson-panel');
panelContent = document.querySelector('.lesson-panel__content');
panelOpen = document.querySelector('.lesson-panel__open');
panelClose = document.querySelector('.lesson-panel__close');

panelOpen.addEventListener("click", function () {
    panel.style.display = "block";

    setTimeout(() => {
        panelContent.style.transform = "translateX(0%)";
    }, 500);

});

panelClose.addEventListener("click", function () {
    panelContent.style.transform = "translateX(-150%)";

    setTimeout(() => {
        panel.style.display = "none";
    }, 500);
});

