async function askAI() {
    const question = document.getElementById("user-question").value.trim();
    const responseBox = document.getElementById("ai-response");

    if (!question) {
        responseBox.innerHTML = "Please enter a question.";
        return;
    }

    responseBox.innerHTML = "Your question is being processed...";

    try {
        const response = await fetch("../php/api.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ question })
        });

        const data = await response.json();

        if (data.error) {
            responseBox.innerHTML = "error" + data.error;
        } else {
            responseBox.innerHTML = data.choices[0].message.content;
        }
    } catch (error) {
        responseBox.innerHTML = "Failed to connect to the server.";
    }
}