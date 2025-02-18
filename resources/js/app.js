import './bootstrap';

import Alpine from 'alpinejs';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-responsive-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';
import $ from 'jquery';
window.$ = window.jQuery = $;

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    // Slider functionality
    const slider = document.querySelector('#slider .slider-items');
    const slides = document.querySelectorAll('#slider .slider-items img');
    const indicators = document.querySelectorAll('[data-slide]');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('bg-white', index === currentIndex);
            indicator.classList.toggle('bg-gray-300', index !== currentIndex);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlider();
    }

    indicators.forEach(indicator => {
        indicator.addEventListener('click', (e) => {
            currentIndex = parseInt(e.target.dataset.slide, 10);
            updateSlider();
        });
    });

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    setInterval(nextSlide, 5000);

});

