document.addEventListener('DOMContentLoaded', function() {
  // Mobile sidebar toggle
  const mobileMenuButton = document.querySelector('button.md\\:hidden');
  const sidebar = document.querySelector('aside');
  
  if (mobileMenuButton && sidebar) {
    mobileMenuButton.addEventListener('click', function() {
      sidebar.classList.toggle('hidden');
      sidebar.classList.toggle('fixed');
      sidebar.classList.toggle('z-50');
      sidebar.classList.toggle('top-0');
      sidebar.classList.toggle('left-0');
      sidebar.classList.toggle('h-full');
    });
  }
  
  // Admin dropdown toggle
  const adminDropdownButton = document.querySelector('header button.flex.items-center');
  const adminDropdownMenu = document.querySelector('header .absolute');
  
  if (adminDropdownButton && adminDropdownMenu) {
    adminDropdownButton.addEventListener('click', function() {
      adminDropdownMenu.classList.toggle('hidden');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
      if (!adminDropdownButton.contains(event.target) && !adminDropdownMenu.contains(event.target)) {
        adminDropdownMenu.classList.add('hidden');
      }
    });
  }
  
  // Event delete confirmation
  const deleteLinks = document.querySelectorAll('a[href*="delete"]');
  
  if (deleteLinks.length > 0) {
    deleteLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
          e.preventDefault();
        }
      });
    });
  }
  
  // Form validation for event creation/editing
  const eventForm = document.getElementById('eventForm');
  
  if (eventForm) {
    eventForm.addEventListener('submit', function(e) {
      const title = document.getElementById('title').value.trim();
      const date = document.getElementById('date').value;
      const location = document.getElementById('location').value.trim();
      const description = document.getElementById('description').value.trim();
      
      let valid = true;
      let errorMessage = '';
      
      if (!title) {
        valid = false;
        errorMessage += 'Event title is required. ';
      }
      
      if (!date) {
        valid = false;
        errorMessage += 'Event date is required. ';
      }
      
      if (!location) {
        valid = false;
        errorMessage += 'Event location is required. ';
      }
      
      if (!description) {
        valid = false;
        errorMessage += 'Event description is required. ';
      }
      
      if (!valid) {
        e.preventDefault();
        alert('Please correct the following errors: ' + errorMessage);
      }
    });
  }
  
  // Image preview for event creation/editing
  const imageInput = document.getElementById('image');
  const imagePreview = document.getElementById('imagePreview');
  
  if (imageInput && imagePreview) {
    imageInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          imagePreview.classList.remove('hidden');
        };
        
        reader.readAsDataURL(this.files[0]);
      }
    });
  }
  
  // Dynamic form fields for event creation/editing
  const addTicketTypeButton = document.getElementById('addTicketType');
  const ticketTypesContainer = document.getElementById('ticketTypes');
  
  if (addTicketTypeButton && ticketTypesContainer) {
    let ticketTypeCounter = document.querySelectorAll('.ticket-type-row').length;
    
    addTicketTypeButton.addEventListener('click', function() {
      ticketTypeCounter++;
      
      const newRow = document.createElement('div');
      newRow.className = 'ticket-type-row grid grid-cols-3 gap-4 mb-4 items-center';
      newRow.innerHTML = `
        <div>
          <input type="text" name="ticketTypes[${ticketTypeCounter}][name]" placeholder="Ticket Type" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
          <input type="number" name="ticketTypes[${ticketTypeCounter}][price]" placeholder="Price" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
          <button type="button" class="remove-ticket-type text-red-600 hover:text-red-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </button>
        </div>
      `;
      
      ticketTypesContainer.appendChild(newRow);
      
      // Add event listener to the new remove button
      newRow.querySelector('.remove-ticket-type').addEventListener('click', function() {
        newRow.remove();
      });
    });
    
    // Add event listeners to existing remove buttons
    document.querySelectorAll('.remove-ticket-type').forEach(button => {
      button.addEventListener('click', function() {
        this.closest('.ticket-type-row').remove();
      });
    });
  }
});