<div id="comments" class="comments">
	<?php
  $commentcount = get_comments([
      "status" => "approve",
      "post_id" => get_the_ID(),
      "count" => true,
  ]);
  if (have_comments()): ?>
	<h3>コメント（<?php echo $commentcount; ?>件）</h3>
	<ol class="commentlist">
		<?php wp_list_comments("avatar_size=40"); ?>
	</ol>
	<?php endif;
  ?>
	<?php
  $args = [
      "title_reply" => "コメントを書く",
      "label_submit" => "送信",
  ];
  comment_form($args);
  ?>
</div>