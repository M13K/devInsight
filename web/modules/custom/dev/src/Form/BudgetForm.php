<?php
/**
 * Created by PhpStorm.
 * User: POE10
 * Date: 22/05/2019
 * Time: 14:30
 */
namespace Drupal\dev\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BudgetForm extends FormBase
{
    public function getFormId()
    {
        return 'dev_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['budget'] = array(
            '#type' => 'number',
            '#title' => 'Entrez votre budget',
            '#required' => 'true'
        );

        $form['hotel'] = array(
            '#type' => 'textfield',
            '#title' => 'Hôtel de l\'évènement',
            '#required' => 'true'
        );

        $form['price'] = array(
            '#type' => 'number',
            '#title' => 'Tarif/nuitée',
            '#required' => 'true'
        );

        $form['members'] = array(
            '#type' => 'number',
            '#title' => 'Nombre de participants',
            '#required' => 'true'
        );

        $form['submit'] = array(
            '#type' => 'submit',
            '#value'=>$this->t('Calculer le budget')
        );

        $result = $form_state->getRebuildInfo();
        $budget = $form_state->getRebuildInfo();
//        ksm($budget);
        if(isset($result['result'])){
            $form['result'] = array(
                '#type' => 'html_tag',
                '#tag' => 'h2',
                '#value' => 'Coût budget: '.$result['result']
            );
            if($result['result'] >= $budget['budget']){
                $form['verdict'] = array(
                    '#type' => 'html_tag',
                    '#tag' => 'h2',
                    '#value' => 'Le coût du programme '.$result['result'].' étant supérieur au budget '.$budget['budget'].' , vous devez réduire le nombre de participants'
                );
            }
        }

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $budget = $form_state->getValue('budget');
        $budget = (int)($budget);
        $price = $form_state->getValue('price');
        $members = $form_state->getValue('members');

        $result = $price * $members;

        $form_state->addRebuildInfo('result', $result);
        $form_state->addRebuildInfo('budget', $budget);
        $form_state->setRebuild();
    }



}