<?php ob_start(); ?>
<section>
    <h3>liste des comptes non actifs</h3>
    <article>
        <?php if(isset($_GET['message'])){ ?> <p class="warning"> <?php echo $_GET['message'];?></p> <?php ;} ?>
        <div id ="membres">
            <table>

                <?= $listUsers ?>

            </table>
        </div>
    </article>
</section>


<?php $content = ob_get_clean();

require('view/managerSpaceView.php');?>
