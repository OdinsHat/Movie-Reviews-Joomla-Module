<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<ul class="movie-reviews">
<?php foreach ($reviews as $review): ?>
    <?php if(isset($review->links->review) && isset($review->original_score)): ?>
        <li>(<?php echo $review->original_score; ?>) <a href="<?php echo $review->links->review; ?>"><?php echo $review->publication; ?></a></li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>

<style type="text/css">
ul.movie-reviews {
    list-style:none;
    padding-left:0px;
}
</style>
