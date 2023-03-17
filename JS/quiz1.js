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
    document.cookie = `Cmar = ${numCrt}`;
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
      question: "We can use reserved keywords as identifiers in C#?",
      ans: {
        a: "true",
        b: "false",
      
      },
      correctAnswer: "b",
    },
    {
      question: "Which of the following converts a type to a single Unicode character, where possible in C#?",
      ans: {
        a: "toString",
        b: "ToByte",
        c: "ToChar",
		d: "ToDateTime",
      },
      correctAnswer: "c",
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
      question: "Which of the following converts a type to a 64-bit integer in C#?",
      ans: {
        a: "ToInt64",
        b: "ToSbyte",
        c: "ToSingle",
        d: "ToInt32",
      },
      correctAnswer: "a",
    },
    {
      question: "Which of the following operator represents a conditional operation in C#?",
      ans: {
        a: "?",
        b: "is",
        c: "as",
        d: "*",
      },
      correctAnswer: "a",
    },
    {
      question: "Which of the following converts a type to a double type in C#?",
      ans: {
        a: "ToDecimal",
        b: "ToDouble",
        c: "ToInt16",
        d: "ToInt32",
      },
      correctAnswer: "b",
    },
    {
      question: "Which of the following is true about C# enumeration?",
      ans: {
        a: "An enumerated type is declared using the enum keyword.",
        b: "C# enumerations are value data type.",
        c: "Enumeration contains its own values and cannot inherit or cannot pass inheritance.",
        d: "All of the above.",
      },
      correctAnswer: "d",
    },
    {
      question: "Function overloading is a kind of static polymorphism.",
      ans: {
        a: "true",
        b: "false",
       
      },
      correctAnswer: "a",
    },
    {
      question: "The finally block is used to execute a given set of statements, whether an exception is thrown or not thrown.",
      ans: {
        a: "true",
        b: "false",
       
      },
      correctAnswer: "a",
    },
    {
      question: "Which of the following is the correct about namespaces in C#?",
      ans: {
        a: "A namespace is designed for providing a way to keep one set of names separate from another.",
        b: "The class names declared in one namespace does not conflict with the same class names declared in another.",
        c: "The using keyword states that the program is using the names in the given namespace.",
        d: "All of the above.",
      },
      correctAnswer: "d",
    },
    {
      question: "C# supports multiple inheritance.",
      ans: {
        a: "true",
        b: "false",
       
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
    window.location.href = "quiz2.php";
  }, 4000);
}

