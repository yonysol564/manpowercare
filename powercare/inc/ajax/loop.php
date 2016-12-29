<?php global $class,$journal,$read_more; ?>

<div class="large-6 column col_post end <?php echo $class; ?>">
	<div class="wrap_post">
		<div class="head_post clearfix">
			<div class="wrap_logo">
				<img src="<?php echo $journal['journal_logo']['url']; ?>" alt="logo">
			</div>
			<div class="wrap_date">
				<span><?php echo $journal['journal_date']; ?></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="wrap_title">
		 	<a href="<?php echo $journal['journal_link']; ?>">
				<h4><?php echo $journal['journal_title']; ?></h4>
		 	</a>
		</div>
		<div class="journal_con" data-mh="journal_content">
			 <?php echo $journal['journal_content']; ?>
		</div>
		<div class="readmore">
			<a href="<?php echo $journal['journal_link']; ?>" target="_blank">
				<?php echo $read_more; ?>
			</a>
		</div>
	</div>
</div>