<?php
echo 'hola';
class Database
{
    public static function StartUp()
    {
        //$pdo = new PDO('mysql:host=localhost;dbname=woodensp_sgvalle;charset=utf8', 'woodensp_sgvalle', 'eAi3NOPAF,G_');
        $pdo = new PDO('mysql:host=localhost;dbname=control;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}