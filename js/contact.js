document.getElementById('message').addEventListener('submit', function (e) {
    e.preventDefault();
    console.log('Ok Submit');

    const data = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone_number').value,
        message: document.getElementById('textarea').value
    };

    fetch('../php/contact_data.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
        .then(res => res.json())
        .then(response => {
            // alert('Data saved successfully!');
            console.log('Data saved successfully!');
            document.getElementById('message').reset();
        })
        .catch(error => {
            // alert('An error occurred while sending.');
            console.log('An error occurred while sending.');
            console.error(error);
        });
});
