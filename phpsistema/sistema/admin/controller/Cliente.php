<?php

    __DIR__ . "../../../vendor/autoload.php";

    class Cliente
    {
        private $id;
        private $nome;
        private $estado;
        private $mensagem;
        private $con;
        private $objfcn;

        //Gerar os get e set alt insert
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
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
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
         * @return mixed
         */
        public function getMensagem()
        {
            return $this->mensagem;
        }

        /**
         * @param mixed $mensagem
         */
        public function setMensagem($mensagem)
        {
            $this->mensagem = $mensagem;
        }

        /**
         * @return mixed
         */
        public function getCon()
        {
            return $this->con;
        }

        /**
         * @param mixed $con
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

                    $this->nome = $dados["nome"];
                    $this->estado = $dados["estado"];
                    $this->mensagem = $dados["mensagem"];

                    if(empty($this->nome))
                    {
                        echo "<script>alert('Campos nome em Branco')</script>";
                    }
                    elseif (empty(trim($this->mensagem)))
                    {
                        echo "<script>alert('Campo Mensagem em Branco')</script>";
                    }
                    else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO cliente (nome,estado,mensagem) VALUES(:nome,:estado,:mensagem) ");

                    $cst->bindParam("nome", $this->nome, PDO::PARAM_STR);
                    $cst->bindParam("estado", $this->estado, PDO::PARAM_STR);
                    $cst->bindParam("mensagem", $this->mensagem, PDO::PARAM_STR);

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

        //Método para Listar Clientes
        public function querySeleciona()
        {
            try {

                $cst = $this->con->conectar()->prepare("SELECT i.id , i.nome , i.mensagem , t.estado
                                                                    FROM cliente i
                                                                    JOIN estado t on t.id = i.estado  ");
                $cst->execute();

                return $cst->fetchAll();

            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }

        //Método para Listar Estado Ativos no select do HTML
        public function selecionaEstado()
        {
            try {

                $cst = $this->con->conectar()->prepare(" SELECT * FROM estado WHERE ativo = 'A'  ");
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
                $cst = $this->con->conectar()->prepare("SELECT id, nome, estado, mensagem FROM cliente WHERE id = :idCliente ");
                $cst->bindParam(":idCliente", $this->id, PDO::PARAM_INT);
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
                $this->nome = $dados['nome'];
                $this->estado = $dados['estado'];
                $this->mensagem = $dados['mensagem'];

                $cst = $this->con->conectar()->prepare("UPDATE cliente SET  nome = :nome, estado = :estado,  mensagem = :mensagem WHERE id = :idCliente");

                $cst->bindParam(":idCliente", $this->id, PDO::PARAM_INT);
                $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $cst->bindParam(":estado", $this->estado, PDO::PARAM_STR);
                $cst->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

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
                $cst = $this->con->conectar()->prepare("DELETE FROM cliente WHERE id = :idCliente");
                $cst->bindValue(":idCliente",$this->id,PDO::PARAM_INT);
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