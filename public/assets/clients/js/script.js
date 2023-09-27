
document.addEventListener('DOMContentLoaded', function() {
  const links = document.querySelectorAll('.botheader a');
  const currentUrl = window.location.href;
  links.forEach(function(link) {
    if (link.href === currentUrl) {
      link.classList.add('active');
    }
  });
});