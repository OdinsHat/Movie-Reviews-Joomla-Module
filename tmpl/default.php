<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<ul class="movie-reviews">
<?php foreach ($reviews as $review): ?>
    <?php if(isset($review->links->review) && isset($review->original_score)): ?>
        <li><a href="<?php echo $review->links->review; ?>"><?php echo $review->publication; ?></a> (<?php echo $review->original_score; ?>)</li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>
