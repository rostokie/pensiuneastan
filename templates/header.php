<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <base href="http://localhost/pensiun/">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
  $isHome = $title === "Pensiunea Stan | Welcome";
?>
<body class="font-poppins">
<!-- Responsive Header -->
<header class="fixed top-0 left-0 w-full z-50 hover:bg-white transition duration-300">
  <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto relative">
    <!-- Logo (centered on desktop, left on mobile) -->
    <div class="md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
      <a href="#">
        <img src="assets/logo2.png" alt="Logo" class="h-12">
      </a>
    </div>

    <!-- Hamburger Button (mobile only) -->
    <button id="menu-toggle" class="focus:outline-none z-50 p-2">
      <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 <?= $isHome ? 'text-white' : 'text-gray-800' ?>" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Navigation Links -->
    <nav id="nav-links"
      class="px-4 space-y-2 hidden text-yellow-950 bg-white absolute md:opacity-3 top-full md:w-2/6 w-full shadow-md flex flex-col md:items-start items-center text-center md:text-left">
      <a href="./" class="text-lg py-2 md:py-0 hover:text-yellow-600">Home</a>
      <a href="about/" class="text-lg py-2 md:py-0 hover:text-yellow-600">About</a>
      <a href="rooms/" class="text-lg py-2 md:py-0 hover:text-yellow-600">Rooms</a>
      <a href="services/" class="text-lg py-2 md:py-0 hover:text-yellow-600">Services</a>
      <a href="contact/" class="text-lg py-2 md:py-0 hover:text-yellow-600">Contact</a>
      <a href="login/" class="text-lg py-2 md:py-0 hover:text-yellow-600">Login</a>
    </nav>

    <!-- Right Side: Language + Reserve -->
    <div class="hidden md:flex space-x-4 items-center z-40 <?= $isHome ? 'text-white' : '' ?>">
      <div class="relative language-dropdown">
        <button class="text-sm md:text-base">EN</button>
        <ul class="hidden hover:block absolute bg-inherit shadow-md text-sm mt-1 right-0 w-20 z-50">
          <li><a href="./ro/" class="block px-4 py-2 <?= $isHome ? 'hover:bg-yellow-950' : 'hover:bg-gray-100' ?>">RO</a></li>
          <li><a href="./" class="block px-4 py-2 <?= $isHome ? 'hover:bg-yellow-950' : 'hover:bg-gray-100' ?>">EN</a></li>
        </ul>
      </div>
      <button class="bg-yellow-950 text-white px-4 py-2 rounded hover:bg-yellow-800" onClick="loadReservePage()">
        RESERVE
      </button>
    </div>
  </div>
</header>