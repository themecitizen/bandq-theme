<?php
$post_id = get_the_ID();
?>
<div class="post-meta d-flex">
	<div class="time">
		<i class="far fa-calendar-alt"></i>
		<?php
        $date_format = get_option('date_format');
        echo get_the_date($date_format);
        ?>
	</div>
</div>