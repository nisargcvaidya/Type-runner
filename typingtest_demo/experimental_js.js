//Random Quotes Api URL
const quoteApiUrl = "https://api.quotable.io/random?minLength=100&maxLength=120"; //internet vagar kaam no kare !!
const quoteSection = document.getElementById("quote"); //ene man thai e quote mukse
const userInput = document.getElementById("quote-input");

let quote = "";    //quote ne declare karyo
let time = 60;     //time ne pan
let timer = "";    //timer ne pan
let mistakes = 0;  //mistakes pan...

// gamme te quote display karse
const renderNewQuote = async () => {
  //url mathi content upaadse
  const response = await fetch(quoteApiUrl);

  // response store karse
  let data = await response.json();

  //Access quote from url
  quote = data.content;

  //Array of characters in the quote (using json)
  let arr = quote.split("").map((value) => {
    
    //wrap the characters in a span tag
    return "<span class='quote-chars'>" + value + "</span>";
  });
  //join array for displaying
  quoteSection.innerHTML += arr.join("");
};

//Logic for comparing input words with quote
userInput.addEventListener("input", () => {
  let quoteChars = document.querySelectorAll(".quote-chars");

  //Create an array from received span tags
  quoteChars = Array.from(quoteChars);

  //array of user input characters
  let userInputChars = userInput.value.split("");

  //loop through each character in quote
  quoteChars.forEach((char, index) => {
    //Check if char(quote character) = userInputChars[index](input character) / green output 
    if (char.innerText == userInputChars[index]) {
      char.classList.add("success");
    }

    //jo user a koi character backspace ke wrong character nakhyo hoy to...
    else if (userInputChars[index] == null) {
      //Remove class if any
      if (char.classList.contains("success")) {
        char.classList.remove("success");
      } 
      //wrong character hoi to red output
      else {
        char.classList.remove("fail");
      }
    }

//user a khota character nakhya hoy to...
    else {
      //Checks if we already have added fail class
      if (!char.classList.contains("fail")) {
        //increment and display mistakes
        mistakes += 1;
        char.classList.add("fail");
      }
      document.getElementById("mistakes").innerText = mistakes;
    }
//Returns true if all the characters are entered correctly
    let check = quoteChars.every((element) => {
      return element.classList.contains("success");
    });
    //End test byitself if all characters are correct 
    if (check) {
      displayResult();
    }
  });
});

//Update Timer on screen
function updateTimer() {
  if (time == 0) {
    //End test if timer reaches 0
    displayResult();
  } 
  else {
    document.getElementById("timer").innerText = --time + "s";
  }
}

//Sets timer
const timeReduce = () => {
  time = 60;
  timer = setInterval(updateTimer, 1000);
};

//End Test
const displayResult = () => {
  //display result div
  document.querySelector(".result").style.display = "block";
  clearInterval(timer);
  document.getElementById("stop-test").style.display = "none";
  userInput.disabled = true;

  let timeTaken = 1;
  if (time != 0) {
    timeTaken = (60 - time) / 100;
  }
  document.getElementById("wpm").innerText =
    (userInput.value.length / 5 / timeTaken).toFixed(2) ;

    // typing speed condition to get certificate
    const typingSpeed = userInput.value.length / 5 / timeTaken;
    const crti_btn = document.querySelector('.text');
    if (typingSpeed >= 50  ) {
      crti_btn.href = "certificate_code.php";
      crti_btn.style.pointerEvents = "auto";
    }
    else if(typingSpeed < 50){
        alert("Your typing speed is not enough, to get a certificate your typing speed must be atleast 50 wpm......");
      crti_btn.href = "javascript:void(0)";
      crti_btn.style.pointerEvents = "none";
    }
     else {
      crti_btn.href = "javascript:void(0)";
      crti_btn.style.pointerEvents = "none";
      alert("please finish your typing test....");
    }

    // condition for gold certificate
    const typingSpeed2 = userInput.value.length / 5 / timeTaken;
    const crti_btn2 = document.querySelector('.gold');
    if (typingSpeed2 >= 70 ) {
      crti_btn2.href = "certificate_code_gold.php";
      crti_btn2.style.pointerEvents = "auto";
    }
       else if(typingSpeed2 < 70){
        alert("Your typing speed is not enough, to get gold certificate your typing speed must be atleast 70+ wpm......");
      crti_btn2.href = "javascript:void(0)";
      crti_btn2.style.pointerEvents = "none";
    }

  document.getElementById("accuracy").innerText =
    Math.round(
      ((userInput.value.length - mistakes) / userInput.value.length) * 100) + " %"; //number ne round karine return karse
};

//Start Test 
const startTest = () => {
  mistakes = 0;
  timer = "";
  userInput.disabled = false;
  timeReduce();
  document.getElementById("start-test").style.display = "none";
  document.getElementById("stop-test").style.display = "block";
};

//load page on start and stop 
window.onload = () => {
  userInput.value = "";
  document.getElementById("start-test").style.display = "block";
  document.getElementById("stop-test").style.display = "none";
  userInput.disabled = true;
  renderNewQuote();
};

//cursor pointing at input text when start button is loaded
 //window.onload = function(){
   //  document.getElementById('start-test').onclick = function() {
    //    document.getElementById('quote-input').focus();
     // };
  //}

//light & dark themes 
const btn1 = document.getElementById('light');
btn1.addEventListener('click', function onClick(event) {
  // background color change karva mate
  document.body.style.backgroundColor = 'white';
});

const btn2 = document.getElementById('dark');
btn2.addEventListener('click', function onClick(event) {
  document.body.style.backgroundColor = 'rgb(20, 20, 20)';
});

// side menu logic
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



