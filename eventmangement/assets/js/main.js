document.addEventListener('DOMContentLoaded', function() {
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
    });
  }
  
  // FAQ toggle
  window.toggleFAQ = function(id) {
    const content = document.getElementById(`faq-content-${id}`);
    const chevron = document.getElementById(`faq-chevron-${id}`);
    
    if (content && chevron) {
      content.classList.toggle('hidden');
      chevron.classList.toggle('rotate-180');
    }
  };
  
  // Form validation for registration
  const registrationForm = document.getElementById('registrationForm');
  if (registrationForm) {
    registrationForm.addEventListener('submit', function(e) {
      const firstName = document.getElementById('firstName').value.trim();
      const lastName = document.getElementById('lastName').value.trim();
      const email = document.getElementById('email').value.trim();
      const terms = document.getElementById('terms').checked;
      
      let valid = true;
      let errorMessage = '';
      
      if (!firstName) {
        valid = false;
        errorMessage += 'First name is required. ';
      }
      
      if (!lastName) {
        valid = false;
        errorMessage += 'Last name is required. ';
      }
      
      if (!email) {
        valid = false;
        errorMessage += 'Email is required. ';
      } else if (!isValidEmail(email)) {
        valid = false;
        errorMessage += 'Email is not valid. ';
      }
      
      if (!terms) {
        valid = false;
        errorMessage += 'You must agree to the terms and conditions. ';
      }
      
      if (!valid) {
        e.preventDefault();
        alert('Please correct the following errors: ' + errorMessage);
      }
    });
  }
  
  // Form validation for contact form
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const subject = document.getElementById('subject').value.trim();
      const message = document.getElementById('message').value.trim();
      const privacy = document.getElementById('privacy').checked;
      
      let valid = true;
      let errorMessage = '';
      
      if (!name) {
        valid = false;
        errorMessage += 'Name is required. ';
      }
      
      if (!email) {
        valid = false;
        errorMessage += 'Email is required. ';
      } else if (!isValidEmail(email)) {
        valid = false;
        errorMessage += 'Email is not valid. ';
      }
      
      if (!subject) {
        valid = false;
        errorMessage += 'Subject is required. ';
      }
      
      if (!message) {
        valid = false;
        errorMessage += 'Message is required. ';
      }
      
      if (!privacy) {
        valid = false;
        errorMessage += 'You must agree to the privacy policy. ';
      }
      
      if (!valid) {
        e.preventDefault();
        alert('Please correct the following errors: ' + errorMessage);
      }
    });
  }
  
  // Event filtering
  const categoryFilter = document.getElementById('category-filter');
  const dateFilter = document.getElementById('date-filter');
  const locationFilter = document.getElementById('location-filter');
  
  if (categoryFilter && dateFilter && locationFilter) {
    const filterEvents = function() {
      // In a real application, this would trigger an AJAX call or form submission
      // For now, we'll just simulate by reloading the page with query parameters
      const category = categoryFilter.value;
      const date = dateFilter.value;
      const location = locationFilter.value;
      
      let url = 'events.php?';
      if (category) url += `category=${category}&`;
      if (date) url += `date=${date}&`;
      if (location) url += `location=${location}&`;
      
      window.location.href = url.slice(0, -1); // Remove trailing & or ?
    };
    
    categoryFilter.addEventListener('change', filterEvents);
    dateFilter.addEventListener('change', filterEvents);
    locationFilter.addEventListener('change', filterEvents);
  }
  
  // Calculate ticket price
  const ticketTypeRadios = document.querySelectorAll('input[name="ticketType"]');
  const quantitySelect = document.getElementById('quantity');
  
  if (ticketTypeRadios.length > 0 && quantitySelect) {
    const calculatePrice = function() {
      // In a real application, this would update a price display
      console.log('Price calculation would happen here');
    };
    
    ticketTypeRadios.forEach(radio => {
      radio.addEventListener('change', calculatePrice);
    });
    
    quantitySelect.addEventListener('change', calculatePrice);
  }
  
  // Helper function to validate email
  function isValidEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
  }
});