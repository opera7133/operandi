<footer class="footer">
    <script src="<?php echo get_template_directory_uri(); ?>/js/control.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/clipboard.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sweetalert2.min.css">
    <script>
        <?php if (get_theme_mod("or_ads_id")): ?>
        (function(window, document) {
            function main() {
                var ad = document.createElement('script');
                ad.async = true;
                ad.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo get_theme_mod(
                    "or_ads_id"
                ); ?>';
                ad.crossOrigin = "anonymous"
                var sc = document.getElementsByTagName('script')[0];
                sc.parentNode.insertBefore(ad, sc);
            }

            var lazyLoad = false;
            function onLazyLoad() {
                if (lazyLoad === false) {
                lazyLoad = true;
                window.removeEventListener('scroll', onLazyLoad);
                window.removeEventListener('mousemove', onLazyLoad);
                window.removeEventListener('mousedown', onLazyLoad);
                window.removeEventListener('touchstart', onLazyLoad);
                window.removeEventListener('keydown', onLazyLoad);
                main();
                }
            }
            window.addEventListener('scroll', onLazyLoad);
            window.addEventListener('mousemove', onLazyLoad);
            window.addEventListener('mousedown', onLazyLoad);
            window.addEventListener('touchstart', onLazyLoad);
            window.addEventListener('keydown', onLazyLoad);
            window.addEventListener('load', function() {
                if (window.pageYOffset) {
                onLazyLoad();
                window.setTimeout(onLazyLoad,3000)
                }
            });
            })(window, document);
        <?php endif; ?>
        function toggleNav() {
            var a = document.getElementById('hamburgerbtn'),
                b = document.getElementById('overlay'),
                c = document.body;
            a.addEventListener('click', function () {
                b.classList.toggle('open'),
                a.classList.toggle('is-open'),
                c.classList.toggle('scroll-lock');
            });
        }
        toggleNav();
        new ClipboardJS('.url');
        function OnClickURL() {
            Swal.fire({
                icon: 'success',
                title: '完了！',
                text: 'URLとタイトルをコピーしました。',
                confirmButtonColor: "var(--primary-color, #252525)",
            })
        }
    </script>
    <div>
        <p>CopyRight &copy; <?php echo date("Y"); ?> <a href="<?php bloginfo(
     "url"
 ); ?>"><?php bloginfo("name"); ?></a>.</p>
    </div>
</footer>
</body>
</html>