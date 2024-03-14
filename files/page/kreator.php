<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< Updated upstream
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dni Otwarte ZSCL 2024 - Kreator Stron</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/1.0.0/split.min.js" integrity="sha512-tTsZnBXEzNdEaqUO9Ok8fUofS73xieiBa54pD/sxOSvayIgItM9MmEM0CnUjA13LDnJT22sfwmjf20+Bo2174g==" crossorigin="anonymous">
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
        }

        .container {
            background: #E7E7E7;
            display: flex;
            flex-direction: column;
            width: 50%;
            height: 100vh;
            margin: 3px;

        }

        .container textarea {
            background-color: #121212;
            border: 1px solid #0dddf0;
            resize: none;
            width: 100%;
            height: 33.333%;
            font-size: 1.4rem;
            padding: 10px;
            resize: vertical;
            overflow-y: scroll;
            color: white;
        }

        .container textarea:focus {
            outline: none;
            color: white;
        }

        .iframe-container {
            background: white;
            width: 50%;
            height: 100vh;
            margin: 3px;
        }

        #viewer {
            width: 100%;
            height: 100%;
        }

        .split {
            width: 100%;
            height: 100%;
        }

        .gutter {
            cursor: e-resize;
            height: 100%;
            background: grey;
        }

        .gutter.gutter-horizontal {
            cursor: ew-resize;
        }
    </style>
</head>

<body>
    <!-- <div id="editor">
        <div id="html-tab" onclick="changeTab('html')">HTML</div>
        <div id="css-tab" onclick="changeTab('css')">CSS</div>
        <textarea id="code" autofocus>
        </textarea>
    </div>
    <div id="output"></div>

    <script>
        function changeTab(tab) {
            var htmlTab = document.getElementById('html-tab');
            var cssTab = document.getElementById('css-tab');

            if (tab === 'html') {
                htmlTab.style.borderBottom = '2px solid black';
                cssTab.style.borderBottom = '2px solid #ccc';
            } else {
                htmlTab.style.borderBottom = '2px solid #ccc';
                cssTab.style.borderBottom = '2px solid black';
            }
        }

        var codeTextArea = document.getElementById('code');
        var outputDiv = document.getElementById('output');

        codeTextArea.addEventListener('input', function () {
            outputDiv.innerHTML = codeTextArea.value;
        });
    </script> -->

    <div class="container split">
        <!-- Text area for Html Code  -->
        <textarea id="htmlCode" placeholder="Type HTML code here" spellcheck="false" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea>
        <!-- Text area for Css Code  -->
        <textarea id="cssCode" placeholder="Type CSS code here" spellcheck="false" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea>
        <!-- Text area for Javascript Code  -->
        <textarea id="javascriptCode" spellcheck="false" placeholder="Type JavaScript code here" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea>
    </div>
    <div class="iframe-container split">
        <iframe id="viewer"></iframe>
    </div>

    <script>
        var j = 0;
        //Function for live Rendering
        function update(i) {
            if (i == 0) {
                let htmlCode = document.getElementById("htmlCode").value;
                let cssCode = document.getElementById("cssCode").value;
                let javascriptCode = document.getElementById("javascriptCode").value;
                let text = htmlCode + "<style>" + cssCode + "</style>" + "<scri" + "pt>" + javascriptCode + "</scri" + "pt>";
                let iframe = document.getElementById('viewer').contentWindow.document;
                iframe.open();
                iframe.write(text);
                iframe.close();
            } else if (i == 1) {

                let htmlCode = document.getElementById("htmlCode").value;
                let html = htmlCode.slice(0, htmlCode.length);
                document.getElementById("htmlCode").value = html;
                j = 1;

            }
        }
    </script>
=======
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
    <form id="createForm" action="kreator.php" method="GET">
      <input type="text" name="author" placeholder="Imie i nazwisko twórcy..." maxlength="15">
      <br><br>
      <input type="text" name="pageNameInput" placeholder="Nazwa Strony..." maxlength="15" spellcheck="false">
      <br><br>
      <input type="submit" value="Stwórz" name="submit">
    </form>

  </div>


  <?php

  error_reporting(0);

  $login = "root";
  $database = "dni_otwarte";
  $pass = "";
  $host = "localhost";

  $conn = mysqli_connect($host, $login, $pass, $database);



  if (isset($_GET['submit'])) {
    $name = $_GET['author'];
    $page = $_GET['pageNameInput'];

    $ins_1 = mysqli_query($conn, "INSERT INTO uzytkownicy VALUES (0, '$name')");
    $ins_2 = mysqli_query($conn, "INSERT INTO strona (id, nazwa) VALUES (0, '$page')");
  }

  mysqli_close($conn);
  ?>

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

    window.onload = function() {
      var form = document.getElementById("createForm");
      form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        loadEditor(); // Call your function to load the editor
      });

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
    }
  </script>
>>>>>>> Stashed changes
</body>

</html>