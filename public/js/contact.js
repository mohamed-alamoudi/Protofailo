document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const messageBox = document.getElementById("formMessage");

    form.addEventListener("submit", function (e) {
        // e.preventDefault();

        const formData = new FormData(form);

        const name = formData.get("name").trim();
        const phone = formData.get("phone").trim();
        const email = formData.get("email").trim();
        const msg = formData.get("message").trim();

        if (!name || !phone || !email || !msg) {
            messageBox.textContent = "Please fill in all fields.";
            return;
        }

        fetch("../php/process.php", {
            method: "POST",
            body: formData,
        })
            .then((res) => res.text())
            .then((text) => {
                messageBox.textContent = text;
                messageBox.classList.remove("text-red-500");
                messageBox.classList.add("text-green-600");

                form.reset();
            })
            .catch((err) => {
                messageBox.textContent = "Error occurred while sending.";
                messageBox.classList.remove("text-green-600");
                messageBox.classList.add("text-red-500");
            });
    });
});
