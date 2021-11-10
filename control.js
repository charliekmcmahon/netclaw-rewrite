// Code © 2020 Charlie McMahon. All Rights Reserved.
console.log('control.js loaded - version 10-11-21-1810');
//this caused me so much pain
var fired = false;
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

document.onkeydown = function(event) {
    if(!fired) {
        fired = true;
          if (event.keyCode == 38){
            apiRequest('up');
          }
          else if (event.keyCode == 40){
            apiRequest('down');
          }
          else if (event.keyCode == 37){
            apiRequest('left');
          }
          else if (event.keyCode == 39){
            apiRequest('right');
          }
          else if (event.keyCode == 32){
            apiRequest('drop');
            doSomething();
          }
          else if (event.keyCode === 32 || event.key === ' ' || event.key === 'Spacebar') {
            apiRequest('drop');
            doSomething();

          }
    }
};

document.onkeyup = function(event) {
    fired = false;
      apiRequest('stop');
};
