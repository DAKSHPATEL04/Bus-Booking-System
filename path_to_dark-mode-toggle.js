// Check if the user has a preference stored
const userPreference = localStorage.getItem('theme');

// If the user has a preference, apply it
if (userPreference === 'dark') {
    document.body.classList.add('dark-mode');
    updateIcon('dark');
}

// Toggle between modes and update the icon
document.getElementById('dark-mode-toggle').addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', currentTheme);
    updateIcon(currentTheme);
});

function updateIcon(theme) {
    const modeIcon = document.getElementById('mode-icon');
    modeIcon.classList.remove(theme === 'dark' ? 'fa-sun' : 'fa-moon');
    modeIcon.classList.add(theme === 'dark' ? 'fa-moon' : 'fa-sun');
}
