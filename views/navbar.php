<nav class="navbar nav-pills navbar-dark flex-column flex-sm-row" style="background-color: DimGray;">

    <div class="navbar-header flex-sm">
      <a href="#menu-toggle" class="btn" id="menu-toggle" style="border:none;"><img src="https://img.icons8.com/ios/50/000000/menu.png" width="30" height="30" style="border: none; background:none;" alt="toggle"></a>
      <a class="navbar-brand ml-1" href="/">
        <img src="https://img.icons8.com/ios/50/000000/conference-background-selected.png" width="35" height="35  " class="d-inline-block align-top" alt="" style="border: none; background:none;">
        Get_Together
      </a>
    </div>

    <form class="form-inline flex-fill justify-content-center">

      <input type="text" class="form-control" placeholder="Search event..." aria-label="Search event..." aria-describedby="basic-addon2" style ="width: 90%;">
      <div class="input-group-append">
        <button class="btn" type="button" style="background: none; border: none;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                                                       width="25" height="25"
                                                                                       viewBox="0 0 224 224"
                                                                                       style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none"  style="mix-blend-mode: normal"><path d="M0,224v-224h224v224z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M94.08,13.44c-42.0175,0 -76.16,34.1425 -76.16,76.16c0,42.0175 34.1425,76.16 76.16,76.16c16.625,0 31.99,-5.355 44.52,-14.42l58.94,58.8l12.6,-12.6l-58.24,-58.38c11.445,-13.335 18.34,-30.6425 18.34,-49.56c0,-42.0175 -34.1425,-76.16 -76.16,-76.16zM94.08,22.4c37.17,0 67.2,30.03 67.2,67.2c0,37.17 -30.03,67.2 -67.2,67.2c-37.17,0 -67.2,-30.03 -67.2,-67.2c0,-37.17 30.03,-67.2 67.2,-67.2z"></path></g></g></g></svg></button>
      </div>
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
            <?php endif;?>
            !
        </div>
    <?php endif;?>

</nav>
