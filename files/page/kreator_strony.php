<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<style>

@font-face {
    font-family: pixel;
    src: url(joystix_monospace.woff);
}

body {
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

#pageName {
    margin: auto;
    color: white;
    font-family: pixel;
    width: 20%;
    height: 20vh;
    top: 50%;
    left: 50%;
    transform:translate(-50%, -50%);
    background-color:darkslateblue;
    position: absolute;
    text-align: center;
    box-shadow: rgba(148, 35, 163, 0.3) 5px 5px;
    
}

#pageName input{
    font-family: pixel;
    width: 80%;
    height: 15%;
    
}

</style>


<div id="pageName">
    <h1>Kreator Strony</h1>
    <form id="createForm" action="" method="POST">
      <input type="text" id="authorInput" name="author" placeholder="Imie i nazwisko twórcy..." maxlength="15">
      <br><br>
      <input type="text" id="pageNameInput" name="pageNameInput" placeholder="Nazwa Strony..." maxlength="15" spellcheck="false">
      <br><br>
      <input type="submit" value="Stwórz" name="submit">
    </form>
  </div>


  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function generate_unique_id() {
        return uniqid(); // Funkcja generująca unikalny identyfikator
    }

    function get_data() {
        $data = json_decode(file_get_contents("kreator.json"), true); // Wczytaj istniejące dane z pliku JSON, jeśli istnieją
        $unique_id = generate_unique_id();
        $data[] = array(
            'ID' => $unique_id, // Generuj unikalny identyfikator
            'Name' => $_POST['author'],
            'PageName' => $_POST['pageNameInput'],
        );
        setcookie('unique_id', $unique_id, time() + (86400 * 30), "/"); // Ustaw ciasteczko z unikalnym identyfikatorem na 30 dni
        return json_encode($data, JSON_PRETTY_PRINT); // Kodowanie danych do formatu JSON
    }

    $file_name = "kreator.json";

    if (file_put_contents($file_name, get_data(), LOCK_EX)) { // Zapisz dane do pliku JSON
        echo 'Data added to ' . $file_name;
        // Przekierowanie po zakończeniu przetwarzania formularza
        header("Location: kreator.php"); // Zmień success.php na nazwę docelowej strony
        exit();
    } else {
        echo 'There is some error';
    }
}
?>



    
</body>
</html>