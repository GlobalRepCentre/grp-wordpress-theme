<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global_Reporting_Program
 */

?>

	<footer id="colophon" class="site-footer">
    <div class="footer-content">
      <p>An initiative of the <a href="https://globalreportingcentre.org/">Global Reporting Centre</a>, based at the University of British Columbia's School of Journalism, Writing, and Media.</p>
      <div class="site-info">
        <div>
          <?php if (is_page('about')) : ?>
            <a class="button" href="/projects">View past projects</a>
          <?php else : ?>
            <a class="button" href="/about">Learn more about the GRP</a>
          <?php endif; ?>
        </div>
        <div class="site-logos">
          <a href="https://journalism.ubc.ca"><img width="300" height="34" alt="UBC School of Journalism, Writing, and Media" src="https://globalreportingprogram.org/wp-content/uploads/2020/08/ubc-journalism-writing-media-wordmark.png" /></a>
          <a href="https://globalreportingcentre.org/"><img width="110" alt="Global Reporting Centre" src="https://globalreportingprogram.org/wp-content/uploads/2020/08/global_reporting_centre_logo.png" /></a>
        </div>
      </div>
    </div>
	</footer>

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140527393-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140527393-2');
</script>

</body>
</html>
