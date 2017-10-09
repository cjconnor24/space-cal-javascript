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

        <input type="text" value="" placeholder="Enter age" class="display" />

    </div>

    <div class="wrapper">

        <div class="numberic">

            <?php for($i=1;$i<10;$i++){
                echo "<a href='#'>$i</a>";
            } ?>
            <a href="#">0</a>
            <a href="#">C</a>

            <a href="#">Days</a>
            <a href="#">Minutes</a>
            <a href="#">Seconds</a>

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

    var numericButtons = document.querySelectorAll(".numberic a");

    for(var i = 0; i < numericButtons.length; i++){
        numericButtons[i].onclick =  function(e) {
            console.log('You pressed' + this.innerHTML);
        }
    }

</script>

</body>
</html>