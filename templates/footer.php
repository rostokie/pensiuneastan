<footer class="bg-yellow-950 text-white py-8 md:px-12 px-4">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
      <div>
        <h2 class="text-xl font-bold mb-4">Contact</h2>
        <span class="space-y-2">
          <p> <span  class="hover:cursor-pointer">123  Main Street, City, Country </span></p>
          <p>Email: <span  class="hover:cursor-pointer"> info@pensiuneastan.com </span></p>
          <p>Phone: <span  class="hover:cursor-pointer"> +40 123 456 789 </span></p>
        </span>
      </div>
      <div>
        <h2 class="text-xl font-bold mb-4">Quick Links</h2>
        <ul class="space-y-2">
          <li><a href="./" class="hover:underline">Home</a></li>
          <li><a href="services/" class="hover:underline">Services</a></li>
          <li><a href="contact/" class="hover:underline">Contact</a></li>
        </ul>
      </div>
      <div>
        <h2 class="text-xl font-bold mb-4">Follow Us</h2>
        <p>Facebook | Instagram | Twitter</p>
      </div>
    </div>
  </footer>

  <!-- Preloader -->
  <div id="preloader" class="fixed inset-0 bg-white flex items-center justify-center z-50 transition-opacity duration-500">
    <div class="w-16 h-16 border-4 border-yellow-950 border-t-transparent rounded-full animate-spin"></div>
  </div>

  <!-- Alert::Using this instead of default alert -->
<div id="customAlertModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white max-w-md w-full p-6 rounded-lg shadow-lg text-center">
    <p id="customAlertMessage" class="text-yellow-950 text-lg font-medium mb-4"></p>
    <button onclick="closeCustomAlert()" class="bg-yellow-950 text-white px-4 py-2 rounded hover:opacity-90">OK</button>
  </div>
</div>

  <script src="js/main.js"></script>
  <script src="js/booking.js"></script>
</body>
</html>