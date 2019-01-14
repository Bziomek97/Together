<div id="wrapper">

      <!-- Sidebar -->
    <div id="sidebar-wrapper" style="background: #34373a;" >
        <ul class="sidebar-nav">
            <?php if($_SESSION['id']): ?>
                <div style="border-left: 2px solid lightcoral; ">
                <li style="color: grey;">
                    EVENT
                </li>
                <li>
                    <a href="?page=add">Add Event</a>
                </li>
                <li>
                    <a href="?page=event">Event Managment</a>
                </li>
                    </div>
                <div style="border-left: 2px solid lightgreen; ">
                <li  style="color: grey;">
                    ACCOUNT
                </li>
                <li>
                    <a href="?page=edit">Edit Account</a>
                </li>
                <?php if($_SESSION['role']=='admin'):?>
                    <li>
                        <a href="?page=admin">User Managment</a>
                    </li>
                <?php endif;?>
                <li>
                    <a href="?page=logout">Logout</a>
                </li>
                </div>
            <?php else: ?>
                    <div style="border-left: 2px solid lightgreen; ">
                <li  style="color: grey;">
                    ACCOUNT
                </li>
                <li>
                    <a href="?page=login">Sign in / Sign up</a>
                </li>
                    </div>
            <?php endif?>
            <li style="color: grey;">
                  Created by: Bartosz Ziomek
            </li>
        </ul>
    </div>
</div>


<script src="public/Styles/startbootstrap-simple-sidebar-master/vendor/jquery/jquery.min.js"></script>
<script src="public/Styles/startbootstrap-simple-sidebar-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
