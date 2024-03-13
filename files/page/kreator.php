<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Code Editor</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/dracula.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.min.css">
<style>

    @font-face {
    font-family: pixel;
    src: url(joystix_monospace.woff);
    }

    body {
        font-family: pixel;
        margin: 0;
        padding: 0;
        display: flex;
    }
    .editor-container {
        background-color: #f4f4f4;
        flex: 1;
        display: flex;
        height: 100vh;
        flex-direction: column;
    }
    .code-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 10px;
        box-sizing: border-box;
    }
    .code-editor {
        flex: 1;
        border: none;
        padding: 10px;
        font-family: monospace;
        font-size: 16px;
        background-color: #f8f8f8;
        resize: none;
    }
    .result-container {
        flex: 1;
        padding: 10px;
        box-sizing: border-box;
        overflow: auto;
    }
</style>
</head>
<body>
<div class="editor-container">
    <div class="code-container">
        <div>
            <h3>Edytor Kodu HTML</h3>
            <hr style="width: 100%; border: 1px solid black;">
        </div>
        <textarea class="code-editor" id="html-editor" placeholder="Place your HTML code here..."></textarea>
        <div>
            <h3>Edytor Kodu CSS</h3>
            <hr style="width: 100%; border: 1px solid black;">
        </div>
        <textarea class="code-editor" id="css-editor" placeholder="Place your CSS code here..."></textarea>
    </div>
</div>
<div class="result-container" id="result-container"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/html-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/css-hint.min.js"></script>

<script>
    var htmlEditor = CodeMirror.fromTextArea(document.getElementById("html-editor"), {
        mode: "xml",
        theme: "dracula",
        lineNumbers: true,
        extraKeys: { "Ctrl-Space": "autocomplete" }
    });

    var cssEditor = CodeMirror.fromTextArea(document.getElementById("css-editor"), {
        mode: "css",
        theme: "dracula",
        lineNumbers: true,
        extraKeys: { "Ctrl-Space": "autocomplete" }
    });

    var resultContainer = document.getElementById("result-container");

    function updateResult() {
        var htmlCode = htmlEditor.getValue();
        var cssCode = cssEditor.getValue();
        resultContainer.innerHTML = htmlCode + '<style>' + cssCode + '</style>';
    }

    htmlEditor.on("change", updateResult);
    cssEditor.on("change", updateResult);

    // Initial update
    updateResult();
</script>
</body>
</html>
