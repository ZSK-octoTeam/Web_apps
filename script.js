$(document).ready(function(){
    $("li").hover(
        function() {
            $(this).animate({ width: "70vw", height: "130px" }, 300);
        },
        function() {
            $(this).animate({ width: "60vw", height: "100px" }, 300);
        }
    );
});