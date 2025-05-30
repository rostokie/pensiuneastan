<?php 
    $title = "Contact | Pensiunea Stan";
    include("../templates/header.php");
?>
<main class="pt-20">
    <section class="w-full py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Get in Touch</h2>
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="bg-white p-8 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Contact Information</h3>
                <p class="mb-4 text-gray-600">We'd love to hear from you. Reach us via any of the methods below:</p>
                <ul class="space-y-4 text-gray-700">
                    <li><strong>Address:</strong> 123 Main Street, Your City, Country</li>
                    <li><strong>Email:</strong> contact@pensiuneastan.com</li>
                    <li><strong>Phone:</strong> +234 800 000 0000</li>
                </ul>
            </div>

        </div>
    </section>
</main>
<?php include("../templates/footer.php");