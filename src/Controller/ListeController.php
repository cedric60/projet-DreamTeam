<?php


class ListeController {

    public function listeFormationAction() {
        return $app['twig']->render('form.twig');
    }
    
}
