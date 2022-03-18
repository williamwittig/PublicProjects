/**
 * Name: William Wittig
 * Date: 05/29/2021
 * Name of file: Assn_Animal_Game
 * Description: This program is a game that displays four photos of various animals that user has to match to the displayed animal type. If the animal that is chosen is not the correct answer, the score will decrease by one, and if it is correct, the score will increase by one, and no other image with display the border when clicked until the 'another round' button is clicked for the next round.
 */

const animalBox = document.getElementById("animalBox");
const animalName = document.getElementById("animalName");
const anotherRoundBtn = document.getElementById("anotherRound");
const result = document.getElementById("result");
const scoreP = document.getElementById("score");
const animalArr = [
  "dog",
  "elephant",
  "fish",
  "frog",
  "lion",
  "rabbit",
  "tiger",
];
let displayedAnimals = [];
let correctAnswer;
let score = 0;
let bool = false;

// When the 'another round' button is clicked, it will reset the 'animalName' and 'result' values, remove all img elements, creates an array of random distinct numbers to choose the animals to display, then uses the random numbers as indexes for the 'animalArr', and displays the images.
anotherRoundBtn.addEventListener("click", function () {
  // Resetting innerHTML to ""
  animalName.innerHTML = "";
  result.innerHTML = "";
  bool = false;

  // Removing all the previous photos
  while (animalBox.firstChild) {
    animalBox.removeChild(animalBox.firstChild);
  }

  // Creating an array with distict random numbers from 0 to animalArr.length
  let randNumArr = [];
  for (let i = 0; i < 4; i) {
    let randNum = Math.floor(Math.random() * animalArr.length);
    if (!randNumArr.includes(randNum)) {
      randNumArr.push(randNum);
      i++;
    }
  }

  // Displaying the animal images
  for (let i = 0; i < randNumArr.length; i++) {
    let animalName = animalArr[parseInt(randNumArr[i])];
    let img = document.createElement("img");
    img.src = `images/${animalName}.png`;
    img.alt = `${animalName}`;

    // Adding the click event listener to each image, removing the border class from all images, and adding the border class to the image that was clicked
    img.addEventListener("click", function (e) {
      if (bool == true) return;
      let images = animalBox.querySelectorAll("img");
      for (let i = 0; i < images.length; i++) {
        if (images[i].classList.contains("border")) {
          images[i].classList.remove("border");
        }
      }
      img.classList.add("border");

      // Check if img answer is correct, adds to the score if correct, sutracts one point for every wrong answer
      if (e.target.alt == correctAnswer) {
        result.innerHTML = `You got it!`;
        result.style.color = "Green";
        score++;
        scoreP.innerHTML = `Score: ${score}`;
        bool = true;
      } else if (e.target.alt != correctAnswer) {
        result.innerHTML = `Nope. Try again.`;
        result.style.color = "Red";
        score--;
        scoreP.innerHTML = `Score: ${score}`;
      }
    });

    // Adding the image to the animalBox to be displayed
    animalBox.appendChild(img);
  }

  // Displaying the desired answer
  animalChildren = document.getElementById("animalBox").children;
  randNum = Math.floor(Math.random() * animalChildren.length);
  correctAnswer = animalChildren[randNum].alt;
  animalName.innerHTML = correctAnswer.toUpperCase();
});
