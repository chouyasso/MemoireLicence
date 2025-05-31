document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.navigation');
    const navLinks = document.querySelectorAll('.navigation a');

   
    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });


    menuToggle.addEventListener('click', () => {
        navigation.classList.toggle('open');
    });

   
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            navigation.classList.remove('open');
        });
    });


    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

  
    document.querySelectorAll('.info-card, .info-block, .doctor-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.8s ease-out';
        observer.observe(el);
    });
});