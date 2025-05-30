<?php 
    $title = "Services | Pensiunea Stan";
    include("../templates/header.php");
?>
<main class="pt-20">
    <section class="w-full py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center uppercase">Our Services</h2>
            <p class="text-gray-600 mb-10">
                We offer a wide range of amenities to make your stay comfortable and memorable.
                Here's what's included in your stay, and a few extras you can enjoy for an additional fee:
            </p>
            <!-- Included Services -->
            <h3 class="text-2xl font-semibold text-primary mb-6">Services Included in the Price</h3>
            <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                <!-- Outdoor Relaxation & Fun -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Outdoor Relaxation & Fun</h4>
                    <ul class="list-disc list-inside space-y-5">
                        <li><strong>Barbecue facilities:</strong> Enjoy open-air grilling with friends or family.</li>
                        <li><strong>Chill-out area:</strong> Cozy space for relaxation and casual chats.</li>
                        <li><strong>Relaxation hammocks:</strong> Perfect for a peaceful afternoon nap outdoors.</li>
                        <li><strong>Sunbeds:</strong> Lounge comfortably and soak up the sun.</li>
                        <li><strong>Swimming pool:</strong> Cool off in our outdoor pool (summer only).</li>
                        <li><strong>Ping pong table:</strong> Great for some lighthearted competition.</li>
                        <li><strong>Board games:</strong> Backgammon, Rummy, cards and more available anytime.</li>
                    </ul>
                </div>

                <!-- Children's Activities & Comfort -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Children’s Activities</h4>
                    <ul class="list-disc list-inside mb-4 space-y-5">
                        <li><strong>Trampoline:</strong> A fun and active way for kids to play safely.</li>
                        <li><strong>Swings and slide:</strong> Outdoor playground fun for younger guests.</li>
                    </ul>

                    <h4 class="text-lg font-semibold mb-2">Comfort Amenities</h4>
                    <ul class="list-disc list-inside space-y-1">
                        <li><strong>Air conditioning:</strong> Stay cool and comfortable indoors, even in peak summer.
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="w-full py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Services Available at an Additional Cost</h3>

            <div class="grid md:grid-cols-2 gap-8 text-gray-700">

                <!-- Breakfast -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-primary">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Breakfast</h4>
                    <p class="mb-2">Includes local cheeses and cold cuts, fresh vegetables, eggs, jam, butter, and
                        coffee or tea.</p>
                    <p class="font-bold text-primary">35 RON/person</p>
                </div>

                <!-- Lunch -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-primary">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Lunch</h4>
                    <p class="mb-2">A traditional Romanian soup followed by a delicious main course.</p>
                    <p class="font-bold text-primary">50 RON/person</p>
                </div>

                <!-- Dinner -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-primary">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Dinner</h4>
                    <p class="mb-2">Enjoy a hearty main course in a cozy setting.</p>
                    <p class="font-bold text-primary">45 RON/person</p>
                </div>

                <!-- Festive Menus -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-primary">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Festive Menus</h4>
                    <p class="mb-2">Ideal for baptisms and other special events. We offer custom menu options tailored
                        to your celebration.</p>
                    <p class="font-bold text-primary">Price upon request</p>
                </div>

                <!-- Pet Accommodation -->
                <div class="bg-white shadow rounded-lg p-6 border-l-4 border-primary md:col-span-2">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Pet Accommodation</h4>
                    <p class="mb-2">Your furry friends are welcome! We offer comfortable arrangements for pets.</p>
                    <p class="font-bold text-primary">From 30 RON/pet/night</p>
                </div>

            </div>
        </div>
    </section>

</main>
<?php include("../templates/footer.php");