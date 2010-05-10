
var easy =    "046500200280600000000740000005021030032000170070480500000094000000001096005007830";
var easyS =   "946583217287619543351742698865721439432965178179483526678394152324851796915267834";
var medium =  "000430002800000000017000900200097000008603700000480005006000580000000001100048000";
var mediumS = "659431872824597136317826954265197348948653712731482695926713584485269371173548269";
var hard =    "900765100001000300050000000800000009000621840004000000600000030004000100002837005";
var hardS =   "983765124721849365654321798817346592956218473243579186678451239534692187912837465";
seID=0;
var puzzleS;
var puzzle;
var code;
var cheating = false;
var score = 0;
var maximum_time = 600000; //10 minutes (10 minutes * 60 seconds * 1000 milliseconds = 600,000 milliseconds)
var current_time = maximum_time;
var game_timer;
var update_timer;

//Function does nothing when the enter key is hit. This is to prevent the form from being submitted.
function noenter() {
  return !(window.event && window.event.keyCode == 13); 
}

//Function sets a different styesheet.
function switchStyleSheetGecko(toNum) {

  var linkTag, linkTitle = "skin" + toNum;
  var linksArray = document.getElementsByTagName("link");

  for(var linkNum=0; linkNum<linksArray.length; linkNum++) {
    linkTag = linksArray[linkNum];
    if(linkTag.getAttribute("rel").match(/^sty|^alt/i)) {

      if (linkTag.getAttribute("title") == linkTitle) {
        linkTag.disabled = false;
      } else if (linkTag.getAttribute("title")) {
        linkTag.disabled = true;
      }
    }
  }
}
//Function sets the initial state of the board.
function publish(code)
{
  resetTimers();
  //this is to avoid rewarding users with points for the solve button.
  if (puzzleFull()) {cheating = false;}

  for (n=0; n<=80; n++) {

    var numb = code.charAt(n);

    if (numb=="0") {
      numb="";
    }

    document.getElementById(n).value=numb;
    if(numb != "") {
      document.getElementById(n).style.color = 'green';
      document.getElementById(n).disabled = true;
    }
    else {
      document.getElementById(n).style.color = 'black';
      document.getElementById(n).disabled = false;
    }
  }
}
//Function sets the current puzzle and then calls publish.
function setDiff(diff) {
  if (diff==1){document.getElementById("puzzleText").value = easy; puzzle = easy; puzzleS=easyS;}
  if (diff==2){document.getElementById("puzzleText").value = medium; puzzle = medium; puzzleS=mediumS;}
  if (diff==3){document.getElementById("puzzleText").value = hard; puzzle = hard; puzzleS=hardS;}

  this.publish(puzzle);

}

//Function starts the game timer and the update timer to show the countdown.
function startTimer() {
  resetTimers();  
  game_timer = setTimeout ( "endTimer()", maximum_time);
  update_timer = setInterval("updateTimerBox(1000)", 1000); //update every 1 second
}

//Function updates the time shown in the game timer box
function updateTimerBox(interval) {
  current_time -= interval;
  document.forms['form1'].timer.value = current_time/1000; //current time left in seconds
}

//Function called when game timer runs out!
function endTimer() {
  resetTimers();
  alert("You are out of time!");
  solve();
}


//Function resets and stops all timers.
function resetTimers() {
  current_time = maximum_time;
  clearTimeout(game_timer);
  clearInterval(update_timer);  
  document.forms['form1'].timer.value = current_time/1000; //set current time in seconds
}

function timerRunning() {
  if (current_time < maximum_time)
    return true;
  else
    return false;
}

//Function returns a game input box by id.
function boxSelect(x) {
  seID=x;
  document.getElementById(seID).value="";
}     

//Function checks if the entry in the currently focused square is correct.
function check() {
  if (document.getElementById(seID).value == puzzleS.charAt(seID)) {
    document.getElementById(seID).style.color = "green";
    alert('Correct!');
    return true;
  }
  else if (document.getElementById(seID).value ==""){alert('Nothing to check!'); return false;}
  else {
    document.getElementById(seID).style.color = "red";
    alert('Bad guess...');
    return false;
  }
}

//Function fills all the squares with the correct answers.
function solve() {
  cheating = true;
  this.publish(puzzleS);
}

//Function restarts the game
function newGame() {
  if(confirm('Are you sure you want to restart your game?'))
  this.publish(puzzle);
}

//Funtion returns true if all the squares have answers.
function puzzleFull() {
  for (n=0; n<=80; n++) {
    if (document.getElementById(n).value == "") {return false;}
  }
  return true;
}

//Function is called whenever a value changes on the board
function newGuess(element) {
  if (puzzleFull()){finishCheck();} //if this is the last square, check the answer.
  if (!timerRunning()) {startTimer();} //start the game timer, in case user forgets to hit start
}

//Function checks the state of the completed puzzle and responds accordingly.
function finishCheck() {
  for (n=0; n<=80; n++) {
    if (document.getElementById(n).value != puzzleS.charAt(n)) {
      alert("Sorry, you made a mistake. Take a closer look!");
      return false;
    }
  }  
  if (cheating) {
    alert("You Got it but you used help! No points for you. Try again.")
    return false;
  } else {
    alert("You Win!");
    //award points
    switch(puzzle) {
    case easy:
      score += 1;
      break;
    case medium:
      score += 2;
      break;
    case hard:
      score += 3;
      break;
    }
    //update score box
    document.getElementById("score").value = score;
    return true;
  }
  resetTimers();
}

//Function cheats by adding a new solution to the board.
function getHint() {
  cheating = true;
  var randomnumber=Math.floor(Math.random()*81);
  if (puzzleFull()) { alert("No more hints! Puzzle is full!"); return false;}

  if (puzzle.charAt(randomnumber) == '0' && document.getElementById(randomnumber).value == '') {
    document.getElementById(randomnumber).value = puzzleS.charAt(randomnumber);
  } else {
    getHint();
  }
}

function loadXMLDoc(dname) {
  try //Internet Explorer
  {
    xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
  }
  catch(e)
  {
    try //Firefox, Mozilla, Opera, etc.
    {
      xmlDoc=document.implementation.createDocument("","",null);
    }
    catch(e) {alert(e.message)}
  }
  try 
  {
    xmlDoc.async=false;
    xmlDoc.load(dname);
    return(xmlDoc);
  }
  catch(e) {alert(e.message)}
  return(null);
}