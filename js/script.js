// script.js - Main JavaScript File

// Mobile Menu Toggle Functionality
let menuBtn = document.querySelector('#menu-btn');
let header = document.querySelector('.header');

menuBtn.onclick = () => {
    menuBtn.classList.toggle('fa-times');
    header.classList.toggle('active');
    document.body.classList.toggle('active');
};

// Close mobile menu when scrolling on small screens
window.onscroll = () => {
    if (window.innerWidth < 991) {
        menuBtn.classList.remove('fa-times');
        header.classList.remove('active');
        document.body.classList.remove('active');
    }
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});