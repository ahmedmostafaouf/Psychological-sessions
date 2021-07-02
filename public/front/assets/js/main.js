$(document).ready(function(){
    $('#icon').click(function(){
        $('ul').toggleClass('show');
    })
})

var btnTop = document.getElementById("topBtn"),
    review = document.getElementById("contact");

window.onscroll = function(){
    if (document.documentElement.scrollTop > 300){
        btnTop.style.display = "block";
    } else{
        btnTop.style.display = "none";
    }
}

btnTop.addEventListener("click", function(){
    window.scroll({
        top: 0 ,
        left: 0 ,
        behavior: "smooth"
    });
});
