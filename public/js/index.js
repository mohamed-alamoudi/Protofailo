// home
window.addEventListener("load", function () {
    const text = document.querySelector(".text-home-opacity");
    text.classList.add("opacity");
});

window.addEventListener("load", function () {
    const img = document.querySelector(".image-home-opacity");
    img.classList.add("opacity");
});
// <!-- btn nav -->
const btNav = document.getElementById('btnav');
const navMenu = document.getElementById('navlist');

btNav.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});
// <!-- opacity -->
window.addEventListener("load", function () {
    const aa = document.querySelector(".nav-bar");
    aa.classList.add("opacity");
});

window.addEventListener("load", function () {
    const bb = document.querySelector(".titel");
    bb.classList.add("opacity");
});

window.addEventListener("load", function () {
    const cc = document.querySelectorAll(".card");
    cc.forEach(function (card) {
        card.classList.add("opacity");
    });
});

window.addEventListener("load", function () {
    const gg = document.querySelectorAll(".card2");
    gg.forEach(function (card2) {
        card2.classList.add("opacity");
    });
});

// about
function showSection(sectionId) {
    document.querySelectorAll('.content').forEach(div => {
        div.classList.remove('active');
    });

    document.getElementById(sectionId).classList.add('active');
}

const box = document.getElementById("box");

box.addEventListener("mousemove", (e) => {
    const rect = box.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateX = ((y - centerY) / centerY) * 10;
    const rotateY = ((x - centerX) / centerX) * 10;

    box.style.transform = `rotateX(${-rotateX}deg) rotateY(${rotateY}deg)`;
});

box.addEventListener("mouseleave", () => {
    box.style.transform = `rotateX(0deg) rotateY(0deg)`;
});

// protofailo
function copyLink(element) {
    const link = element.getAttribute("data-link");

    if (!link) {
        console.error("No data-link attribute found.");
        return;
    }

    navigator.clipboard.writeText(link).then(() => {
        let msg = element.nextElementSibling;
        while (msg && !msg.classList.contains("hidden")) {
            msg = msg.nextElementSibling;
        }

        if (msg && msg.id === "copiedMessage") {
            msg.classList.remove("hidden");
            msg.textContent = "Copied";

            setTimeout(() => {
                msg.classList.add("hidden");
                msg.textContent = "Link copied! ✅";
            }, 2000);
        }
    });
}