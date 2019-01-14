<!DOCTYPE HTML>
<html>

    <?php include(dirname(__DIR__).'/head.html'); ?>

<body>
    <?php include(dirname(__DIR__) . '/navbar.php');
    include(dirname(__DIR__) . '/sidebar.php');?>

    <div class="mt-4" style="margin-left: 100px; margin-right: 100px; background-color: whitesmoke; border-radius: 25px;">
        <div class="container col">
            <label class="mt-3" style="font-size: 25px;">List of events</label>
        </div>

        <div class="container col pb-1 table-responsive table-wrapper-scroll-y">
            <table class="table">
                <thead>
                <tr class="d-flex">
                    <th scope="col" class="col-1">#</th>
                    <th scope="col" class="col-5">Name</th>
                    <th scope="col" class="col-5">Place</th>
                    <th scope="col" class="col-1">Options</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <?php $i=1;
                    foreach ($event as $val):  ?>
                        <tr class="d-flex">
                            <form method="post" action="?page=eventAction">
                            <th scope="row" class="col-1"> <?= $i;$i++;?></th>
                            <td class="col-5"> <input type="hidden" name="event" value="<?= $val['eventName']?>"><?= $val['eventName']?></td>
                            <td class="col-5"> <?= $val['namePlace']?></td>
                            <td class="col-1">

                                <button type="submit" name="action" value="delete" style="background: none; border: none;">
                                    <img src="https://img.icons8.com/ios/50/000000/delete-sign-filled.png" width="20px" height="20px">
                                </button>
                                <button type="submit" name="action" value="modify" style="background: none; border: none;">
                                    <img src="https://img.icons8.com/ios/50/000000/settings.png" width="20px" height="20px">
                                </button>
                            </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
