<?php


    __DIR__ . "../../../vendor/autoload.php";

    class Categoria
    {
        private $id;
        private $categoria;
        private $ativo;
        private $con;
        private $objfcn;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getCategoria()
        {
            return $this->categoria;
        }

        /**
         * @param mixed $categoria
         */
        public function setCategoria($categoria)
        {
            $this->categoria = $categoria;
        }

        /**
         * @return mixed
         */
        public function getAtivo()
        {
            return $this->ativo;
        }

        /**
         * @param mixed $ativo
         */
        public function setAtivo($ativo)
        {
            $this->ativo = $ativo;
        }

        /**
         * @return Conexao
         */
        public function getCon()
        {
            return $this->con;
        }

        /**
         * @param Conexao $con
         */
        public function setCon($con)
        {
            $this->con = $con;
        }

        /**
         * @return Funcoes
         */
        public function getObjfcn()
        {
            return $this->objfcn;
        }

        /**
         * @param Funcoes $objfcn
         */
        public function setObjfcn($objfcn)
        {
            $this->objfcn = $objfcn;
        }

        //Chama a classe Conexao com Banco de Dados
        public function __construct()
        {
            $this->con = new Conexao();
            $this->objfcn = new Funcoes();
        }

        //Método para Inserir os dados no Banco
        public function queryInsert($dados)
        {
            try {

                    $this->categoria = $dados["categoria"];
                    $this->ativo = $dados["ativo"];

                    if(empty($this->categoria))
                    {
                        echo "<script>alert('Não é possível Cadastrar Categoria em Branco')</script>";
                    }
                    else {

                            $cst = $this->con->conectar()->prepare("INSERT INTO categoria (categoria,ativo) VALUES(:categoria,:ativo) ");

                            $cst->bindParam("categoria", $this->categoria, PDO::PARAM_STR);
                            $cst->bindParam("ativo", $this->ativo, PDO::PARAM_STR);


                            if ($cst->execute()) {
                                return "ok";
                            } else {
                                return "Não deu!!!";
                            }
                    }
            }
            catch (PDOException $ex)
            {
                    echo $ex->getMessage();
            }
        }

        //Método para Listar categoria
        public function querySeleciona()
        {
            try {

                $cst = $this->con->conectar()->prepare("SELECT * FROM categoria");
                $cst->execute();

                return $cst->fetchAll();

            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }

        //Método Selecionar id (Editar)
        public function querySelecionaid($dado)
        {
            try
            {
                $this->id = $this->objfcn->base64($dado, 2);
                $cst = $this->con->conectar()->prepare("SELECT id, categoria, ativo FROM categoria WHERE id = :idCategoria ");
                $cst->bindParam(":idCategoria", $this->id, PDO::PARAM_INT);
                $cst->execute();
                return $cst->fetch();
            } catch (PDOException $ex) {
                return 'error '.$ex->getMessage();
            }
        }

        //Editar
        public function queryUpdate($dados)
        {
            try
            {
                $this->id = $this->objfcn->base64($dados['func'], 2);
                $this->categoria = $dados['categoria'];
                $this->ativo = $dados['ativo'];

                $cst = $this->con->conectar()->prepare("UPDATE categoria SET  categoria = :categoria,  ativo = :ativo WHERE id = :idCategoria");

                $cst->bindParam(":idCategoria", $this->id, PDO::PARAM_INT);
                $cst->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
                $cst->bindParam(":ativo", $this->ativo, PDO::PARAM_STR);

                if($cst->execute())
                {
                    return 'ok';
                }
                else
                {
                    echo '<script type="text/javascript">alert("Não  alterou");</script>';
                }
            }
            catch (PDOException $ex)
            {
                print_r ($ex->getMessage());
            }
        }

        //Método para Deletar
        public function queryDelete($dado)
        {
            try
            {
                $this->id = $this->objfcn->base64($dado, 2);
                $cst = $this->con->conectar()->prepare("DELETE FROM categoria WHERE id = :idCategoria");
                $cst->bindValue(":idCategoria",$this->id,PDO::PARAM_INT);
                if($cst->execute())
                {
                    return 'ok';
                }
                else
                {
                    echo "Não foi possível Deletar";
                }
            }
            catch (PDOException $exc)
            {
                echo $exc->getTraceAsString();
            }
        }




    }