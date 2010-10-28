<?php
class Backend_UploadifyController extends Backend_Library_Controller_Action_Abstract
{
    public function uploadAction()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->getHelper('layout')->disableLayout();
        
        if(!empty($_FILES))
        {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $ext = substr($_FILES['Filedata']['name'], -4);
            $name = md5($_FILES['Filedata']['name'] . uniqid());
            $dir = APPLICATION_PATH . DS . '..' . DS . '..' . DS . 'public' . DS . 'images' . DS . 'galleries' . DS;
            $newName = $name . $ext;
            $targetFile = $dir . $newName;
            move_uploaded_file($tempFile, $targetFile);
            $thumb = new Custom_SmartImage($targetFile);
            $thumb->resize(90, 90, true);
            $thumb->saveImage($dir . "thumbs" . DS . $newName, 85);
            echo $newName;
        }
        else
        {
            echo 'No file sent';
        }
    }
}
