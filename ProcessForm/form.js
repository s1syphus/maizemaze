var eventNames = ["AeroDynamics", "Barge","Circuit","Disease","Estimania",
"Feathered Friends","Bloom","Infinity","Maps","Architecture","On Target",
"Pasta Bridges","Pentathlon","Chemistry","Puff Mobiles","Reflections",
"SJ5","Straw Tower","Rockets","WhatWentBy","Write It Build It","Picture This"];;

var eventNames2 = ["AeroDynamics", "Barge","Disease","Estimania",
"Feathered Friends","Bloom","Infinity","Maps","Architecture","On Target",
"Pasta Bridges","Pentathlon","Puff Mobiles"];;

var eventNames3 = ["AeroDynamics", "Disease","Estimania",
"Feathered Friends","Bloom","Infinity","Maps","Architecture","On Target",
"Pentathlon","Puff Mobiles", "SJ5","Straw Tower","Rockets","WhatWentBy","Write It Build It"];;

var eventNames45 = ["Circuit","Disease","Estimania",
"Feathered Friends","Infinity","Maps","Architecture","On Target",
"Pentathlon","Chemistry","Reflections", "SJ5","Straw Tower","Rockets","WhatWentBy","Write It Build It","Picture This"];;

var eventLastYear = ["--", "Bones", "Barge","Circuit","Estimania",
"Bloom","Maps","Architecture","On Target", "Pentathlon","C is for Chemistry",
"Puff Mobiles", "Rock Hunter", "Science Jeopardy - 5th grade",
"Science Jeopardy - 4th grade", "Sink and Float",  "Straw Tower","Water Rockets",
"Write It Build It","What Went By?", "Feathered Friends", "To Infinity and Beyond"];;

var shirtSizes = ["Youth Small", "Youth Medium", "Youth Large", 
"Youth X-Large", "Adult Small", "Adult Medium"];;

var gradeNums = ["", "2", "3", "4", "5"];;

var teacherNames = [ "", "Cherly Day", "Marcia Gibbs", "Angela Black",
"Paula Caruso", "Jessica Rodriguez", "Millie Fisher", "Nick Mosher",
"Janet Heaton", "Neil Duggins", "Karen Sanderson", "Julie Spiroff"];;

function popDropDownTemp(idName, varArray) {
  var select = document.getElementById(idName);
  var i;
  var arr;

  if(varArray === "shirtSizes"){
      arr = shirtSizes;
  }
  else if(varArray === "gradeNums"){
      arr = gradeNums;
  }
  else if(varArray === "teacherNames"){
      arr = teacherNames;
  }
  else if(varArray === "eventLastYear"){
      arr = eventLastYear;
  }
  else if(varArray === "eventNames"){
      arr = eventNames;
  }

  for (i = 0; i < arr.length; i++) {
      var opt = arr[i];
      var el = document.createElement("option");
      el.textContent = opt;
      el.value = opt;
      select.appendChild(el);
  }
}

function popDropDownChoices(idName) {
  var select = document.getElementById(idName);
  var grade = document.getElementById("studentGrade");
  var i;
  var arr;

  if(grade.value === ""){
    arr = eventNames;
  }
  else if(grade.value === "2"){
    arr = eventNames2;
  }
  else if(grade.value === "3"){
    arr = eventNames3;
  }
  else{
    arr = eventNames45;
  }
 
  for (i = 0; i < arr.length; i++) {
      var opt = arr[i];
      var el = document.createElement("option");
      el.textContent = opt;
      el.value = opt;
      select.appendChild(el);
  }
}

function popDownFill() {
  var select = document.getElementById("firstChoice");
  select.options.length = 0;
  popDropDownChoices("firstChoice");

  select = document.getElementById("secondChoice");
  select.options.length = 0;
  popDropDownChoices("secondChoice");

  select = document.getElementById("thirdChoice");
  select.options.length = 0;
  popDropDownChoices("thirdChoice");

  select = document.getElementById("fourthChoice");
  select.options.length = 0;
  popDropDownChoices("fourthChoice");
}

function closeMe(idName)
{
   x=document.getElementById(idName); 
   x.className="gone";
}

function openMe(idName)
{
   x=document.getElementById(idName); 
   x.className="back";
}

function check(input, idName) {
  if (input.value != document.getElementById(idName).value) {
    input.setCustomValidity('The two email addresses must match.');
  } else {
    input.setCustomValidity('');
  }
}



