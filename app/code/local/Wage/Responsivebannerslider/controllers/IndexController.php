<?php
class Wage_Responsivebannerslider_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction() {
      
  	  $this->loadLayout();   
  	  $this->getLayout()->getBlock("head")->setTitle($this->__("Responsivebannerslider"));
	    $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("responsivebannerslider", array(
                "label" => $this->__("Responsivebannerslider"),
                "title" => $this->__("Responsivebannerslider")
		   ));

      $this->renderLayout(); 
	  
    }

    public function ClickAction() 
    {
      $id   = $this->getRequest()->getParam("id");
      
      $model  = Mage::getModel("responsivebannerslider/responsivebannerslider")->load($id);
      if($model->getId())
      {
        $click =  (int)$model->getClicks();
        $click += 1;


        $model->setClicks($click);
        $model->save();
        $this->getResponse()->setRedirect($model->getUrl());
        return;
      }
    }

}