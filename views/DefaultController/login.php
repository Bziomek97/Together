<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>
<?php include(dirname(__DIR__).'/navbar.html');
include(dirname(__DIR__).'/sidebar.html');?>

<div class="row mt-5" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
    <form class=" container col mt-1" method="post" action="?page=login">

        <label class="mt-3" style="font-size: 25px"><img src="https://img.icons8.com/ios-glyphs/30/000000/user-male.png" width="25px" height="25px"> SIGN IN</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><img src="https://img.icons8.com/ios/50/000000/key.png" width="15px" height="15px"></span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
        </div>

        <button type="submit" class="btn btn-primary float-right">SIGN IN!</button>
    </form>

    <form class="container col mb-4 mt-3 border-left" style="line-height: 2px" method="post" action="/index.php">
        <label class="mt-3" style="font-size: 25px"><img src="https://img.icons8.com/ios-glyphs/30/000000/add-user-group-woman-man.png" width="25px" height="25px"> SIGN UP</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png" width="15px" height="15px" ></span>
            </div>
            <input type="text" name="name" placeholder="First Name" aria-label="First name" class="form-control" required>
            <input type="text" name="surname" placeholder="Second Name" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><img src="https://img.icons8.com/ios/50/000000/key.png" width="15px" height="15px" ></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3"><img src="https://img.icons8.com/ios/50/000000/key.png" width="15px" height="15px" ></span>
            </div>
            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon3" required>
        </div>
        <button type="submit" class="btn btn-primary float-right">SIGN UP!</button>

    </form>
</div>
</body>
</html>

