// Loading
// Animation bounce pour l'icône
const style = document.createElement('style');
style.innerHTML = `
    @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
    }
`;
document.head.appendChild(style);

// Simulation de chargement (remplacer avec ton vrai chargement)
window.addEventListener('load', () => {
    setTimeout(() => {
    const loader = document.getElementById('loader');
    const content = document.getElementById('content');
    loader.style.opacity = '0';
    setTimeout(() => loader.style.display = 'none', 500);
    content.style.opacity = '1';
    }, 1500); // 1.5s de loader
});


const buttons = document.querySelectorAll('.menu button');
const menu = document.getElementById('menu');
const menuToggle = document.getElementById('menuToggle');
const themeToggle = document.getElementById('themeToggle');

/* Tabs */
buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        localStorage.setItem('activeTab', btn.innerText);
        menu.classList.remove('show');
    });
});

/* Restore tab */
const activeTab = localStorage.getItem('activeTab');
if (activeTab) {
    buttons.forEach(btn => {
        if (btn.innerText === activeTab) btn.classList.add('active');
    });
}

/* Mobile menu */
menuToggle.addEventListener('click', () => {
    menu.classList.toggle('show');
});

/* Dark mode */
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') document.body.classList.add('dark');

themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    localStorage.setItem(
        'theme',
        document.body.classList.contains('dark') ? 'dark' : 'light'
    );
});


// Menu USER
const userMenu = document.getElementById('userMenu');
const userToggle = document.getElementById('userToggle');

// Toggle menu au clic
userToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    userMenu.classList.toggle('show');
});

// Fermer si clic ailleurs
document.addEventListener('click', () => {
    userMenu.classList.remove('show');
});

// Empêcher fermeture si clic dans le menu
userMenu.querySelector('.dropdown').addEventListener('click', (e) => {
    e.stopPropagation();
});


