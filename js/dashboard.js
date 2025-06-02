function showContent(type) {
    document.getElementById('homed').style.display = 'none';
    document.getElementById('contentc').style.display = 'none';
    document.getElementById('contentp').style.display = 'none';
    document.getElementById('contentb').style.display = 'none';

    if (type === 'c') {
        document.getElementById('contentc').style.display = 'block';
    } else if (type === 'b') {
        document.getElementById('contentb').style.display = 'block';
    } else if (type === 'p') {
        document.getElementById('contentp').style.display = 'block';
    }

    sessionStorage.setItem('selected', type);
}

window.onload = function () {
    const selected = sessionStorage.getItem('selected');
    if (selected) {
        showContent(selected);
    } else {
        document.getElementById('homed').style.display = 'block';
    }
};
