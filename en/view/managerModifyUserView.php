<?php ob_start();?>

<section>
    <article>
        <!--<a href="index.php?action="><input type="button" value="Modifier Pseudo utilisateur" ></a>
        <a href="index.php?action="><input type="button" value="Modifier mail utilisateur"></a>-->
        <a href="index.php?action=resetPassword"><input type="button" value="Reset user password" onclick="return(confirm('Are you sure you want to reset the user password ?'))"></a>
        <a href="index.php?action=makeManager"><input type="button" value="Make administrator" onclick="return(confirm('Are you sure you want to switch this account to manager ?'))"></a>
        <a href="index.php?action=deleteUser"><input type="button" value="User account deletion" onclick="return(confirm('Are you sure you want to delete this user account ?'))"> </a>
        <table>
            <tr>
                <th> id </th>
                <th> Nickname </th>
                <th> First name </th>
                <th> Name </th>
                <th> Email </th>
                <th> Size </th>
                <th> Weight </th>
                <th> Sex </th>
                <th> Country </th>
            </tr><tr>

                <?= $userInformations ?>

            </tr></table>
    </article>
</section>

<?php $content = ob_get_clean();

require('view/managerSpaceView.php');?>
