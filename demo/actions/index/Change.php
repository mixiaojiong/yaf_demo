<?php

class changeAction extends Yaf_Action_Abstract
{
    public function execute()
    {
        $id = $this->getRequest()->getQuery('id');
        $response = $this->getResponse();
        $response->setHeader('content-type', 'application/json');
        $json = json_encode(array('id'=>$id, 'message'=>'success'));
        $response->setBody($json);
    }
}
