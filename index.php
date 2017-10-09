<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Space Calculator</title>
    <style type="text/css">
        * {
            padding:0;
            margin:0;
            box-sizing: border-box;
        }
        body {
            font-family:Arial,Helvetica;
            font-size:18px;
            background:rgb(23,47,71);
        }
        .wrapper {
            max-width:1024px;
            margin:0 auto;
        }
        .wrapper::after {
            content: '';
            display:block;
            clear:both;
        }

        .numberic,
        .planets {
            width:50%;
            float:left;
        }
        .numberic a:nth-child(10){

            width:66%;
        }
        .disabled {
            opacity:0.5;
        }
        .disabled a:hover {
            background:rgba(32,32,32, 0.5);
            cursor: not-allowed;
        }
        .numberic a,
        .planets a {
            display:block;
            width:33%;
            height:100px;
            float:left;
            text-align:center;
            line-height:100px;
            transition:0.2s;
            text-decoration:none;
            color:#FFF;

            background-size:30%;
            background-position:center center;
            background-repeat:no-repeat;
            background-color:rgba(255,255,255,0.1);

        }

        /* PLANET BUTTONS */
        .planets a.mercury {background-image:url(/images/mercury.svg);}
        .planets a.venus {background-image:url(/images/venus.svg);}
        .planets a.earth {background-image:url(/images/earth.svg);}
        .planets a.mars {background-image:url(/images/mars.svg);}
        .planets a.jupiter {background-image:url(/images/jupiter.svg);}
        .planets a.saturn {background-image:url(/images/saturn.svg);}
        .planets a.uranus {background-image:url(/images/uranus.svg);}
        .planets a.neptune {background-image:url(/images/neptune.svg);}
        .planets a.pluto {background-image:url(/images/pluto.svg);}

        .numberic a:hover,
        .planets a:hover {
            background-size:81%;
            color:#000;
            /*transform: rotate(360deg);*/
        }
        .numberic a:active,
        .planets a:active {
            background-size:60%;
        }
        .display {
            width:100%;
            height:50px;
            margin:1em 0;
            border:none;
            border-radius: 10px;
            background: #eee;
            padding:0 1em;
            font-size:1.2em;
        }


    </style>
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

</body>
</html>