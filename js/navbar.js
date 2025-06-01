// btn nav bar
document.getElementById('nav_mobile_btn').addEventListener('click', function () {
    const target = document.getElementById('nav_mobile');
    if (target.classList.contains('show')) {
        target.classList.remove('show');
    } else {
        target.classList.add('show');
    }
});