<footer class="footer">
    <script src="<?php echo get_template_directory_uri(); ?>/js/control.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sweetalert2.min.css">
    <script>
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
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
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
        <p>CopyRight &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo(
     'url'
 ); ?>"><?php bloginfo('name'); ?></a>.</p>
    </div>
</footer>
</body>
</html>