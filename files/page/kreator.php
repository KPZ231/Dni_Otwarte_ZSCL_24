<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dni Otwarte ZSCL 2024 - Kreator Stron</title>
    <link rel="stylesheet" href="kreator.css">
    <!-- Dodanie arkuszy stylów dla Highlight.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <!-- and it's easy to individually load additional languages -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>

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
    </style>
</head>

<body>

    <div class="container split">
        <!-- Text area for Html Code  -->
        <pre><code class="language-html"><textarea id="htmlCode" placeholder="Type HTML code here" spellcheck="false" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea></code></pre>
        <!-- Text area for Css Code  -->
        <textarea id="cssCode" placeholder="Type CSS code here" spellcheck="false" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea>
        <!-- Text area for Javascript Code  -->
        <textarea id="javascriptCode" spellcheck="false" placeholder="Type JavaScript code here" oninput="update(0)" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}if(event.keyCode==8){update(1);}"></textarea>
    </div>  
    <div class="iframe-container split">
        <iframe id="viewer"></iframe>
    </div>

    <script>

        hljs.highlightAll();

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
                // Dodanie składniowego podświetlenia przy użyciu Highlight.js
                document.querySelectorAll('textarea').forEach((textarea) => {
                    hljs.highlightBlock(textarea);
                });
            } else if (i == 1) {
                let htmlCode = document.getElementById("htmlCode").value;
                let html = htmlCode.slice(0, htmlCode.length);
                document.getElementById("htmlCode").value = html;
                j = 1;
            }
        }
    </script>

</body>

</html>
