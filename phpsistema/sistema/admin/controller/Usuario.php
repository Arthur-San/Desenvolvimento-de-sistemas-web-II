<?php

    __DIR__ . "../../../vendor/autoload.php";

    class Usuario
    {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $nivel;
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
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
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
        public function getNivel()
        {
            return $this->nivel;
        }

        /**
         * @param mixed $nivel
         */
        public function setNivel($nivel)
        {
            $this->nivel = $nivel;
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
        public function queriInsert($dados)
        {
            try {

                    $this->nome = $dados["nome"];
                    $this->email = $dados["email"];
                    $this->senha = sha1($dados["senha"]);
                    $this->nivel = $dados["nivel"];
                    $this->mensagem = $dados["mensagem"];

                    if(empty($this->nome))
                    {
                        echo "<script>alert('Campo Nome em Branco')</script>";
                    }
                    elseif (empty($this->email))
                    {
                        echo "<script>alert('Campo Email em Branco')</script>";
                    }
                    else if(empty($this->senha))
                    {
                        echo "<script>alert('Campo Senha em Branco')</script>";
                    }
                    else if (empty(trim($this->mensagem)))
                    {
                        echo "<script>alert('Campo Mensagem em Branco')</script>";
                    }
                    else {

                        $cst = $this->con->conectar()->prepare("INSERT INTO usuario (nome,email,senha, nivel, mensagem) VALUES(:nome,:email,:senha,:nivel,:mensagem) ");

                        $cst->bindParam("nome",$this->nome,PDO::PARAM_STR);
                        $cst->bindParam("email",$this->email,PDO::PARAM_STR);
                        $cst->bindParam("senha",$this->senha,PDO::PARAM_STR);
                        $cst->bindParam("nivel",$this->nivel,PDO::PARAM_INT);
                        $cst->bindParam("mensagem",$this->mensagem,PDO::PARAM_STR);

                        if($cst->execute())
                        {
                            return "ok";
                        }
                        else
                        {
                            return "Não deu!!!";
                        }
                    }
            }
            catch (PDOException $ex)
            {
                    echo $ex->getMessage();
            }
        }

        //Método para Listar Usuários
        public function querySeleciona()
        {
            try {

                $cst = $this->con->conectar()->prepare("SELECT * FROM usuario");
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
                $cst = $this->con->conectar()->prepare("SELECT id, nome, email, senha , nivel,  mensagem FROM usuario WHERE id = :idUsuario ");
                $cst->bindParam(":idUsuario", $this->id, PDO::PARAM_INT);
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
                $this->email = $dados['email'];
                $this->senha = sha1($dados['senha']);
                $this->nivel = $dados['nivel'];
                $this->mensagem = $dados['mensagem'];

                $cst = $this->con->conectar()->prepare("UPDATE usuario SET  nome = :nome, email = :email, senha = :senha, nivel = :nivel, mensagem = :mensagem WHERE id = :idUsuario");

                $cst->bindParam(":idUsuario", $this->id, PDO::PARAM_INT);
                $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                $cst->bindParam(":nivel", $this->nivel, PDO::PARAM_STR);
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
                $cst = $this->con->conectar()->prepare("DELETE FROM usuario WHERE id = :idUsuario");
                $cst->bindValue(":idUsuario",$this->id,PDO::PARAM_INT);
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



        //Logar Ususários
        public function logarUsuarios($dados)
        {
            $this->email = $dados["email"];
            $this->senha = sha1($dados["senha"]);

            try
            {
                $cst = $this->con->conectar()->prepare("SELECT id, email, senha FROM usuario WHERE email = :email AND senha = :senha");
                $cst->bindParam("email",$this->email,PDO::PARAM_STR);
                $cst->bindParam("senha",$this->senha,PDO::PARAM_STR);
                $cst->execute();

                if($cst->rowCount() == 0)
                {
                    header("Location:http://localhost/phpsistema/sistema/");
                }
                else
                {
                    session_start();
                    $rst = $cst->fetch();
                    $_SESSION["logado"] = "logar";
                    $_SESSION["func"] = $rst["id"];
                    header("Location:http://localhost/phpsistema/sistema/admin/index.php");
                }


            }catch (PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }

        //Método Para Imprimir os Atributos do Usuários
        public function verificaLogado($dado)
        {
            $cst = $this->con->conectar()->prepare("SELECT id,nome,email,nivel FROM usuario WHERE id=:id");
            $cst->bindParam(":id",$dado,PDO::PARAM_STR);
            $cst->execute();

            $rst = $cst->fetch();
            $_SESSION["nome"] = $rst["nome"];
            $_SESSION["nivel"] = $rst["nivel"];
        }

        //Método para Deslogar
        public function deslogarUsuarios()
        {
            unset($_SESSION);
            session_destroy();
            header("Location:http://localhost/phpsistema/sistema/");

        }

    }