<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haweytech_wel.com</title>
    <link rel="stylesheet" href="haweycss.css">
    <style>
        
    </style>
</head>
<body>
     
    <header>
        <img src="images_1/Gmylogoview.png" alt="myLOGO">     
            <p>Here is <b>HAWEYTECH</b><br>
                <i>(With an</i> HiTech <i>views!)</i></p>
                    <pre class="hdtext">
            Research,Innovation and 
            Invention for Better 
            Technological Existence..!!
                </pre> 
                <ul class="h3-margin-left h3-large">
                    <li class="h3-hide-medium h3-hide-large h3-opennav dclor">
                        <a href="javascript:void(0);" onclick="myFunction()">☰</a>
                    </li>
                        <li class="lideco h3-hide-small"><a href="#">ABOUT US</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="#">CONTACTS</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="#">OUR PROGRAMMS</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="trash.html">FAQS</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="#">JOBS</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="#">BUSINESS</a></li>&nbsp;
                        <li class="lideco h3-hide-small"><a href="tocheck.html">MORE...!</a></li>
                    </ul>
                
                <hr>
        </header>
    
        <div id="demo" class="h3-hide h3-hide-large h3-hide-medium">
            <ul class="h3-navbar h3-large dclor">
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">CONTACTS</a></li>
            <li><a href="#"OUR PROGRAMMS></a></li>
            <li><a href="#">FAQS</a></li>
            <li><a href="#">JOBS</a></li>
            <li><a href="#">BUSINESS</a></li>
            <li><a href="#">MORE...!</a></li>
        </ul>
        </div>
    <script>
        function myFunction() {
                var x = document.getElementById("demo");
                if (x.className.indexOf("h3-show") == -1) {
                    x.className += " h3-show";
                } else { 
                    x.className = x.className.replace(" h3-show", "");
                }
        }
    </script>
</body>
</html>