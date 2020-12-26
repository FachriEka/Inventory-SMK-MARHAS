      <div class="sidebar" data-active-color="purple" data-background-color="black" data-image="../assets/img/lock.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a class="simple-text logo-mini">
            M  
        </a>
        <a class="simple-text logo-normal">
            SMK MARHAS
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../assets/img/default-avatar.png" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        <?= $_SESSION['nama'];?>
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <?php 
            if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Kepala Sekolah" or $_SESSION['level'] == "Petugas") {
            ?>
            <li id="menu1">
                <a href="home.php?menu=1">
                <i class="material-icons">dashboard</i>
                <p> Dashboard </p>
                </a>
            </li>
            <?php 
            }if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Petugas") {
            ?>
            <li id="menu2">
                <a href="home.php?menu=2">
                <i class="material-icons">redeem</i>
                <p>Data Barang</p>
                </a>
            </li>
            <?php if ($_SESSION['level'] == "Admin"){ ?>
            <li id="menu3">
                <a href="home.php?menu=3">
                <i class="material-icons">person</i>
                <p>Data Pengguna</p>
                </a>
            </li>
            <?php }?>
            <li id="menu4">
                <a href="home.php?menu=4">
                <i class="material-icons">people</i>
                <p>Data Peminjam</p>
                </a>
            </li>
            <li id="menu5">
                <a href="home.php?menu=5">
                <i class="material-icons">add_shopping_cart</i>
                <p>Data Peminjaman</p>
                </a>
            </li>
            <li id="menu6">
                <a href="home.php?menu=6">
                <i class="material-icons">restore</i>
                <p>Data Pengembalian</p>
                </a>
            </li>
            <?php }?>
            <li>
                <a onclick="keluar()">
                    <i class="material-icons">exit_to_app</i>
                    <p>Log out</p>
                </a>
            </li>
        </ul>
    </div>
</div>