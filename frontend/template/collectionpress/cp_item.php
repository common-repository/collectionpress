<?php
/**
 * Template Name: CP Item List
 * Template file of Collection Press To Item show
 * @author Avinash
 * You can add this file to theme folder by creating collectionpress folder and paste this file  there.
 * Path will be "<theme_name>/collectionpress/cp_item.php"
 * */

get_header();
if (isset($_GET) && isset($_GET['item_id'])) {
    if ($_GET['item_id']!='') {
        $item_id = $_GET['item_id'];
        $cp_author = new CPR_AuthorReg();
        $response = $cp_author->get_item_by_id($item_id);
    }
}
?>


<div id="main-content">
    <div class="container karc-cp-container">
        <div id="content-area" class="clearfix">
            <h2 class="entry-title"><?php the_title()?></h2>
			<?php get_sidebar(); ?>
            <div class="left-area">
                <?php if (isset($response) && $response!='') : ?>
                    <?php foreach ($response->metadata as $md) : ?>

                        <p><?php echo $md->element; ?></p>
                        <p><?php echo $md->qualifier; ?></p>
                        <p><?php echo $md->value; ?></p>

                    <?php endforeach;?>
                <?php else: ?>
                    <p><?php echo __("Item Id is incorrect!", 'cpress') ?></p>
                <?php endif; ?>
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
