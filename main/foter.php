<footer>
    <div class="foter">
        <div class="picture">
            <img src="../pictures/home_bistro_footer_pic.png" alt="">
        </div>
        <div class="slogan">
            گروه رستوران های زنجیره ای سی فایو با کادری بی نظیر در خدمت شماست. میزبان خاطرات خوب و خوش طعم شما هستیم.
        </div>
        <div class="socials">
            <div class="social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-google-plus-g"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-pinterest-p"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery.js"></script>
<script>
    function isEmpty() {
        if ($('.empty').length > 0) {
            $('.shopcart').parent().css('display', 'none');
            $('.shopcart').load(document.URL + ' .shopcart');

        }
    }


    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }


    function AddToCart(id) {
        var request = new XMLHttpRequest();
        request.open('GET', "./layout/shop.php?product=" + id, true);
        request.onreadystatechange = function () {
            if ((request.readyState === 4) && (request.status === 200)) {
                $('.shopcart').load(document.URL + ' #cart');
                isEmpty();
                $('.shopcart').load(document.URL + ' .shopcart');

            }
        }
        request.send();
    }

    function deletecart(id) {
        var request = new XMLHttpRequest();
        request.open("GET", "./layout/delete.php?delete=" + id, true);
        request.onreadystatechange = function () {
            if ((request.readyState === 4) && (request.status === 200)) {
                $('.shopcart').load(document.URL + ' #cart');
                isEmpty();
                $('.shopcart').load(document.URL + ' .shopcart');

            }
        }
        request.send();
    }
    isEmpty();
</script>