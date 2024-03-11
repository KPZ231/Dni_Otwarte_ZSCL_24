<!DOCTYPE html>
<html lang="en">

<head>
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
</body>

</html>