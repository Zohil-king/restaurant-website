// script.js

// Booking form submission
const bookingForm = document.getElementById("bookingForm");

if (bookingForm) {
  bookingForm.addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent default form submission
    alert("🎉 Thank you! Your table has been booked successfully.");
    bookingForm.reset(); // Clear the form
  });
}

// Optional: Smooth scrolling for navigation links
const navLinks = document.querySelectorAll(".nav-links a");
navLinks.forEach(link => {
  link.addEventListener("click", function(e) {
    // Check if the link has a hash (like #menu)
    if (this.hash !== "") {
      e.preventDefault();
      const target = document.querySelector(this.hash);
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
    }
  });
});
