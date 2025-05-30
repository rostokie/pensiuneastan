<?php 
     $title = "Login | Pensiunea Stan";
     include("../templates/header.php");
?>
 <main class="bg-white shadow-xl rounded-lg p-8 w-full">
     <section class="min-h-screen flex items-center justify-center bg-yellow-50">
     <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
     <h2 class="text-2xl font-bold text-yellow-950 mb-6 text-center">Login to Your Account</h2>

     <!-- Display Error Message if Exists -->
     <?php if (!empty($error)) : ?>
          <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded text-sm">
          <?= htmlspecialchars($error) ?>
          </div>
     <?php endif; ?>

     <form method="POST" class="space-y-5 w-full" action="functions/">
          <input type="hidden" name="action" value="login"/>
          <div>
          <label for="email" class="block text-sm font-medium text-yellow-950 mb-1">Email</label>
          <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-800 focus:outline-none">
          </div>

          <div>
          <label for="password" class="block text-sm font-medium text-yellow-950 mb-1">Password</label>
          <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-800 focus:outline-none">
          </div>

          <button type="submit"
               class="w-full bg-yellow-950 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-900 transition">
          Login
          </button>
     </form>
     <p class="text-center text-sm mt-4">
      Don't have an account?
      <a href="signup/" class="text-yellow-950 font-semibold hover:underline">Create one</a>
    </p>
     </div>
     </section>

</main>
<?php include("../templates/footer.php");