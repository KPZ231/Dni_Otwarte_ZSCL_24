<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dni Otwarte ZSCL 2024 - Kreator Stron</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
        }

        #code{
            outline: none;
            resize: none;
            width: 100%;
            margin-top: 10px;
            height: 85%;
        }

        #editor {
            
            width: 30%;
            height: 100%;
            background-color: #f4f4f4;
            overflow: auto;
            padding: 20px;
        }

        #html-tab {
            border-bottom: 2px solid #ccc;
            cursor: pointer;
            padding: 10px 20px;
        }

        #css-tab {
            border-bottom: 2px solid #ccc;
            cursor: pointer;
            padding: 10px 20px;
        }

        #output {
            width: 50%;
            height: 100%;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="editor">
        <div id="html-tab" onclick="changeTab('html')">HTML</div>
        <div id="css-tab" onclick="changeTab('css')">CSS</div>
        <textarea id="code" autofocus>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
            
    </body>
</html>

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
    </script>
</body>

</html>