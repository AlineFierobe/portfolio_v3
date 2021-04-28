</main>
<footer>
    <?php if(is_page_template('templates/homepage.php')){ ?>
    <div class="footer-dark">
        www.alinefierobe.com © <span id="currentYear"></span>
    </div>
    <?php } else { ?>
    <div class="footer-light">
        www.alinefierobe.com © <span id="currentYear"></span>
    </div>
    <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>