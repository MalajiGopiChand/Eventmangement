<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-100 text-gray-800">
  <header class="bg-white shadow-md">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <a href="index.php" class="flex items-center">
          <span class="text-2xl font-bold text-blue-600">EventMaster</span>
        </a>
        
        <!-- Desktop Navigation -->
        <!-- Add this inside the <body> -->
<div class="fixed top-4 right-4 flex gap-4">
  <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
  <a href="events.php" class="text-gray-700 hover:text-blue-600 font-medium">Events</a>
  <a href="gallery.php" class="text-gray-700 hover:text-blue-600 font-medium">Gallery</a>
  <a href="contact.php" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
</div>

        
        <!-- Authentication Buttons - Desktop -->
        <div class="hidden md:flex items-center space-x-4">
          <?php if (isset($_SESSION['user_id'])): ?>
            <div class="relative group">
              <button class="flex items-center text-gray-700 hover:text-blue-600 font-medium">
                <span>My Account</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                <a href="dashboard.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="my-events.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Events</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                  <a href="admin/index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Admin Panel</a>
                <?php endif; ?>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="includes/logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
              </div>
            </div>
          <?php else: ?>
            <!-- <a href="login.php" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
            <a href="register.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all">Sign Up</a> -->
          <?php endif; ?>
        </div>
        
        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-500" id="mobile-menu-button">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      
      <!-- Mobile Navigation -->
      <div class="md:hidden hidden pt-4" id="mobile-menu">
        <div class="flex flex-col space-y-3">
          <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Home</a>
          <a href="events.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Events</a>
          <a href="gallery.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Gallery</a>
          <a href="contact.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Contact</a>
          <?php if (isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Dashboard</a>
            <a href="profile.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Profile</a>
            <a href="my-events.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">My Events</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <a href="admin/index.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Admin Panel</a>
            <?php endif; ?>
            <a href="includes/logout.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Logout</a>
          <?php else: ?>
            <a href="login.php" class="text-gray-700 hover:text-blue-600 font-medium py-2">Login</a>
            <a href="register.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all text-center mt-2">Sign Up</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>