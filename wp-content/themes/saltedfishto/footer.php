            <footer class="footer text-center py-2 theme-bg-dark">
                <p class="copyright">
                    <a href="https://youtube.com/FollowAndrew">FollowAndrew</a>
                </p>
                <?php
                    wp_nav_menu(
                        array(
                            'menu' => 'footer',
                            'container' => '',
                            'theme_location' => 'footer',
                            'items_wrap' => '<ul id="" class="navbar-nav flex-column text-sm-center text-md-left">%3$s</ul>'
                        )
                    );
                    dynamic_sidebar( 'footer-widget' )
                ?>
            </footer>
        </div>
        <?php
            wp_footer();
        ?>
    </body>
</html>