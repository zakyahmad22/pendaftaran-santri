// Pendaftaran Start
document.addEventListener("DOMContentLoaded", () => {
    const heroText = document.getElementById("heroText");
    const heroImage = document.getElementById("heroImage");

  // Tambahkan animasi setelah halaman dimuat
    setTimeout(() => {
    heroText.classList.remove("opacity-0", "translate-y-10");
    heroImage.classList.remove("opacity-0", "translate-y-10");
    }, 200);
});
// Pendaftaran End

// Tentang Kami Start
document.addEventListener("DOMContentLoaded", function () {
    const targets = document.querySelectorAll("[data-animate]");

    const observer = new IntersectionObserver(
        (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-10");
            entry.target.classList.add("opacity-100", "translate-y-0");
            observer.unobserve(entry.target);
            }
        });
        },
        {
        threshold: 0.1,
        }
    );

    targets.forEach((target) => {
        observer.observe(target);
    });
});
// Tentang Kami End

// Sejarah Start
document.addEventListener("DOMContentLoaded", function () {
    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver(
        (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
            entry.target.classList.add("active");
            observer.unobserve(entry.target); // hanya muncul sekali
            }
        });
        },
        {
        threshold: 0.2, // Muncul saat 20% elemen terlihat
        }
    );

    reveals.forEach((el) => observer.observe(el));
});
// Sejarah End

// Falsafah Start
        document.addEventListener("DOMContentLoaded", function () {
        const reveals = document.querySelectorAll(".reveal");

        const observer = new IntersectionObserver(
            (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target); // animasi muncul sekali aja
                }
            });
            },
            {
            threshold: 0.2,
            }
        );

        reveals.forEach((el) => observer.observe(el));
    });
// Falsafah End

// Client Start
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-up');
            observer.unobserve(entry.target);
        }
        });
    }, {
        threshold: 0.1
    });

    reveals.forEach(reveal => {
        observer.observe(reveal);
    });
// Client End
