  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script>
    // code for alert message
    function alert(type, msg,position='body') {
      let bs_class = (type == "success") ? 'alert-success' : 'alert-danger';
      let element = document.createElement('div');
      element.classList.add('custom-alert'); // Ensure this class is added
      element.innerHTML = `
      <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
        <strong me-3>${msg}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        `;
      document.body.append(element);
      // Auto-dismiss after 3 seconds
      setTimeout(() => {
        element.querySelector('.alert').classList.remove('show');
        element.remove();
      }, 3000);
    }

    // code to make the page look active on admin dashboard
    function setActive() {
      const navbar = document.getElementById('dashboard-menu');
      if (!navbar) {
        console.error("Navbar element not found");
        return; // Exit if the navbar is not found
      }

      const a_tags = navbar.getElementsByTagName('a');

      for (let i = 0; i < a_tags.length; i++) {
        const file = a_tags[i].href.split('/').pop(); // Get only the file name

        // Check if the current path ends with the file name
        if (document.location.pathname.endsWith(`/${file}`)) {
          a_tags[i].classList.add('active');
        }
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      setActive();
    });
  </script>