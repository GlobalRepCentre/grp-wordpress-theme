/**
 * File document-nav.js.
 *
 * Smooth scrolling for document-type pages
 * from css-tricks.com/snippets/jquery/smooth-scrolling/
 */

jQuery(document).ready(function($){
  $('a[href*="#"]')
  .click(function(event) {
    const target = $(this.hash);
    if (target.length) {
      event.preventDefault();

      $('html, body').animate({
        scrollTop: target.offset().top - 110
      }, 500, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
      
    }
  });
});