<?php ob_start(); ?>
<section>
    <h3>list of active users</h3>

    <article>
        <form action="index.php?action=searchUser" method="POST">
            <input type="text" placeholder="user pseudo" name="pseudo" required>
            <input type="submit" id='submit' value='Search' >
        </form>
        <?php if(isset($_GET['message'])){ ?> <p class="warning"> <?php echo $_GET['message'];?></p> <?php ;} ?>
        <div id ="membres">
            <table>
                <tr>
                    <th> ID </th>
                    <th> Nickname </th>
                    <th> First name </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Size </th>
                    <th> Weight </th>
                    <th> Sex </th>
                    <th> Country </th>
                    <th> Registration date </th>
                </tr>

                <?= $listUsers ?>

            </table>
        </div>
    </article>
</section>


<?php $content = ob_get_clean();

require('view/managerSpaceView.php');?>
