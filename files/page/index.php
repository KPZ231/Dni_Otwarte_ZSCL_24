<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Dni Otwarte ZSCL 2024 - Kreator Stron</title>
</head>
<body>

<h1 style="text-align:center; font-size: 34pt;">Witamy!</h1>
<h2 style="text-align:center; font-size: 24pt;">W Kreatorze Stron Internetowych ZSCL...</h2>
<h3 style="text-align:center; font-size: 14pt;">Mam Nadzieje Że Ta Przygoda Będzie Dla Ciebie Jak Najwygodniejsza Jak To Możlwe!</h3>

<div id="container">
    <button class="button-30" role="button" onclick="windowChange('kreator.html')">Kreator</button>
</div>

<a href="https://www.zscl.pl/pl/" id="zscl_logo"></a>

<footer>
    Strona Wykonana Przez: Kacper Duda 2TP
    <br>
    Na Licencji CC0 1.0 Universal
</footer>    

<script>
    function windowChange(windowName){
        window.location.href = `./${windowName}`
    }
</script>

</body>
</html>