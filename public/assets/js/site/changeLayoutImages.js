function changeLayoutImages(btn, projectId) {
    const type = btn.dataset.type;

    if (type === 'desktop') {
        btn.dataset.type = 'mobile';
        btn.innerHTML = `<i class="fa-solid fa-display"></i> Desktop`;
        document.getElementById('mobileSlider' + projectId).classList.remove('hidden');
        document.getElementById('desktopSlider' + projectId).classList.add('hidden');
    } else {
        btn.dataset.type = 'desktop';
        btn.innerHTML = `<i class="fa-solid fa-mobile-screen"></i> Mobile`;
        document.getElementById('desktopSlider' + projectId).classList.remove('hidden');
        document.getElementById('mobileSlider' + projectId).classList.add('hidden');
    }
}