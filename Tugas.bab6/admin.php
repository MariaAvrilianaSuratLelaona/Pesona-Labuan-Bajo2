<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="item" href="item/Labuan Bajo 2.jpeg" />
  <link rel="stylesheet" href="css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Admin Labuan Bajo</title>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bx bx-category"></i>
      <span class="logo_name">Pesona Labuan Bajo</span>
    </div>
    <ul class="nav-links">
    <li>
        <a href="#" class="active">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="categories/categories.html">
          <i class="bx bx-box"></i>
          <span class="links_name">Categories</span>
        </a>
      </li>
      <li>
        <a href="transaction/transaction.html">
          <i class="bx bx-list-ul"></i>
          <span class="links_name">Transaction</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div>
      <div class="profile-details">
        <span class="admin_name"> Admin Labuan Bajo</span>
      </div>
    </nav>
    <div class="home-content">
    <div class="welcome-text">
        <h1>Hallo Admin</h1>
        <p>Selamat datang di Admin Labuan Bajo. Anda bisa mengelola informasi dan transaksi darri halaman ini.</p>
    </div>
    </div>
  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>
</body>
</html>
