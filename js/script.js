jQuery(document).ready(function($){
    let slides = $('.slide');
    let current = 0;

    function showSlide(index){
        slides.hide();
        $(slides[index]).fadeIn();
    }

    showSlide(current);

    setInterval(function(){
        current++;
        if(current >= slides.length) current = 0;
        showSlide(current);
    }, 5000);
});
