
window.onload = function(e) {

    //
    document.getElementById('page').style.display = 'block';
    document.getElementById('page').classList.add('slide-in');

//    ELEMENTS
    var numericString = '';
    var setPlanet = '';
    var setUnits = '';


    // PLACEHOLDER ELEMENTS
    var display = document.getElementById('numbers');
    var placeholder = document.getElementById('placeholder');
    var units = document.getElementById('units');

    // PLANETS ORBIT PERIODS
    var planets = {
        Mercury: 0.2408467,
        Venus: 0.61519726,
        Earth: 1,
        Mars: 1.8808158,
        Jupiter: 11.862615,
        Saturn: 29.447498,
        Uranus: 84.016846,
        Neptune: 164.79132,
        Pluto: 248.00
    };

    /**
     * Output the calculated ages to the screen
     * @param age
     * @param homeplanet
     */
    function outputAges(age, homeplanet) {

        if(setUnits=='Seconds'){
            var earthYears = age / 31557600;
        } else if(setUnits=='Days'){
            var earthYears = age / 365.25;
        } else {
            var earthYears = planets[homeplanet] * age;
        }

        var tableData = '';

        Object.keys(planets).forEach(function (key) {


                tableData += '<p class="' + key.toLowerCase() + '"><span>' + (earthYears / planets[key]).toPrecision(5) + '</span><span class="planet"> ' + key + '</span> years' + '</a>';



        });

        console.log(tableData);
        document.getElementById('results').innerHTML = tableData;

    }

    /**
     * Get the age value from the display
     * @returns {string|*}
     */
    function getAge() {
        return display.innerHTML;
    }


    /**
     * Update the display to show the numbers the user has typed
     * @param info
     */
    function updateDisplay(info) {

        display.innerHTML = info;

    }

    /**
     * Disable the display placeholder
     */
    function disablePlaceholder() {

        placeholder.style.display = 'none';
    }

    /**
     * Enable the display placeholder
     */
    function enablePlaceholder() {
        placeholder.style.display = '';
        placeholder.innerHTML = 'Enter your age';
    }

    /**
     * Disable the planets except earth
     */
    function disablePlanets(){
        var planetButtons = document.getElementsByClassName('planet');

        for(var i = 0; i < planetButtons.length; i++){
            if(planetButtons[i].innerHTML!=='Earth') {
                planetButtons[i].classList.add('disabled');
            }
        }
    }

    /**
     * Re-enable the disabled planets
     */
    function enableDisabled(){
        var planetButtons = document.getElementsByClassName('planet');

        for(var i = 0; i < planetButtons.length; i++){
            planetButtons[i].classList.remove('disabled');
        }
    }

    // EVENT LISTENERS

    /**
     * Get keyboard input from the user
     */
    var keyboardInput = document.addEventListener('keydown', function (e) {

        //        e.preventDefault();
        console.log(e.key);

        // CHECK TO SEE IF IT WAS A NUMERIC BUTTON
        if (parseInt(e.key) || e.key == 0) {

            disablePlaceholder();
            numericString += e.key;
            console.log('updated');

            updateDisplay(numericString);

        }

        // CLEAR THE SCREENS IF KEYBOARD BACK SPACE OR DELETE
        if (e.key == "Delete" || e.key == "Backspace") {
            clearScreens();
        }



    });

    /**
     * Reset everything back to initial state
     */
    function clearScreens() {

        numericString = '';
        display.innerHTML = '';
        units.innerHTML = '';
        document.getElementById('results').innerHTML = 'Results will appear here...';
        document.getElementById('planet').className = "";

        enablePlaceholder();
        enableDisabled();

    }

    /**
     * Event listener to clear screens
     * @type {onclick}
     */
    var clearButton = document.getElementById('clear-button').onclick = function (e) {

        e.preventDefault();
        clearScreens();

    }

    /**
     * Loop through the units buttons
     */
    var unitButtons = document.querySelectorAll(".numeric a.units");
    for (var i = 0; i < unitButtons.length; i++) {
        unitButtons[i].onclick = function (e) {
            e.preventDefault();


            if(numericString!=='') {

                if(this.innerHTML!=='Years'){
                    disablePlanets();
                } else {
                    enableDisabled();
                }

                setUnits = this.innerHTML;
                var unitDisplay = document.getElementById('units');
                unitDisplay.style.display = 'inline';
                unitDisplay.innerHTML = this.innerHTML;
                console.log(this.innerHTML);
            }



        }
    }


    /**
     * Loop through the numeric buttons
     */
    var numericButtons = document.querySelectorAll(".numeric a.digit");
    for (var i = 0; i < numericButtons.length; i++) {
        numericButtons[i].onclick = function (e) {

            // DISABLE THE REGULAR LINK BEHAVIOR
            e.preventDefault();
            disablePlaceholder();

            // CHECK TO SEE IF IT WAS A NUMERIC BUTTON
            if (parseInt(this.innerHTML) || this.innerHTML == 0) {

                numericString += this.innerHTML;

            } else {

                console.log('You pressed a non-integer button ' + this.innerHTML);

            }

            // UPDATE THE DISPLAY WITH THE NUMBER
            updateDisplay(numericString);

        }
    }


    /**
     * Loop through the planet buttons
     */
    var planetButtons = document.querySelectorAll(".planet");
    for (var i = 0; i < planetButtons.length; i++) {
        planetButtons[i].onclick = function (e) {

            e.preventDefault();

            setPlanet = this.innerHTML;
            console.log(this.innerHTML + ' ' + planets[this.innerHTML]);

//            this.classList.add('selected');

                if(this.classList.contains('disabled')){

                } else {

                    if (numericString !== '') {

                        setPlanet = this.innerHTML;
                        document.getElementById('planet').className = this.innerHTML.toLowerCase();


                    } else {
                        document.getElementById('display').classList.add('shake');
                    }

                }


        }
    }

    /**
     * Event listener for the calculate button
     */
    var calculateButton = document.getElementById('calculate-button').onclick = function(e){
        e.preventDefault();
        if(setPlanet!='' && setUnits!='' &&numericString!='') {
            outputAges(numericString, setPlanet);
        }
    }

    /**
     * Event listener for the help button
     */
    var helpButton = document.getElementById('help-button').onclick = function(e){
        e.preventDefault();

        var instructionsBox = document.getElementsByClassName('instructions')[0];

       if(instructionsBox.classList.contains('hide')){
           instructionsBox.classList.remove('hide');
           this.innerHTML = 'X';
       } else {
           instructionsBox.classList.add('hide');
           this.innerHTML = '?';
       }

    };


};