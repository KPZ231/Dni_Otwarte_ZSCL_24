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
  <style>
    /* Przykładowy styl retro dla przycisku zapisz */
    .save-button {
      background-color: #FFD700;
      border: none;
      color: black;
      padding: 15px 32px;
      text-align: center;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <div class="editor-container" id="mainCont">
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
      <!-- Poprawiony przycisk "Zapisz" -->
      <button class="save-button" id="saveButton">Zapisz</button>
    </div>
  </div>

  <form id="saveForm" method="POST" action="kreator.php">
    <input type="hidden" id="html" name="html">
    <input type="hidden" id="css" name="css">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['html']) && isset($_POST['css'])) {
      function save_data($html, $css) {
          $data = json_decode(file_get_contents("kreator.json"), true); // Wczytaj istniejące dane z pliku JSON, jeśli istnieją
          
          // Pobierz ciasteczko o nazwie 'unique_id'
          $unique_id = $_COOKIE['unique_id'] ?? uniqid(); // Generuj unikalny identyfikator, jeśli ciasteczko nie istnieje
          setcookie('unique_id', $unique_id, time() + (86400 * 30), "/"); // Ustaw ciasteczko z unikalnym identyfikatorem na 30 dni

          // Znajdź indeks istniejącego elementu z tym samym ID, jeśli istnieje
          $found_index = -1;
          foreach ($data as $index => $item) {
              if ($item['ID'] == $unique_id) {
                  $found_index = $index;
                  break;
              }
          }

          // Dodaj lub zaktualizuj dane
          if ($found_index !== -1) {
              $data[$found_index]['HTML'] = $html;
              $data[$found_index]['CSS'] = $css;
          } else {
              $data[] = array(
                  'ID' => $unique_id, // Użyj istniejącego lub nowo wygenerowanego unikalnego identyfikatora
                  'HTML' => $html,
                  'CSS' => $css,
              );
          }

          // Zapisz dane do pliku JSON
          $file_name = "kreator.json";
          if (file_put_contents($file_name, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX)) {
              echo 'Data added to ' . $file_name;
              // Przekierowanie po zakończeniu przetwarzania formularza
              header("Location: kreator.php"); // Zmień success.php na nazwę docelowej strony
              exit();
          } else {
              echo 'There is some error';
          }
      }

      // Pobierz dane z POST
      $html = $_POST['html'];
      $css = $_POST['css'];
      
      // Wywołanie funkcji save_data
      save_data($html, $css);
  }
  ?>

  <div class="result-container" id="result-container"></div>

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

    // Funkcja do zapisywania danych
    function saveData() {
      var htmlValue = htmlEditor.getValue(); // Pobranie wartości z edytora HTML
      var cssValue = cssEditor.getValue(); // Pobranie wartości z edytora CSS
      
      // Ustawienie wartości pól formularza
      document.getElementById('html').value = htmlValue;
      document.getElementById('css').value = cssValue;
      
      // Wysłanie formularza
      document.getElementById('saveForm').submit();
    }

    // Ustawienie nasłuchiwania na kliknięcie przycisku "Zapisz"
    document.getElementById('saveButton').addEventListener('click', saveData);

    // Initial update
    updateResult();

  </script>

</body>

</html>
