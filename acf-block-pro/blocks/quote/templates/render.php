<?php

$quote = $block['data']['quote_body'];
$author = $block['data']['quote_author'];

?>

<div class="quote-block">
  <div class="quote-block-body">
    <?php print $quote; ?>
  </div>
  <div class="quote-block-author">
    <?php print $author; ?>
  </div>
</div>
