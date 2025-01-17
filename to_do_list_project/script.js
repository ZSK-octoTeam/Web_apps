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
    $("body").on("click", 'img[src$="x.png"]', function() {
        let idi = $(this).closest('li').attr("id");
        let url = 'todo.php?js_data=' + encodeURIComponent(idi);
        window.location.href = url;
    });
    $("body").on("click", 'img[src$="check.png"]', function() {
        let idi = $(this).closest('li').attr("id");
        let url = 'todo.php?js_dat=' + encodeURIComponent(idi);
        window.location.href = url;
    });
});