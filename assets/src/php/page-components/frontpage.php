<div class="frontpage">

<?php $thumb_id=get_post_thumbnail_id();
$thumbURL=wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
?>
<figure class="hero">
<img src="<?php echo $thumbURL[0]; ?>"alt=""></figure>


<?php include(get_template_directory() . '/assets/src/php/page-components/welcome-blocks.php');
include(get_template_directory() . '/assets/src/php/page-components/diptych.php');
?>

</div>