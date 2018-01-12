<?php


class FormController {

    public function formAction() {
        return $app['twig']->render('form.twig');
    }
    public function formContactAction(){

    }

    public function formValidate(){
        
        return $app['twig']->render('index.twig');
    }
}
