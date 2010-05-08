
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

}}}

function publish(code)
{
//this is to avoid rewarding users with points for the solve button.
if (puzzleFull()) {cheating = false;}

for (n=0; n<=80; n++)
{

var numb = code.charAt(n);

if (numb=="0")
{
numb="";
}

document.getElementById(n).value=numb;
if(numb != "") {
  document.getElementById(n).style.color = 'green';
  document.getElementById(n).disabled = 'true';
  
}

}
}

function setDiff(diff)
{
if (diff==1){document.getElementById("puzzleText").value = easy; puzzle = easy; puzzleS=easyS;}
if (diff==2){document.getElementById("puzzleText").value = medium; puzzle = medium; puzzleS=mediumS;}
if (diff==3){document.getElementById("puzzleText").value = hard; puzzle = hard; puzzleS=hardS;}

this.publish(puzzle);

}
<!-- 

var milisec=0 
var seconds=300
//document.forms['form1'].timer.value="300";

function start()
{
if (milisec<=0){ 
milisec=9 
seconds-=1 
} 
if (seconds<=-1){ 
milisec=0 
seconds+=1 
} 
else {
milisec-=1
document.forms['form1'].timer.value=seconds+"."+milisec 
setTimeout("start()",100) 
} 
start() 
-->
}

function boxSelect(x)
{
seID=x;

document.getElementById(seID).value="";

}     

function check()
{
if (document.getElementById(seID).value == puzzleS.charAt(seID)){
  document.getElementById(seID).style.color = "green";
  alert('Correct!');
}
else if (document.getElementById(seID).value ==""){alert('Nothing to check!')}
else {
  document.getElementById(seID).style.color = "red";
  alert('Wrong number...')
}
}

function solve()
{
cheating = true;
this.publish(puzzleS);
}

function newGame()
{
if(confirm('Are you sure you want to restart your game?'))
this.publish(puzzle);
}

function puzzleFull()
{
  for (n=0; n<=80; n++)
{
  if (document.getElementById(n).value == "") {return false;}
}
return true;

}

function finishCheck() {
  for (n=0; n<=80; n++)
{
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

}


function getHint()
{
cheating = true;
var randomnumber=Math.floor(Math.random()*81);
if (puzzleFull()) { alert("No more hints! Puzzle is full!"); return false;}

if (puzzle.charAt(randomnumber) == '0' && document.getElementById(randomnumber).value == '') {
  document.getElementById(randomnumber).value = puzzleS.charAt(randomnumber);
} else {
  getHint();
}

}

function loadXMLDoc(dname) 
{
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