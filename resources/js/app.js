const stored = localStorage.getItem('theme');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
const isDark = stored ? stored === 'dark' : prefersDark;

document.documentElement.classList.toggle('dark', isDark);

const toggle = document.getElementById('theme-toggle');
const iconLight = document.getElementById('theme-icon-light');
const iconDark = document.getElementById('theme-icon-dark');

function updateIcon() {
    const dark = document.documentElement.classList.contains('dark');
    iconLight.classList.toggle('hidden', !dark);
    iconDark.classList.toggle('hidden', dark);
}

if (toggle && iconLight && iconDark) {
    updateIcon();

    toggle.addEventListener('click', () => {
        const dark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', dark ? 'dark' : 'light');
        updateIcon();
    });
}
