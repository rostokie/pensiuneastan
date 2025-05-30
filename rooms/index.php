<?php 
    $title = "Rooms | Pensiunea Stan";
    include("../templates/header.php");
?>
<main class="pt-20">
    <section class="w-full py-12 px-4 bg-white">
        <div class="max-w-6xl mx-auto relative">
            <!-- Sort Button -->
            <div class="flex justify-between items-center mb-6">
                <h2 id="room-category-title" class="text-2xl font-bold text-yellow-950">Double Rooms</h2>
                <select id="categoryFilter" class="border border-yellow-950 text-yellow-950 rounded px-4 py-2">
                    <option value="double" class="active:bg-yellow-950 active:text-white">Double</option>
                    <option value="triple" class="active:bg-yellow-950 active:text-white">Triple</option>
                    <option value="apartment" class="active:bg-yellow-950 active:text-white">Apartment</option>
                    <option value="hall" class="active:bg-yellow-950 active:text-white">Hall</option>
                </select>
            </div>

            <!-- Category Description -->
            <p id="room-category-description" class="mb-8 text-gray-700">
                Cozy double rooms perfect for couples or solo travelers, featuring elegant furnishings and modern
                comforts.
            </p>

            <!-- Rooms Grid -->
            <div id="roomGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Room Card Template -->
                <!-- Cards will be injected via JS -->
            </div>
        </div>
    </section>

    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
        <div onclick="closeImageModal()" class="absolute inset-0 cursor-zoom-out"></div>
    <img id="modalImage" src="" alt="" class="max-w-4xl max-h-[90vh] z-50 rounded shadow-xl">
</div>
</main>
<?php include("../templates/footer.php");