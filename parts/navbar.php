<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 4px;
        /* width: fit-content; */
        z-index: 1;
    }

    .navbar a {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 8px;
        margin-right: 8px;
        text-decoration: none;
    }

    .navbar a i {
        color: #111213;
    }

    .navbar a:hover {
        background-color: rgb(88, 86, 85);
    }
</style>

<nav class="navbar navbar-dark bg-none">
    <div class="row">
        <div class="col-12 d-flex">
            <a href="index.php">
                <i class="fa-solid fa-house-chimney"></i>
            </a>
            <a href="uploadExcel.php">
                <i class="fa-solid fa-file-excel"></i>
            </a>
        <?php// if(strtolower(pathinfo(__FILE__, PATHINFO_FILENAME))=='uploadexcel'){?>
            <a href="db/migration.php" onclick="if(!confirm('This action will reset the database !!! \n Are you sure you want to refresh database from last updated excel file ?')){return false;}" class="bg-warning">
                <i class="fa-solid fa-database" style="color: #0c0d0d;"></i>
            </a>
        <?php// }?>
        </div>
    </div>
</nav>