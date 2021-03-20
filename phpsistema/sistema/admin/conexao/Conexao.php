<?php


class Conexao
{

    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param mixed $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return mixed
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * @param mixed $servidor
     */
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }

    /**
     * @return mixed
     */
    public static function getPdo()
    {
        return self::$pdo;
    }

    /**
     * @param mixed $pdo
     */
    public static function setPdo($pdo)
    {
        self::$pdo = $pdo;
    }


    public function __construct()
    {
        $this->servidor = "localhost";
        $this->banco = "phpsistema";
        $this->usuario = "root";
        $this->senha = "";
    }

    public function conectar()
    {

        try
        {
            if(is_null(self::$pdo))
            {
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco,$this->usuario,$this->senha);
            }
            return self::$pdo;

        }

        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }




}