<nav class="navbar nav-pills navbar-dark flex-column flex-sm-row" style="background-color: DimGray;">

    <div class="navbar-header flex-sm">
      <a href="#menu-toggle" class="btn" id="menu-toggle" style="border:none;"><img src="https://img.icons8.com/ios/50/000000/menu.png" width="30" height="30" style="border: none; background:none;" alt="toggle"></a>
      <a class="navbar-brand ml-1" href="/">
        <img src="https://img.icons8.com/ios/50/000000/conference-background-selected.png" width="35" height="35  " class="d-inline-block align-top" alt="" style="border: none; background:none;">
        Get_Together
      </a>
    </div>


    <form class="flex-fill ">
        <div id='geocoder' class='geocoder flex-sm'></div>
    </form>

    <?php if(!$_SESSION['id']):?>
      <div class="navbar-buttons flex-sm">
        <a class="btn btn-success" role="button" href="?page=login">SIGN UP/IN</a>
      </div>
    <?php else:?>
        <div class="flex-sm" style="color: white;">
            Hi,
            <?php if($_SESSION['role']=='admin'): ?>
            <a style="color: lightcoral;">
            <?php echo $_SESSION['name'].' '.$_SESSION['surname'];?>
            </a>
            <?php else: ?>
            <?php echo $_SESSION['name'].' '.$_SESSION['surname'];?>
            <?php endif;?>!
        </div>
    <?php endif;?>

</nav>
