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

    <div class="wrapper">

<!--        <input type="text" value="" placeholder="Enter age" class="display" />-->

        <div id="display"><span id="numbers"></span><span id="units"></span><span id="placeholder">Enter your age</span></div>

    </div>

    <div class="wrapper">

        <div class="numeric">

            <?php for($i=1;$i<10;$i++){
                echo "<a href='#' class='digit'>$i</a>";
            } ?>

            <a href="#" class="digit">0</a>

            <a href="#" id="clear-button">C</a>

            <a href="#" id="days-button">Days</a>
            <a href="#" id="minutes-button">Minutes</a>
            <a href="#" id="seconds-button">Seconds</a>

        </div>

        <div class="planets">
            <?php

            $planets = ['Mercury','Venus','Earth','Mars','Jupiter','Saturn','Uranus','Neptune','Pluto'];

            foreach($planets as $planet){
                echo "<a href='#' class='".strtolower($planet)."'>$planet</a>";
            }

            ?>
        </div>

    </div>

</div>

<script type="text/javascript">

    var numericButtons = document.querySelectorAll(".numeric a.digit");
    var numericString = '';
    var display = document.getElementById('numbers');
    var placeholder = document.getElementById('placeholder');



    /**
     * Update the display to show the numbers the user has typed
     * @param info
     */
    function updateDisplay(info){

        display.innerHTML = info;

    }

    function clearNumbers(){
        numericString = '';
        display.innerHTML = '';
        enablePlaceholder();
    }

    /**
     * TURN OFF THE INSTRUCTIONS PLACEHOLDER
     */
    function disablePlaceholder(){


            placeholder.style.display='none';

    }

    function enablePlaceholder(){
        placeholder.style.display = '';
        placeholder.innerHTML = 'Enter your age';
    }

//    EVENTS LISTENERS

    var clearButton = document.getElementById('clear-button').onclick = function (e){
        clearNumbers();
    }

    for(var i = 0; i < numericButtons.length; i++){
        numericButtons[i].onclick =  function(e) {

            // DISABLE THE REGULAR LINK BEHAVIOR
            e.preventDefault();

            disablePlaceholder();

            // CHECK TO SEE IF IT WAS A NUMERIC BUTTON
            if(parseInt(this.innerHTML)||this.innerHTML==0){

                numericString += this.innerHTML;




            } else {

                console.log('You pressed a non-integer button ' + this.innerHTML);

            }


            // UPDATE THE DISPLAY WITH THE NUMBER
            updateDisplay(numericString);

        }
    }

</script>

</body>
</html>