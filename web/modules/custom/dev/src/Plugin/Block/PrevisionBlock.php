<?php

namespace Drupal\dev\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'PrevisionBlock' block.
 *
 * @Block(
 *  id = "prevision_block",
 *  admin_label = @Translation("Prevision block"),
 * )
 */
class PrevisionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
//      $storage = \Drupal::entityTypeManager()->getStorage('webform_submissions');
//      $query = $storage->getQuery();
//      ksm($query);
      die('lol');
    $build = [];
    $build['prevision_block']['#markup'] = 'Implement PrevisionBlock.';

    return $build;
  }

}
