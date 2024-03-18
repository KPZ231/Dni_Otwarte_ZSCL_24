<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Dni warte ZSCL 2024 - Kreator Stron</title>
</head>

<body>

    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>


    <div id="cont">
        <h1 style="text-align:center; font-size: 34pt; font-weight: 100;">Witamy!</h1>
        <h2 style="text-align:center; font-size: 24pt;">W Kreatorze Stron Internetowych ZSCL...</h2>
        <h3 style="text-align:center; font-size: 14pt;">Mam Nadzieje Że Ta Przygoda Będzie Dla Ciebie Jak Najwygodniejsza Jak To Możlwe!</h3>
    </div>


    <div id="container">
        <button class="button-30" role="button" onclick="windowChange('kreator_strony.php')">Kreator</button>
    </div>

    <div id="stronyInternetowe"></div>

    <a href="https://www.zscl.pl/pl/" id="zscl_logo"></a>

    <footer>
        Strona Wykonana Przez: Kacper Duda 2TP
        <br>
        Na Licencji CC0 1.0 Universal
    </footer>

    <script>
        function windowChange(windowName) {
            window.location.href = `./${windowName}`;
        }

        fetch('kreator.json')
            .then(response => response.json())
            .then(data => {
                const stronyInternetoweDiv = document.getElementById('stronyInternetowe');
                data.forEach(strona => {
                    const div = document.createElement('div');
                    div.id = 'website'; // Nadajemy ID divowi na podstawie ID pobranego z pliku JSON
                    const h1 = document.createElement('h1');
                    const a = document.createElement('a');
                    a.href = `kreator.php?pageId=${strona.ID}`; // Ustawiamy link na kreator.php z odpowiednim ID strony
                    a.textContent = strona.PageName;
                    h1.appendChild(a);
                    div.appendChild(h1);
                    stronyInternetoweDiv.appendChild(div);
                });
            })
            .catch(error => console.error('Błąd pobierania danych:', error));
    </script>

</body>

</html>
