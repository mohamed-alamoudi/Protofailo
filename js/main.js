// btn nav bar
document.getElementById('nav_mobile_btn').addEventListener('click', function () {
    const target = document.getElementById('nav_mobile');
    if (target.classList.contains('show')) {
        target.classList.remove('show');
    } else {
        target.classList.add('show');
    }
});

// window.addEventListener('scroll', function () {
//     const text = document.querySelector('.text');
//     const textPosition = text.getBoundingClientRect().top;
//     const screenPosition = window.innerHeight / 1.19;

//     if (textPosition < screenPosition) {
//         text.classList.add('opacity');
//     }
// });