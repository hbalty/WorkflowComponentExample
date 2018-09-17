<?php
/**
 * Created by PhpStorm.
 * User: h.balti
 * Date: 17/09/2018
 * Time: 14:20
 */

namespace App\Services;


use App\Entity\PurchaseOrder;
use Symfony\Component\Workflow\Registry;

class PurchaseOrderWorkflow
{
    private $workflows ;

    public function __construct(Registry $workflows)
    {
            $this->workflows = $workflows ;

    }






}