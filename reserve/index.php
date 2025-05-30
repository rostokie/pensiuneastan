<?php 
    $title = "Reservation | Pensiunea Stan";
    include("../templates/header.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>

<main class="pt-20 bg-white">
     <section class="w-full py-12 px-4">
          <div class="max-w-6xl mx-auto relative">
               <!-- Title -->
               <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-yellow-950">Reservations</h2>
               </div>

               <!-- Description -->
               <p class="mb-8 text-gray-700">
                    Reserve a room with us and enjoy a comfortable stay at Pensiunea Stan.
                    Our rooms are designed to provide you with the best experience possible,
                    ensuring your comfort and satisfaction.
               </p>

               <!-- Date Range Picker -->
               <div class="mb-8" id="dateSelector">
                    <label for="dateRange" class="text-yellow-950 font-semibold">Select Date Range:</label>
                    <input type="text" id="dateRange" class="border p-2 rounded w-full max-w-md"
                         placeholder="Check-in - Check-out">
               </div>

               <!-- Rooms + Cart Layout -->
               <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Rooms Grid -->
                    <div class="lg:col-span-2 grid sm:grid-cols-1 md:grid-cols-2 gap-6" id="rooms-container">
                         <!-- Room cards injected via JS -->
                    </div>

                    <!-- Cart Sidebar -->
                    <div
                         class="lg:col-span-1 bg-yellow-50 border border-yellow-100 p-6 rounded shadow sticky top-24 h-fit">
                         <h3 class="text-lg font-bold text-yellow-950 mb-4">Your Reservation</h3>
                         <ul id="cart-items" class="space-y-2 text-sm text-gray-800"></ul>
                         <div class="mt-4 border-t pt-4 text-yellow-950 font-semibold">
                              Total: <span id="total-price">0 Lei</span>
                         </div>
                         <input type="email" id="userEmail" placeholder="Email address" class="w-full mb-2 px-3 py-2 border border-gray-300 rounded" required />
                         <input type="tel" id="userPhone" placeholder="Phone number" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded" />
                         <button onclick="finalizeReservation()"
                              class="mt-4 w-full bg-yellow-950 text-white py-2 rounded hover:opacity-90">
                              Reserve
                         </button>
                    </div>

               </div>
          </div>
     </section>

     <!-- Image Modal -->
     <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
          <div onclick="closeImageModal()" class="absolute inset-0 cursor-zoom-out"></div>
          <img id="modalImage" src="" alt="" class="max-w-4xl max-h-[90vh] z-50 rounded shadow-xl">
     </div>
</main>
<?php include("../templates/footer.php"); ?>
<script>
     document.addEventListener("DOMContentLoaded", () => {
          // Render rooms for reservation
          renderRooms();
     });
</script>