<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Code Editor</title>
  <link rel="stylesheet" href="kreator.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/pastel-on-dark.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/xml-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/html-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/xml/xml.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/css/css.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlmixed/htmlmixed.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/closebrackets.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchbrackets.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchtags.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/closetag.js"></script>
</head>

<body>
  <div id="pageName">
    <h1>Kreator Strony</h1>
    <form id="createForm" action="#" method="POST" onsubmit="return sendForm()">
      <input type="text" id="authorInput" name="author" placeholder="Imie i nazwisko twórcy..." maxlength="15">
      <br><br>
      <input type="text" id="pageNameInput" name="pageNameInput" placeholder="Nazwa Strony..." maxlength="15" spellcheck="false">
      <br><br>
      <input type="submit" value="Stwórz" name="submit">
    </form>
  </div>

  <div class="editor-container" id="mainCont" style="visibility: hidden">
    <div class="code-container">
      <div>
        <h3 style="font-family: pixel">Edytor Kodu HTML</h3>
        <hr style="width: 100%; border: 1px solid black" />
      </div>
      <div id="html-editor" class="code-editor cm-content" data-language="html" aria-autocomplete="list"></div>
      <div>
        <h3 style="font-family: pixel">Edytor Kodu CSS</h3>
        <hr style="width: 100%; border: 1px solid black" />
      </div>
      <div id="css-editor" class="code-editor"></div>
      <div id="toolbar">
        <input type="button" value="Pobierz Strone" name="download_page">
      </div>
    </div>
  </div>
  <div class="result-container" id="result-container" style="visibility: hidden;"></div>

  <script>
    function loadEditor() {
      var editor = document.getElementById("mainCont");
      var result = document.getElementById("result-container");
      var pageCreator = document.getElementById("pageName");

      editor.style.visibility = "visible";
      result.style.visibility = "visible";
      pageCreator.style.visibility = "hidden";
    }

    var htmlEditor = CodeMirror(document.getElementById("html-editor"), {
      mode: "text/html",
      value: "<!DOCTYPE html> \n<html> \n  <head> \n  </head> \n  <body> \n   <h1>Hello, world!</h1> \n  </body> \n</html> \n",
      theme: "pastel-on-dark",
      lineNumbers: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete"
      },
      autoCloseBrackets: true,
      autoCloseTags: true,
      hintOptions: {
        hint: CodeMirror.hint.html,
        className: "CodeMirror-hints",
      },
    });

    var cssEditor = CodeMirror(document.getElementById("css-editor"), {
      mode: "css",
      theme: "pastel-on-dark",
      value: "/* Tutaj Pisz Kod CSS */ \n body{ \n\n }",
      lineNumbers: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete"
      },
      autoCloseBrackets: true,
      autoCloseTags: true,
      hintOptions: {
        hint: CodeMirror.hint.css,
        className: "CodeMirror-hints",
      },
    });

    var resultContainer = document.getElementById("result-container");

    function updateResult() {
      var htmlCode = htmlEditor.getValue();
      var cssCode = cssEditor.getValue();
      resultContainer.innerHTML = htmlCode + "<style>" + cssCode + "</style>";
    }

    htmlEditor.on("change", updateResult);
    cssEditor.on("change", updateResult);

    // Initial update
    updateResult();

    function generateID() {
      // This function generates a unique ID, you can implement your own logic here
      return '_' + Math.random().toString(36).substr(2, 9);
    }

    function sendForm() {
      var author = document.getElementById('authorInput').value;
      var pageName = document.getElementById('pageNameInput').value;
      
      // Tworzymy obiekt danych JSON z wartościami z formularza
      var data = {
        author: author,
        pageName: pageName
      };

      var jsonData = JSON.stringify(data); // Przypisanie danych do zmiennej jsonData

      // Generowanie unikalnej nazwy pliku z timestampem
      var timestamp = new Date().getTime();
      var fileName = 'data_' + timestamp + '.json';

      // Zapisz dane do pliku JSON na serwerze
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log("JSON data saved successfully.");
          } else {
            console.error("Failed to save JSON data.");
          }
        }
      };

      xhr.open('POST', 'kreator.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.send(JSON.stringify({fileName: fileName, jsonData: jsonData}));

      return false; // Prevent form submission
    }


  </script>
</body>

</html>
