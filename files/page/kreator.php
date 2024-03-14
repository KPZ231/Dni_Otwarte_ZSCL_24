<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Code Editor</title>

    <link rel="stylesheet" href="kreator.css">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/pastel-on-dark.min.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/xml-hint.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/html-hint.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/xml/xml.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/css/css.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlmixed/htmlmixed.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/closebrackets.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchbrackets.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/matchtags.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/edit/closetag.js"></script>
  </head>
  <body>

    <div id="pageName">
      <h1>Kreator Strony</h1>
      <input type="text" name="author" placeholder="Imie i nazwisko twórcy..." maxlength="15">
      <br><br>
      <input type="text" name="pageNameInput" placeholder="Nazwa Strony..." maxlength="15" spellcheck="false">
      <br><br>
      <input type="submit" value="Stwórz">
    </div>

    <div class="editor-container" id="mainCont" style="visibility: hidden">
      <div class="code-container">
        <div>
          <h3 style="font-family: pixel">Edytor Kodu HTML</h3>
          <hr style="width: 100%; border: 1px solid black" />
        </div>
        <div
          id="html-editor"
          class="code-editor cm-content"
          data-language="html"
          aria-autocomplete="list"></div>
        <div>
          <h3 style="font-family: pixel">Edytor Kodu CSS</h3>
          <hr style="width: 100%; border: 1px solid black" />
        </div>
        <div id="css-editor" class="code-editor"></div>

        <div id="toolbar">
          <input type="button" value="Pobierz Strone" name="download_page">

          <?php
            $login = "25262152_duda";
            $database = "25262152_duda";
            $pass = "!K@Duda!";
            $host = "serwer1704623.home.pl";


            $conn = mysqli_connect($host, $login, $pass, $database);
          ?>
        </div>
      </div>
    </div>
    <div class="result-container" id="result-container" style="visibility: hidden;"></div>

    <script>



      
      window.onload = function(){
          var htmlEditor = CodeMirror(document.getElementById("html-editor"), {
            mode: "text/html",
            value: "<!DOCTYPE html> \n<html> \n  <head> \n  </head> \n  <body> \n   <h1>Hello, world!</h1> \n  </body> \n</html> \n",
            theme: "pastel-on-dark",
            lineNumbers: true,
            extraKeys: { "Ctrl-Space": "autocomplete" },
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
          extraKeys: { "Ctrl-Space": "autocomplete" },
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
      }
      
    </script>
  </body>
</html>