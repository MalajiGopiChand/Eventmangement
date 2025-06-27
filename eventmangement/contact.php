<?php include_once './includes/header.php'; ?>

<main class="container mx-auto px-4 py-8">
  <div class="max-w-5xl mx-auto">
    <h1 class="text-4xl font-bold mb-8 text-center">Contact Us</h1>
    
    <!-- Contact Information and Form -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <!-- Contact Information -->
      <div>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
          <h2 class="text-2xl font-bold mb-4">Get In Touch</h2>
          <p class="text-gray-600 mb-6">Have questions about events, registrations, or anything else? Reach out to our team and we'll get back to you as soon as possible.</p>
          
          <div class="space-y-4">
            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold">Phone</h3>
                <p class="text-gray-600">+1 (123) 456-7890</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold">Email</h3>
                <p class="text-gray-600">info@eventmanagement.com</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold">Address</h3>
                <p class="text-gray-600">123 Event Street<br>New York, NY 10001<br>United States</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-2xl font-bold mb-4">Office Hours</h2>
          <table class="w-full">
            <tbody>
              <tr>
                <td class="py-2 font-medium">Monday - Friday:</td>
                <td class="py-2">9:00 AM - 6:00 PM</td>
              </tr>
              <tr>
                <td class="py-2 font-medium">Saturday:</td>
                <td class="py-2">10:00 AM - 4:00 PM</td>
              </tr>
              <tr>
                <td class="py-2 font-medium">Sunday:</td>
                <td class="py-2">Closed</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- Contact Form -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Send Us a Message</h2>
        <form action="./includes/process-contact.php" method="POST" id="contactForm">
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name*</label>
            <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>
          
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address*</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>
          
          <div class="mb-4">
            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject*</label>
            <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>
          
          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium mb-2">Message*</label>
            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
          </div>
          
          <div class="mb-6">
            <div class="flex items-start">
              <input type="checkbox" id="privacy" name="privacy" required class="h-4 w-4 mt-1 text-blue-600">
              <label for="privacy" class="ml-3 text-gray-700 text-sm">
                I agree to the <a href="#" class="text-blue-600 hover:text-blue-800">Privacy Policy</a> and consent to having my data processed.
              </label>
            </div>
          </div>
          
          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all">
            Send Message
          </button>
        </form>
      </div>
    </div>
    
    <!-- Map -->
    <div class="mt-12">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Our Location</h2>
        <div class="aspect-w-16 aspect-h-9">
          <img src="assets/images/map-location.jpg" alt="Office Location Map" class="rounded-lg w-full">
        </div>
      </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="mt-12">
      <h2 class="text-3xl font-bold mb-6 text-center">Frequently Asked Questions</h2>
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
          <div>
            <button class="flex justify-between items-center w-full py-3 px-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all focus:outline-none" onclick="toggleFAQ(1)">
              <span class="font-semibold">How do I register for an event?</span>
              <svg id="faq-chevron-1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="faq-content-1" class="hidden px-4 pt-2 pb-4">
              <p class="text-gray-600">To register for an event, navigate to the event's details page and click the "Register Now" button. Follow the instructions to complete your registration and payment if required.</p>
            </div>
          </div>
          
          <div>
            <button class="flex justify-between items-center w-full py-3 px-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all focus:outline-none" onclick="toggleFAQ(2)">
              <span class="font-semibold">Can I cancel my registration?</span>
              <svg id="faq-chevron-2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="faq-content-2" class="hidden px-4 pt-2 pb-4">
              <p class="text-gray-600">Yes, you can cancel your registration up to 48 hours before the event starts. Please visit your account dashboard and select the registration you wish to cancel. Refund policies vary by event.</p>
            </div>
          </div>
          
          <div>
            <button class="flex justify-between items-center w-full py-3 px-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-all focus:outline-none" onclick="toggleFAQ(3)">
              <span class="font-semibold">How can I become an event organizer?</span>
              <svg id="faq-chevron-3" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="faq-content-3" class="hidden px-4 pt-2 pb-4">
              <p class="text-gray-600">To become an event organizer, please contact our team through this form or at organizer@eventmanagement.com. We'll provide you with the necessary information and guide you through the process.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include_once './includes/footer.php'; ?>