Selenium.prototype.doGenZAIDnumber = function(locator, text) {
    var element = this.page().findElement(locator);
    var dob = 800101;
    var gen = 6;
    var nin = '' + dob + gen +
        Math.floor(Math.random() * 10) +
        Math.floor(Math.random() * 10) +
        Math.floor(Math.random() * 10) +
        Math.floor(Math.random() * 2) +
        Math.floor(Math.random() * 10);
    var sumEven = 0;
    var sumOdd = 0;
    var even = false;
    for (i = 0; i < 12; i++) {
        if (!even) {
            sumOdd += parseInt(nin.charAt(i));
        } else {
            var doubleEven = 2 * parseInt(nin.charAt(i));
            sumEven += Math.floor(doubleEven / 10) + (doubleEven % 10);
        }
        even = !even
    }
    var total = sumOdd + sumEven;
    var check = (10 - (total % 10)) % 10;
    fullnin = nin + check;
    this.page().replaceText(element, fullnin);
}

// To add the above as a command to Selenium, save it on your drive as user - extentions.js.
// Then open Selenium and go to Options - > Options - > General, click‘ Browse.
// Next to the ‘Selenium, Core extentions’ field and point to your saved file.Restart Selenium.
