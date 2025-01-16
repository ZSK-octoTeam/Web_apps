$(document).ready(function(){
    $("li").hover(
        function() {
            $(this).animate({ width: "70vw", height: "130px" }, 300);
        },
        function() {
            $(this).animate({ width: "60vw", height: "100px" }, 300);
        }
    );
    $("img").next(".nextP").hide();
    $("img").hover(
        function() {
            $(this).next(".nextP").fadeIn(200);
            $(this).css("opacity", 0.5);
        },
        function() {
            $(this).next(".nextP").fadeOut(200);
            $(this).css("opacity", 1);
        }
    );
    $("img[src='check.png']").click(function() {
        
    });
    $("img[src='x.png']").click(function() {
        
    });
});