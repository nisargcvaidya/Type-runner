// script.js
const testText =
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
const typingInput = document.getElementById("typing-input");
const submitButton = document.getElementById("submit-button");
const resultElement = document.getElementById("result");

document.getElementById("test-text").textContent = testText;

submitButton.addEventListener("click", event => {
  event.preventDefault();
  const typingTime = new Date().getTime() - startTime;
  const wordsPerMinute = Math.round(
    (typingInput.value.split(" ").length / typingTime) * 60000
  );
  resultElement.textContent = `Words per minute: ${wordsPerMinute}`;
});

let startTime;
typingInput.addEventListener("focus", () => {
  startTime = new Date().getTime();
});
