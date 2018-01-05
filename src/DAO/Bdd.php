<?php

class bdd {

    /**
     * Connexion à la base de données
     *
     * @return PDO
     */
    public static function getConn() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_idc_conseil;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

}

