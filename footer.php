<!-- footer.php -->

<?php $site_footer = carbon_get_theme_option( 'site_footer' ); ?>

<footer id="site_footer" class="tac">
    <?= $site_footer ?>
</footer>
<?php wp_footer(); ?>

</body>
</html>
