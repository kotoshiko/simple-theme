
jQuery(document).ready(function(){
    $('a.scroll-link-to[href^="#"]').on('click', function(event) {
        // отменяем стандартное действие
        event.preventDefault();

        let sc = $(this).attr("href"),
            dn = $(sc).offset().top;
        /*
        * sc - в переменную заносим информацию о том, к какому блоку надо перейти
        * dn - определяем положение блока на странице
        */

        $('html, body').animate({scrollTop: dn}, 1500);

        /*
        * 1000 скорость перехода в миллисекундах
        */
    });
});




jQuery(document).ready(function(){
    function setActiveBlock(group, id){
        $('.s_informationBlock[data-group=' + group + '][data-id=' + id + ']').show();
    }

    function setActiveTrigger(group, id) {
        $('.s_informationTrigger[data-group=' + group + '][data-id=' + id + ']').addClass('active');
    }

    function offAll(group) {
        $('.s_informationBlock[data-group=' + group + ']').hide();
        $('.s_informationTrigger[data-group=' + group + ']').removeClass('active');
    }

    function switchTo(group, id) {
        offAll(group);
        setActiveTrigger(group, id);
        setActiveBlock(group, id);
    }

    function setListener() {
        $('.s_informationTrigger').on('click', function () {
            let isActive = $(this).hasClass('active');
            let id = $(this).data('id');
            let group = $(this).data('group');
            if(!isActive) {
                switchTo(group, id);
            } else {
                offAll(group)
            }
        });
    }

    setListener();
});
//hide calculate section
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('showPopup').addEventListener('click', function() {
        let priceSection = document.getElementById("price");
        if (priceSection.style.display === "block") {
            priceSection.style.display = "none";
        } else {
            priceSection.style.display = "block";
        }
    });
});


let currentIndex = 0;
let itemsPerSlide = 3;

function initializeSlider() {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    for (let i = 0; i < itemsPerSlide; i++) {
        slider.appendChild(slides[i].cloneNode(true));
    }
}

function showSlide(index) {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const slideWidth = slides[0].clientWidth; // Ширина одного слайда
    const offset = -index * slideWidth;
    slider.style.transform = `translateX(${offset}px)`;
}

function prevSlide() {
    if (currentIndex <= 0) {
        currentIndex = 0;
    } else {
        currentIndex--;
    }
    showSlide(currentIndex);
}

function nextSlide() {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const slideWidth = slides[0].clientWidth; // Ширина одного слайда
    if (currentIndex >= slides.length - itemsPerSlide) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }
    showSlide(currentIndex);
}

function autoSlide() {
    setInterval(nextSlide, 5000); // Прокрутка каждые 3 секунды
}

window.addEventListener('resize', initializeSlider);

initializeSlider();
autoSlide();


//calculate function
document.getElementById('calculate').addEventListener('click', () => {
    const lessons = parseFloat(document.getElementById('lessons').value);
    const durationElement = document.getElementById('duration');
    const {price: durationPrice, discount: durationDiscount} = durationElement.options[durationElement.selectedIndex].dataset;

    const lessonDiscount = lessons > 1 ? (lessons - 1) * durationDiscount : 0;
    const pricePerLesson = durationPrice - lessonDiscount;
    const totalPrice = pricePerLesson * lessons;

    document.getElementById('result').innerHTML = `<h3>${txtPerLess} ${pricePerLesson} грн</h3><h3>${txtPerPeriod} ${totalPrice} грн</h3>`;
});




