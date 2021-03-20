<?php


    __DIR__ . "../../../vendor/autoload.php";

    class Estado
    {
        private $id;
        private $estado;
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
        public function getEstado()
        {
            return $this->estado;
        }

        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
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
         * @return mixed
         */
        public function getObjfcn()
        {
            return $this->objfcn;
        }

        /**
         * @param mixed $objfcn
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

                    $this->estado = $dados["estado"];
                    $this->ativo = $dados["ativo"];

                    if(empty($this->estado))
                    {
                        echo "<script>alert('Não é possível Cadastrar Estado em Branco')</script>";
                    }
                    else {

                            $cst = $this->con->conectar()->prepare("INSERT INTO estado (estado,ativo) VALUES(:estado,:ativo) ");


                            $cst->bindParam("estado", $this->estado, PDO::PARAM_STR);
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

        //Método para Listar estado
        public function querySeleciona()
        {
            try {

                $cst = $this->con->conectar()->prepare("SELECT * FROM estado");
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
                $cst = $this->con->conectar()->prepare("SELECT id, estado, ativo FROM estado WHERE id = :idEstado ");
                $cst->bindParam(":idEstado", $this->id, PDO::PARAM_INT);
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
                $this->estado = $dados['estado'];
                $this->ativo = $dados['ativo'];

                $cst = $this->con->conectar()->prepare("UPDATE estado SET  estado = :estado,  ativo = :ativo WHERE id = :idEstado");

                $cst->bindParam(":idEstado", $this->id, PDO::PARAM_INT);
                $cst->bindParam(":estado", $this->estado, PDO::PARAM_STR);
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
                $cst = $this->con->conectar()->prepare("DELETE FROM estado WHERE id = :idEstado");
                $cst->bindValue(":idEstado",$this->id,PDO::PARAM_INT);
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