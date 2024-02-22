<section class="footer border-top py-3 bg-mainmenu">
<?php require_once('views/frontend/mod_menufooter.php'); ?>
    
</section>
<!--end footer-->

<section class="coppyright bg-mainmenu py-1 border-top">
    <div class="container">
        <div class="text-center">Thiết kế: Nguyễn Quốc Trọng</div>
    </div>
</section>
<!--end copyright-->

<!--Go top-->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i
        class="myBtn fa-sharp fa-solid fa-arrow-up"></i></button>
<script class="gotop bg-info">
var mybutton = document.getElementById("myBtn");
//end go top

window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>