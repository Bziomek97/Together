<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<?php include(dirname(__DIR__) . '/navbar.php');
include(dirname(__DIR__) . '/sidebar.php');?>

<div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
    <div class="container col">
        <label class="mt-3" style="font-size: 25px;">Users List</label>
    </div>

    <div class="container col pb-1 table-responsive table-wrapper-scroll-y">
        <table class="table">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-3">Surname</th>
                <th scope="col" class="col-4">Email</th>
                <th scope="col" class="col-1">Role</th>
                <th scope="col" class="col-1">Action</th>
            </tr>
            </thead>
            <tbody>
                <tr class="d-flex">
                    <td scope="col" class="col-3"><?= $user->getName(); ?></td>
                    <td scope="col" class="col-3"><?= $user->getSurname(); ?></td>
                    <td scope="col" class="col-4"><?= $user->getEmail(); ?></td>
                    <td scope="col" class="col-1"><?= $user->getRole(); ?></td>
                    <td scope="col" class="col-1">-</td>
                </tr>
            </tbody>
            <tbody class="users-list">
            </tbody>
        </table>

        <button class="btn btn-dark btn-lg float-right mb-1" type="button" onclick="getUsers()">Get all users</button>
    </div>
</div>

</body>
</html>