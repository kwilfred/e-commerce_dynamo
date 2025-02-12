<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/slider.css">
</head>
<body>
    <div id="slider">
        <div class="list">
            <div class="item">
                <img src="../images/slider/a.jpg">
            </div>
            <div class="item">
                <img src="../images/slider/b.jpg">
            </div>
            <div class="item">
                <img src="../images/slider/d.jpg">
            </div>
            <div class="item">
                <img src="../images/slider/e.jpg">
            </div>
            <div class="item">
                <img src="../images/slider/f.jpg">
            </div>
        </div>
        <!-- Buttons #prev #next -->
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- Dots If(5 list => 5 dots) -->
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <script src="index.js"></script>
</body>
</html>