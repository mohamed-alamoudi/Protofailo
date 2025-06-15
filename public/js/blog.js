function editPost(post) {
    document.getElementById('id').value = post[0];
    document.getElementById('current_image').value = post[1];
    document.getElementById('name').value = post[2];
    document.getElementById('role').value = post[3];
    document.getElementById('text').value = post[4];
    document.getElementById('whatsapp').value = post[5];
    document.getElementById('instagram').value = post[6];
    document.getElementById('linkedin').value = post[7];
    window.scrollTo(0, 0);
}