<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  </head>
  <body x-data="{ darkMode: false, }" :class="{ 'dark': darkMode }">

    @include('partials.nav')
    
    @yield('content')

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" class="fixed bottom-4 right-4 p-3 bg-blue-500 text-white 
    rounded-full shadow-lg opacity-0 transition-opacity duration-300 
    hover:bg-blue-600 focus:outline-none" style="display: none;">
        <i class="fas fa-arrow-up"></i> <!-- Optional icon -->
    </button>

    <script>
        // Get the button
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
                scrollToTopBtn.style.opacity = 1;
            } else {
                scrollToTopBtn.style.display = "none";
                scrollToTopBtn.style.opacity = 0;
            }
        };

        // When the user clicks the button, scroll to the top of the document
        scrollToTopBtn.onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    </script>

  </body>
</html>
