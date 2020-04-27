<!-- Fixed navbar -->
  <div class="container">
        <div class="navbar-header-">
              <?php if (isset($_SESSION['username'])) { ?>
                  <p align="right">Selamat datang <strong><?=$_SESSION['username']?></p>
            <?php  } else {

            }?>

        </div>
    </div>
