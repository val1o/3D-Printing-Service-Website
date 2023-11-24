<?php $this->render("../header"); ?>

    <div class="home-section">
        <img src="Images/3dprint.jpg" alt="Your Image" />
    </div>

    <script>
      window.onload = function () {
          const overlay = document.getElementById('overlay');
          const content = document.getElementById('content');
          const textOverlay = document.getElementById('textOverlay');

          overlay.addEventListener('click', function () {
              textOverlay.style.display = 'none';
              content.classList.remove('hidden');
              overlay.style.transition = '0.5s';
              overlay.style.opacity = '0';
              overlay.style.pointerEvents = 'none';
          });
      };
    </script>

<?php $this->render("../footer"); ?>