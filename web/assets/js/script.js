/* goto top start*/
$(document).ready(function(){    
    $(window).scroll(function(){
        if($(this).scrollTop() >= 500) {
            $("#gotop").fadeIn();      
            $("#top-btn").click(function(){
                $(window).scrollTop(0);
            });
         }
         else $("#gotop").fadeOut();
    });
});
/* goto top end */

/* draggable scroll start */
function dragging(el) {
    const slider = document.querySelector(".test");
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", e => {
        isDown = true;
        //slider.classList.add("drag-active");
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
        // slider.classList.remove("drag-active");
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
        //slider.classList.remove("drag-active");
    });

    slider.addEventListener("mousemove", e => {
        if (!isDown) return;
        e.preventDefault();
        // slider.classList.add("drag-active");
        const x = e.pageX - slider.offsetLeft;
        const walk = x - startX;
        slider.scrollLeft = scrollLeft - walk;
    });
}
/* draggable scroll end */

//responsive menu buton
function menuBtnFunction(menuBtn) {
    menuBtn.classList.toggle("active");
    $(".mainMenu").toggleClass("active");
    $(".mainMenu a").toggleClass("active");
    $("#signup").toggleClass("active");
}