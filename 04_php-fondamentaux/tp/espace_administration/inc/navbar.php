<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

      <a href="index.php" class="nav-item nav-link active">Home</a>
      <?php
      if ($userListStart - $userListLength >= 0) {
        echo '<a href="index.php?listStart=' . ($userListStart - $userListLength) . '&listSize=' . $userListLength . '" class="nav-item nav-link">Page précédente</a>';
      } else {
        echo '<span class="inactive nav-item nav-link">Page précédente</span>';
      }
      ?>

      <?php
      if ($userListStart < count($users) - $userListLength) {
        echo  '<a href="index.php?listStart=' . ($userListStart + $userListLength) . '&listSize=' . $userListLength . '" class="nav-item nav-link">Page Suivante</a>';
      } else {
        echo '<span class="inactive nav-item nav-link">Page Suivante</span>';
      }


      ?>

      <form action="search.php" method="get" class="form" id="form1">
        <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
      </form>
      <button form="form1" class="btn btn-outline-success my-2 my-sm-0 navButton" type="submit">Search</button>
    </div>
  </div>
</nav>