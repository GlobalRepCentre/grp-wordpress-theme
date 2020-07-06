/**
 * File header-fader.js.
 *
 * Sets up an intersection observer for pages that 
 * start with a transparent header
 */

let intersectorSpan = document.getElementById('intersector');
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
      threshold: 1.0 // when 100% of the target is visible within the root element
    }
  
    observer = new IntersectionObserver(handleIntersect, options);
    observer.observe(intersectorSpan);
  }

  function handleIntersect(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (siteHeader.classList.contains('active')) {
          siteHeader.classList.remove('active');
        }
      }
      else {
        siteHeader.classList.add('active');
      }
    });
  }

  createObserver();

}
