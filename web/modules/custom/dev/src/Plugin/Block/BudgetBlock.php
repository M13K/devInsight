<?php

namespace Drupal\dev\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BudgetBlock' block.
 *
 * @Block(
 *  id = "budget_block",
 *  admin_label = @Translation("Budget block"),
 * )
 */
class BudgetBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
//        die('lol');
  $route = \Drupal::routeMatch()->getParameter('node');
  if (!empty($route)){
      $nodeType = $route->getType();
      if ($nodeType == 'progconf'){
          $entityTypeManager = \Drupal::entityTypeManager();
          $webformSubmissionIds = $entityTypeManager
              ->getStorage('webform_submission')
              ->getQuery()
              ->condition('webform_id', 'formumaire_d_adhesion_aux_confer')
              ->execute();
          $dataSubmissions = $entityTypeManager->getStorage('webform_submission')
              ->loadMultiple($webformSubmissionIds);
//         ksm($dataSubmissions);
          $rows = [];
          $budget_total = 0;
          $i=0;
          $array = [];
          foreach ($dataSubmissions as $submission){
                //ksm($submission->getData()['validation_adhesion']);

              if (($submission->getData()['validation_adhesion'] == 'Accepted') && ($submission->getData()['besoin_d_hebergement_'] == 'Oui')){
                  $days = (strtotime($submission->getData()['date_de_depart']) - strtotime($submission->getData()['date_d_arrivee']));
//                  ksm($days);
//                  kint($submission);
                  $nights = round($days / (3600 * 24));
//                  ksm($nights);
                  $hotel_id = $submission->getData()['choix_de_l_hotel'];
                  //kint($hotel_id);
                  //$hotel = $entityTypeManager->getStorage('node')->load($hotel_id);

                  $node_storage = \Drupal::entityTypeManager()->getStorage('node');
                  //ksm($node_storage->load($hotel_id)->get('field_prix_de_la_nuit')->getValue()[0]['value']);
//                  if($i==0) {
//                      ksm($node_storage->load($hotel_id)->get('field_prix_de_la_nuit')->getValue()[0]['value']);
//                      ksm($node_storage->load($hotel_id)->get('budget')->getValue()[0]['value']);
//                      $i++;
//                  }

                  //$hotel = $entityTypeManager->getStorage('node')->load($submission->getData()['hotel']);


              }



          }
      }

  }
  $build = [];
  $build['budget_block']['#markup'] = 'Implement BudgetBlock.';

    return $build;
  }

}
