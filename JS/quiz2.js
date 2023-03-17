(function () {
  // Functions
  function bquiz() {
    // variable to store the HTML output
    const output1 = [];

    // for each question...
    myQues.forEach((recentQues, quesNo) => {
      // variable to store the list of possible answers
      const ans = [];

      // and for each available answer...
      for (l in recentQues.ans) {
        // ...add an HTML radio button
        ans.push(
          `<label>
                <input type="radio" name="question${quesNo}" value="${l}">
                ${l} :
                ${recentQues.ans[l]}
              </label>`
        );
      }

      // add this question and its answers to the output
      output1.push(
        `<div class="slide">
              <div class="question"> ${recentQues.question} </div>
              <div class="ans"> ${ans.join("")} </div>
            </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output1.join("");
  }

  function displayResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".ans");

    // keep track of user's answers
    let numCrt = 0;

    // for each question...
    myQues.forEach((recentQues, quesNo) => {
      // find selected answer
      const answerContainer = answerContainers[quesNo];
      const selector = `input[name=question${quesNo}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === recentQues.correctAnswer) {
        // add to the number of correct answers
        numCrt++;

        // color the answers green
        answerContainers[quesNo].style.color = "lightgreen";
      }
      // if answer is wrong or blank
      else {
        // color the answers red
        answerContainers[quesNo].style.color = "red";
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `Your Score is ${numCrt} out of ${myQues.length}`;
    document.cookie = `Jmar = ${numCrt}`;
    goBack();
  }

  function displaySlide(n) {
    slides[recentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    recentSlide = n;
    if (recentSlide === 0) {
      previousButton.style.display = "none";
    } else {
      previousButton.style.display = "inline-block";
    }
    if (recentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function displayNextSlide() {
    displaySlide(recentSlide + 1);
  }

  function displayPreviousSlide() {
    displaySlide(recentSlide - 1);
  }

  // Variables
  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");
  const myQues = [
    {
      question: "Primitive variables are stored on Stack.",
      ans: {
        a: "true",
        b: "false",
      
      },
      correctAnswer: "a",
    },
    {
      question: "Can we have multiple classes in same java file?",
      ans: {
        a: "true",
        b: "false",
        
      },
      correctAnswer: "a",
    },
    // {
      // question: "What is the use of post method in PHP?",
      // ans: {
        // a: "To show to data publicly to others",
        // b: "To show data in query string",
        // c: "To hide the user entered data",
        // d: "To decrypt the user entered data",
      // },
      // correctAnswer: "c",
    // },
    {
      question: "What is the default value of float variable?",
      ans: {
        a: "0.0d",
        b: "0.0f",
        c: "0",
        d: "not defined",
      },
      correctAnswer: "b",
    },
    {
      question: " What is polymorphism?",
      ans: {
        a: "Polymorphism is a technique to define different objects of same type.",
        b: "Polymorphism is the ability of an object to take on many forms.",
        c: "Polymorphism is a technique to define different methods of same type.",
        d: "None of the above.",
      },
      correctAnswer: "b",
    },
    {
      question: " What is instance variable?",
      ans: {
        a: "Instance variables are static variables within a class but outside any method.",
        b: "Instance variables are variables defined inside methods, constructors or blocks.",
        c: "Instance variables are variables within a class but outside any method.	",
        d: "None of the above.",
      },
      correctAnswer: "c",
    },
    {
      question: "What is Set Interface?",
      ans: {
        a: "Set is a collection of element which contains elements along with their key.",
        b: "Set is a collection of element which contains hashcode of elements.",
        c: "Set is a collection of element which cannot contain duplicate elements.",
        d: "Set is a collection of element which can contain duplicate elements.",
      },
      correctAnswer: "c",
    },
    {
      question: "What is true about a final class?",
      ans: {
        a: "class declard final is a final class.",
        b: "Final classes are created so the methods implemented by that class cannot be overridden.",
       c: "It can't be inherited.",
	   d: "All of the above.",
      },
      correctAnswer: "d",
    },
    {
      question: "Which is the way in which a thread can enter the waiting state?",
      ans: {
        a: "Invoke its sleep() method.",
        b: "invoke object's wait method.",
		   c: "Invoke its suspend() method.",
		      d: "All of the above.",
       
      },
      correctAnswer: "d",
    },
    {
      question: "Is it necessary that each try block must be followed by a catch block?	",
      ans: {
        a: "true",
        b: "false",
       
      },
      correctAnswer: "b",
    },
    {
      question: "In which case, a program is expected to recover?",
      ans: {
        a: "If an error occurs.",
        b: "If an exception occurs.",
       c:"Both of the above.",
	   d:"None of the above.",
      },
      correctAnswer: "b",
    },
  ];

  // Kick things off
  bquiz();

  // Pagination
  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let recentSlide = 0;

  // Show the first slide
  displaySlide(recentSlide);

  // Event listeners
  submitButton.addEventListener("click", displayResults);
  previousButton.addEventListener("click", displayPreviousSlide);
  nextButton.addEventListener("click", displayNextSlide);
})();

function goBack() {
  setTimeout(function () {
    window.location.href = "Classroom.php";
  }, 4000);
}

