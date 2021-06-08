<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">Sistem Pendukung Keputusan Pemilihan UKM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="?page=home">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dataset <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=training&actions=tampil">Data Training</a></li>
                        <li><a href="?page=testing&actions=tampil">Data Testing</a></li>
                    </ul>
                </li>
                <li><a href="?page=hasil_spk&actions=tampil">Data Hasil SPK</a></li>
                <li><a href="?page=data_ukm&actions=tampil">Data UKM</a></li>
                
                    <?php if (isset($_SESSION['username'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
