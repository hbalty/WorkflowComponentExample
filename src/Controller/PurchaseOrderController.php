<?php
/**
 * Created by PhpStorm.
 * User: h.balti
 * Date: 17/09/2018
 * Time: 11:48
 */
namespace App\Controller;
use App\Entity\PurchaseOrder;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;

class PurchaseOrderController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function managePurchase(Registry $workflows){

        $purchaseOrder_new = new PurchaseOrder('new'); // state new
        $purchaseOrder_planned = new PurchaseOrder('planned'); // state planned
        $purchaseOrder_ongoing = new PurchaseOrder('ongoing'); // state ongoing
        $purchaseOrder_wating_feedback = new PurchaseOrder('waiting_feedback'); // state waiting feedback
        $purchaseOrder_annulled = new PurchaseOrder('annulled'); // state annulled
        $purchaseOrder_done = new PurchaseOrder('done'); // state done

        $package = new Package(new EmptyVersionStrategy());


        $availableTransistions = ['to_planned', 'to_ongoing', 'reject', 'done_from_wating_feedback', 'done_from_ongoing'] ;

        $workflow =$workflows->get($purchaseOrder_new);

        return $this->render('states_view.html.twig',
            array(
                'purchaseOrder_new' => $purchaseOrder_new,
                'purchaseOrder_planned' => $purchaseOrder_planned,
                'purchaseOrder_ongoing' => $purchaseOrder_ongoing,
                'purchaseOrder_wating_feedback' => $purchaseOrder_wating_feedback,
                'purchaseOrder_annulled' => $purchaseOrder_annulled,
                'purchaseOrder_done' => $purchaseOrder_done,
                'availableTransistions' => $availableTransistions,
                'workflow' => $workflow,
                'url' => $package->getUrl('images/workflow.png')
                )
        );
    }

}