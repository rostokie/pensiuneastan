<?php 
     $title = "Sign Up | Pensiunea Stan";
     include("../templates/header.php");
?>
 <main class="bg-white shadow-xl rounded-lg p-8 w-full">
 <section class="min-h-screen flex items-center justify-center bg-yellow-50">
  <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-yellow-950 mb-6 text-center">Create an Account</h2>

    <?php if (!empty($error)) : ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded text-sm">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5 w-full">
      <div>
        <label for="name" class="block text-sm font-medium text-yellow-950 mb-1">Full Name</label>
        <input type="text" name="name" id="name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-800 focus:outline-none">
      </div>

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

      <div>
        <label for="role" class="block text-sm font-medium text-yellow-950 mb-1">Role</label>
        <select name="role" id="role" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-800 focus:outline-none">
          <option value="user">User</option>
          <!-- TODO: Decide if employer's accounts will be created by themselves or by admin -->
          <!-- <option value="employer">Employer</option> -->
        </select>
      </div>

      <button type="submit"
              class="w-full bg-yellow-950 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-900 transition">
        Sign Up
      </button>
    </form>

    <p class="text-center text-sm mt-4">
      Already have an account?
      <a href="login.php" class="text-yellow-950 font-semibold hover:underline">Login here</a>
    </p>
  </div>
</section>


</main>
<?php include("../templates/footer.php");