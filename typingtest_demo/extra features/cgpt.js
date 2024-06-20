const startTestButton = document.getElementById("start-test-button");
const finishTestButton = document.getElementById("finish-test-button");
const typingTestArea = document.getElementById("typing-test-area");
const certificateTemplate = document.getElementById("certificate-template");
const certificateName = document.getElementById("certificate-name");
const certificateSpeed = document.getElementById("certificate-speed");
const certificateAccuracy = document.getElementById("certificate-accuracy");
const certificateDate = document.getElementById("certificate-date");
const printCertificateButton = document.getElementById("print-certificate-button");

startTestButton.addEventListener("click", function() {
  // Enable typing test area and finish test button
  typingTestArea.disabled = false;
  finishTestButton.disabled = false;
  startTestButton.disabled = true;
});

finishTestButton.addEventListener("click", function() {
  // Get the test text and calculate speed and accuracy
  const testText = typingTestArea.value;
  const testWords = testText.split(" ");
  const testTime = 60; // time in seconds
  const testSpeed = testWords.length / testTime;
  const testAccuracy = calculateAccuracy(testText);

  // Populate certificate template with user data
  certificateName.innerText = "John Doe"; // replace with user's name
  certificateSpeed.innerText = testSpeed;
  certificateAccuracy.innerText = testAccuracy;
  certificateDate.innerText = new Date().toLocaleDateString();

  // Show certificate template and print button
  certificateTemplate.style.display = "block";
  printCertificateButton.style.display = "block";
});

printCertificateButton.addEventListener("click", function() {
  // Print the certificate template
  window.print();
});

function calculateAccuracy(testText) {
  // Replace this with your own function to calculate accuracy
  return 80;
}
