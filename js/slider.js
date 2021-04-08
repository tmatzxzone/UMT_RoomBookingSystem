"use strict"
var addSeconds = 0;
var numberOfMinutes = 5;
var startDateTime = moment('10/3/2017 9:00:00 AM', 'MM/D/YYYY h:mm:ss A');
var ticks;
var mySlider;
var sliderTimer;
var tickLabels;

(function init() {
  $("[data-increment='add']").html('+'+numberOfMinutes+":00");
  $("[data-increment='subtract']").html('-'+numberOfMinutes+":00");
  ticks = createTicks(numberOfMinutes); 
  tickLabels = labels(startDateTime);
  mySlider = createSlider();
  setInterval(timerFunction,1000);
  timerFunction(); //start initially
})();

function labels(startTimestamp){
  var newtickLabels = [];
  var formatTime = numberOfMinutes>8?"h:mm":"h:mm A"; //bigger than 8 and labels collide with AM PM on, theres probably a better way...
  for (var i = 0; i < numberOfMinutes+1; i++) {   
    var newTime = moment(startTimestamp).add(i * 60, 'seconds').format(formatTime);
    newtickLabels.push(newTime);
  }
  return newtickLabels;
}

function createTicks(numMinutes) {
  //numMinutes is an integer
  //create a list of ticks in seconds based on number of minutes (5 => [0,60,120,180,240,300])
  var minuteNum = 0;
  var response =  _.map(Array(numMinutes), function() {
    minuteNum++;
    return minuteNum * 60;
  });
  response.unshift(0); //add 0 to beginning of array
  return response;
}

function createSlider() {
  return new Slider("#svSlider",{
    ticks: ticks,
    tooltip: 'always',
    formatter: updateTooltip,
    ticks_labels: tickLabels,
    value: addSeconds
  });  
}

function timerFunction() {   
  addSeconds++;
  mySlider.setValue(addSeconds);
  if (addSeconds >= 300) {
    clearInterval(sliderTimer);
  }
}

$('.increment-minutes').on('click',function(button){
  addSeconds = 0;
  var type = $(button.target).data("increment");
  startDateTime[type](numberOfMinutes, 'minutes');
  tickLabels = labels(startDateTime);
  //for some reason I couldnt get bootstrap slider to update tick labels - destroy and recreate
  mySlider.destroy(); 
  mySlider = createSlider();
});

$('.pause-play-button').on('click', function(button){
  var status = $(button.target).html();
  if (status === 'Pause') {
    $(button.target).html('Play');
    clearInterval(sliderTimer); 
  } else {
    $(button.target).html('Pause');
    sliderTimer = setInterval(timerFunction,1000);
  }
})

mySlider.on('change', function(value) {
  clearInterval(sliderTimer); 
  addSeconds = value.newValue;
})

function updateTooltip(value) {
  var newLabelTime = moment(startDateTime); //calling moment on a moment creates a clone
  newLabelTime.add(value,'seconds');
  return newLabelTime.format('h:mm:ss A');
} 