const codeBar = document.getElementById('code-bar');

const codeLines = [
    [
        { type: 'tag', content: '<h1>' },
        { type: 'top_text', content: ' Hi 🥰 ' },
        { type: 'tag', content: '</h1>' }
    ],
    [
        { type: 'tag', content: '<p>' },
        { type: 'top_text', content: ' I’m Mohammed, currently studying Information ' }
    ],
    [
        { type: 'top_text', content: '  Technology at the Islamic University in Gaza. ' },
        { type: 'tag', content: '</p>' }
    ]
    ,
    [
        { type: 'tag', content: '<p>' },
        { type: 'top_text', content: ' I have worked on several projects that ' },],
    [
        { type: 'top_text', content: '  reflect the quality of my work and my experience. ' },
    ],
    [
        { type: 'top_text', content: ' Feel free to contact me anytime. ' },
        { type: 'tag', content: '</p>' }
    ]
];

let currentLine = 0;
let currentChar = 0;
let currentPartIndex = 0;
let currentPartCharIndex = 0;

function type() {
    if (currentLine >= codeLines.length) {
        const cursor = document.createElement('span');
        cursor.className = 'cursor';
        codeBar.appendChild(cursor);
        return;
    }

    const line = codeLines[currentLine];
    if (currentPartIndex >= line.length) {
        codeBar.appendChild(document.createTextNode('\n'));
        currentLine++;
        currentPartIndex = 0;
        currentPartCharIndex = 0;
        setTimeout(type, 300);
        return;
    }

    const part = line[currentPartIndex];
    if (currentPartCharIndex < part.content.length) {
        let span;

        const lastChild = codeBar.lastChild;
        if (!lastChild || !lastChild.classList || lastChild.className !== part.type) {
            span = document.createElement('span');
            span.className = part.type;
            codeBar.appendChild(span);
        } else {
            span = lastChild;
        }

        span.textContent += part.content.charAt(currentPartCharIndex);
        currentPartCharIndex++;
        setTimeout(type, 50);
    } else {
        currentPartIndex++;
        currentPartCharIndex = 0;
        setTimeout(type, 50);
    }
}

type();