//test the script
/* $(document).ready(function(){
    alert("loaded");
}) */

$(document).ready(function() {
    $(".sub-menu").click(function(){
        $(this).children("ul").slideToggle();
    });

    $("ul").click(function(st){
        st.stopPropagation();
    });

   /*  $(".sub-menu").hover(function(){
        $("ul").css("background-color", "gray");
    }); */
});
