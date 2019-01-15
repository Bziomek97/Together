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
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="20" height="20"
                                         viewBox="0 0 224 224"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none" style="mix-blend-mode: normal"><path d="M0,224v-224h224v224z" fill="none"></path><g fill="#e74c3c"><g id="surface1"><path d="M41.02,28.28l-12.74,12.74l70.98,70.98l-71.4,71.54l12.6,12.6l71.54,-71.4l71.4,71.4l12.74,-12.74l-71.4,-71.4l70.98,-70.98l-12.74,-12.74l-70.98,70.98z"></path></g></g></g></svg>
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
