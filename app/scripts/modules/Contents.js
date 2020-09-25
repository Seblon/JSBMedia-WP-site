// Selectors
const toggler = document.querySelector(".contents_toggler");

// Event handlers
toggler.addEventListener("click", () => {
   toggler.classList.toggle("contents_toggler--opened");
});
