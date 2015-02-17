<?php

use \Blockify\Block;
use \Blockify\Element;
use \Blockify\VoidElement;

$block->openTag('header');
?>
<div class="block-page-header-spacing"></div>
<nav>
  <div class="container">
    <div class="content-container navbar-header">
    <?php

      $brand;

      if (!empty($block->model['image'])) {
          $brand = $block->model->createVoidElement('img', 'image', [
              'class' => 'brand-image',
              'alt' => $block->model['name']
          ]);
      } else if (!empty($block->model['name'])) {
          $brand = $block->model['name'];
      }

      echo new Element('a', $brand, [
          'class' => 'brand',
          'href' => $block->model['url']
      ]);

      $headerCollapseId = $block->model['id'] . '-collapse';

      ?>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#<?php echo $headerCollapseId; ?>">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="<?php echo $headerCollapseId; ?>">
      <?php

        echo '<div class="content-section top">';
        echo $block->content('top', true);
        echo '</div>';

        echo '<div class="content-section middle">';
        echo $block->content('middle');
        echo '</div>';

        echo '<div class="content-section bottom">';
        echo $block->content('bottom');
        echo '</div>';
      ?>
    </div>
  </div>
</nav>
<?php


$block->closeTag();
