/**
 * File header-fader.js.
 *
 * Sets up an intersection observer for pages that 
 * start with a transparent header
 */

let siteHeader = document.getElementById('masthead');

// Check for Intersection Observer support
// per https://github.com/w3c/IntersectionObserver/issues/296
if (!('IntersectionObserver' in window) || !('IntersectionObserverEntry' in window) || !('intersectionRatio' in window.IntersectionObserverEntry.prototype)) {
  siteHeader.classList.add('active');
}

else {

  function createObserver() {
    let observer;
    let options = {
      root: null, // setting null uses the viewport
      rootMargin: '0px', // grow/shrink each side of root element bounding box before computing intersections
      threshold: 0.65 // when half of the target element is visible
    }
  
    observer = new IntersectionObserver(handleIntersect, options);
    observer.observe(siteHeader);
  }

  function handleIntersect(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (entry.intersectionRatio <= 0.65) {
          console.log('we have scrolled down past threshold');
          siteHeader.classList.add('active');
        }
        else {
          console.log('we have scrolled up past threshold');
          if (siteHeader.classList.contains('active')) {
            siteHeader.classList.remove('active');
          }
        }
      }
      else if (entry.intersectionRatio <= 0.65) {
        siteHeader.classList.add('active');
      }
    });
  }

  createObserver();

}
