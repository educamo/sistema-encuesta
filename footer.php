<div class="container-fluid footer bg-info fixed-bottom mt-5">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-1 my-2 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2022 echo por Juan Barrera y Brenda Suárez</p>

    <a href="home.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="assets/image/icono.png" alt="Icono" class="logo">
    </a>

    <ul class="nav col-md-4 justify-content-end mr-2">
      <?php if (isset($_SESSION['usuario'])) {
      ?>
        <li class="nav-item"><a href="home.php" class="nav-link px-2 text-dark">Inicio</a></li>
        <li class="nav-item"><a href="historia.php" class="nav-link px-2 text-dark">Reseña Histórica</a></li>
      <?php } ?>
      <li class="nav-item "><a href="#" class="nav-link px-2 text-muted" hidden>FAQs</a></li>
    </ul>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="assets/lib/DataTables/datatables.js"></script>

  <script>
    $(tablaId).DataTable();
  </script>

<!-- select2 -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/lib/select2/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
