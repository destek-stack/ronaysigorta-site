// ===================================
// MOBILE MENU TOGGLE
// ===================================

const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const navMenu = document.getElementById('navMenu');

if (mobileMenuToggle && navMenu) {
    mobileMenuToggle.addEventListener('click', () => {
        mobileMenuToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close menu when clicking on a link
    const navLinks = navMenu.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenuToggle.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
            mobileMenuToggle.classList.remove('active');
            navMenu.classList.remove('active');
        }
    });
}

// ===================================
// NAVBAR SCROLL EFFECT
// ===================================

const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// ===================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ===================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        // Only prevent default if it's not just "#"
        if (href !== '#') {
            e.preventDefault();
            const target = document.querySelector(href);

            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        }
    });
});

// ===================================
// ACTIVE NAV LINK ON SCROLL
// ===================================

const sections = document.querySelectorAll('section[id]');

function highlightNavLink() {
    const scrollY = window.pageYOffset;

    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 100;
        const sectionId = section.getAttribute('id');
        const navLink = document.querySelector(`.nav-link[href*="${sectionId}"]`);

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            if (navLink) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                navLink.classList.add('active');
            }
        }
    });
}

window.addEventListener('scroll', highlightNavLink);

// ===================================
// INTERSECTION OBSERVER FOR ANIMATIONS
// ===================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all service cards and other animated elements
const animatedElements = document.querySelectorAll('.service-card, .contact-card, .about-wrapper');
animatedElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// ===================================
// FORM VALIDATION (for contact page)
// ===================================

const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.getElementById('name');
        const phone = document.getElementById('phone');
        const email = document.getElementById('email');
        const message = document.getElementById('message');

        let isValid = true;

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.remove());

        // Name validation
        if (name && name.value.trim().length < 2) {
            showError(name, 'Lütfen geçerli bir isim girin');
            isValid = false;
        }

        // Phone validation
        if (phone && !isValidPhone(phone.value)) {
            showError(phone, 'Lütfen geçerli bir telefon numarası girin');
            isValid = false;
        }

        // Email validation
        if (email && !isValidEmail(email.value)) {
            showError(email, 'Lütfen geçerli bir e-posta adresi girin');
            isValid = false;
        }

        // Message validation
        if (message && message.value.trim().length < 10) {
            showError(message, 'Mesajınız en az 10 karakter olmalıdır');
            isValid = false;
        }

        if (isValid) {
            // Show success message
            showSuccessMessage();
            contactForm.reset();
        }
    });
}

function showError(input, message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.style.color = '#ef4444';
    errorDiv.style.fontSize = '14px';
    errorDiv.style.marginTop = '5px';
    errorDiv.textContent = message;
    input.parentElement.appendChild(errorDiv);
    input.style.borderColor = '#ef4444';
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidPhone(phone) {
    const re = /^(\+90|0)?[5][0-9]{9}$/;
    return re.test(phone.replace(/\s/g, ''));
}

function showSuccessMessage() {
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 20px 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        animation: slideIn 0.5s ease;
    `;
    successDiv.innerHTML = `
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-check-circle" style="font-size: 24px;"></i>
            <div>
                <strong>Mesajınız Gönderildi!</strong>
                <p style="margin: 5px 0 0 0; font-size: 14px; opacity: 0.9;">En kısa sürede size dönüş yapacağız.</p>
            </div>
        </div>
    `;

    document.body.appendChild(successDiv);

    setTimeout(() => {
        successDiv.style.animation = 'slideOut 0.5s ease';
        setTimeout(() => successDiv.remove(), 500);
    }, 4000);
}

// Add animations to stylesheet
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ===================================
// PAGE LOAD ANIMATION
// ===================================

window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// ===================================
// PREVENT FLASH OF UNSTYLED CONTENT
// ===================================

document.addEventListener('DOMContentLoaded', () => {
    document.body.style.visibility = 'visible';
});
