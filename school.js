// Smooth scrolling for navigation links
document.querySelectorAll("nav ul li a").forEach(link => {
    link.addEventListener("click", function (e) {
      if (this.hash !== "") {
        e.preventDefault();
        const hash = this.hash;
        document.querySelector(hash)?.scrollIntoView({
          behavior: "smooth",
        });
      }
    });
  });
  
  // Highlight active navigation link based on scroll position
  window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll("nav ul li a");
  
    let current = "";
  
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 50;
      const sectionHeight = section.offsetHeight;
      if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
        current = section.getAttribute("class");
      }
    });
  
    navLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href").includes(current)) {
        link.classList.add("active");
      }
    });
  });
  
  // Alert for "CONTACT US" button
  document.querySelector(".call .hero-btn").addEventListener("click", () => {
    alert("Thank you for showing interest! Please contact us via email or phone.");
  });
  
  // Update footer year dynamically
  document.querySelector(".footer p:last-of-type").innerHTML += ` - ${new Date().getFullYear()}`;
  