<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">Dashboard</div>
        <div class="nav-icons">
            <i class="fas fa-bell"></i>
            <i class="fas fa-envelope"></i>
            <div class="profile-icon" onclick="toggleDropdown()">
                <img src=<?php echo base_url("https://via.placeholder.com/40")?> alt="Profil" class="profile-img">
            </div>
            <div class="dropdown" id="profileDropdown">
                <p class="dropdown-item"><strong>Nama Pengguna</strong></p>
                <p class="dropdown-item">Email: pengguna@example.com</p>
                <hr>
                <p class="dropdown-item">Keluar</p>
            </div>
        </div>
    </header>

    <script>
        function toggleDropdown() {
            document.getElementById("profileDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-icon img')) {
                const dropdowns = document.getElementsByClassName("dropdown");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script src=<?php echo base_url("https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js")?>></script>
    <script src=<?php echo base_url("https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js")?>></script>
</body>
</html>