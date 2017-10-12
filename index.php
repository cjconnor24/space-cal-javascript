<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Space Calculator</title>
    <link rel="stylesheet" href="/css/styles.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div id="page">

    <div class="instructions">

        <div class="help"><a href="#" id="help-button">X</a></div>

        <h1>Space Calulator Instrutions</h1>
        <ol>
            <li>Enter the age.</li>
            <li>Choose the unit - years, days, seconds.*</li>
            <li>Choose the planet.</li>
            <li>Click "Calculate".</li>
        </ol>

        <p>* <em><strong>Note:</strong></em> days and seconds are only availble with Earth.</p>
    </div>

    <div class="wrapper">

        <div id="display"><span id="numbers"></span><span id="units">seconds</span> <span id="planet"></span><span id="placeholder">Enter your age</span></div>

    </div>

    <div class="wrapper">

        <div class="numeric">

            <div>
            <?php for($i=1;$i<10;$i++){
                echo "<a href='#' class='digit'>$i</a>";
            } ?>

            <a href="#" class="digit">0</a>

            </div>

            <a href="#" id="clear-button">C</a>

            <div>

            <a href="#" class="units" id="days-button">Years</a>
            <a href="#" class="units" id="minutes-button">Days</a>
            <a href="#" class="units" id="seconds-button">Seconds</a>

            </div>

            <a href="#"id="calculate-button" >Calculate</a>

        </div>

        <div class="planets">

            <?php
            $planets = ['Mercury','Venus','Earth','Mars','Jupiter','Saturn','Uranus','Neptune','Pluto'];

            foreach($planets as $planet){
                echo "<a href='#' class='planet ".strtolower($planet)."'>$planet</a>";
            }

            ?>
            <div class="clear"></div>
            <div id="results">
                Results will appear here...
            </div>

        </div>

    </div>

</div>

<p class="copyright">Chris Connor &copy; <?php echo date('Y'); ?></p>
<p><a href="http://www.freepik.com/free-vector/sun-and-planets-background-in-flat-design_1239653.htm" target="_blank">Designed by Freepik</a></p>
<script src="/js/scripts.js"></script>

</body>
</html>