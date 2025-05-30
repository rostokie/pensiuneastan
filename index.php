<?php
  $title = "Pensiunea Stan | Welcome";
  include("templates/header.php");
  ?>
  <video autoplay muted loop class="absolute w-full h-full object-cover z-0">
    <source src="assets/intro-pensiune.mp4" type="video/mp4">
  </video>
  <main>
    <section id="hero" class="relative h-screen">
      <div class="absolute w-full h-full bg-black bg-opacity-50 z-10 flex items-center justify-center px-2">
        <h1 class="text-white text-5xl md:text-6xl font-bold">Welcome to Pensiunea Stan</h1>
      </div>
    </section>

    <section id="services" class="bg-gray-100 py-16 px-6">
      <div class="container mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-8">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white shadow-md p-6 rounded-lg">
            <h3 class="text-xl font-bold mb-2">Cozy Rooms</h3>
            <p class="text-gray-700">Spacious and comfortable rooms for families, couples, and solo travelers.</p>
          </div>
          <div class="bg-white shadow-md p-6 rounded-lg">
            <h3 class="text-xl font-bold mb-2">Traditional Cuisine</h3>
            <p class="text-gray-700">Enjoy authentic Romanian dishes prepared with local ingredients.</p>
          </div>
          <div class="bg-white shadow-md p-6 rounded-lg">
            <h3 class="text-xl font-bold mb-2">Outdoor Activities</h3>
            <p class="text-gray-700">Explore nature with hiking, biking, or simply relaxing in our garden.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="carousel relative overflow-hidden w-full py-8 px-4">
      <div id="carousel-outer" class="overflow-hidden w-full">
        <div id="carousel-track" class="flex transition-transform duration-500 ease-in-out space-x-5">
          <!-- Slide -->
          <div class="relative md:w-1/3 w-full shrink-0 h-[300px]">
            <img src="assets/rooms/double/1_bathroom.jpg" alt="Double Room"
                class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-12 left-0 w-full text-center text-white bg-black/40 py-2 mb-3">
              <p class="text-lg font-semibold">Double Room</p>
            </div>
            <button 
            class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-yellow-950 text-white mt-2 px-4 py-2 rounded" 
            onClick="loadReservePage()">
              Reserve
            </button>
          </div>
          <div class="relative md:w-1/3 w-full shrink-0 h-[300px]">
            <img src="assets/rooms/triple/4_room.jpg" alt="Triple Room"
                class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-12 left-0 w-full text-center text-white bg-black/40 py-2 mb-3">
              <p class="text-lg font-semibold">Triple Room</p>
            </div>
            <button class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-yellow-950 text-white mt-2 px-4 py-2 rounded">
              Reserve
            </button>
          </div>
          <div class="relative md:w-1/3 w-full shrink-0 h-[300px]">
            <img src="assets/rooms/apartment/12_room.jpg" alt="12 Room"
                class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-12 left-0 w-full text-center text-white bg-black/40 py-2 mb-3">
              <p class="text-lg font-semibold">12 Room</p>
            </div>
            <button class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-yellow-950 text-white mt-2 px-4 py-2 rounded">
              Reserve
            </button>
          </div>
          <div class="relative md:w-1/3 w-full shrink-0 h-[300px]">
            <img src="assets/rooms/triple/7_room.jpg" alt="Triple Room"
                class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-12 left-0 w-full text-center text-white bg-black/40 py-2 mb-3">
              <p class="text-lg font-semibold">Triple Room</p>
            </div>
            <button class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-yellow-950 text-white mt-2 px-4 py-2 rounded">
              Reserve
            </button>
          </div>
          <div class="relative md:w-1/3 w-full shrink-0 h-[300px]">
            <img src="assets/rooms/apartment/hall.jpg" alt="Hall"
                class="w-full h-full object-cover rounded-lg">
            <div class="absolute bottom-12 left-0 w-full text-center text-white bg-black/40 py-2 mb-3">
              <p class="text-lg font-semibold">Hall</p>
            </div>
            <button class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-yellow-950 text-white mt-2 px-4 py-2 rounded">
              Reserve
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php include("templates/footer.php");