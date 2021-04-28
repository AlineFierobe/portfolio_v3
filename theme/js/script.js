// get update date in footer
const today = new Date();
const year = today.getFullYear();

const currentYear = document.querySelector("#currentYear");

currentYear.innerHTML = year;
