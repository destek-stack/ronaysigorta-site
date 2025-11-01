// ===================================
// STATS COUNTER ANIMATION
// ===================================

function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = Math.floor(target).toLocaleString('tr-TR');
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString('tr-TR');
        }
    }, 16);
}

// Intersection Observer for stats
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number');

            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-target'));
                animateCounter(stat, target);
            });

            statsObserver.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.5
});

// Observe stats section
const statsSection = document.querySelector('.stats-section');
if (statsSection) {
    statsObserver.observe(statsSection);
}
