<?php
    //Ponte do sistema com o banco de dados//
    namespace App\Db;

    use Exception; //Tratamento de exceções//
    use \PDO; //Classe de comunicação com o banco de dados//
    use PDOException; //Classe de tratamento de exceções do banco de dados//
    use PDOStatement; //Classe de comunicação com métodos do banco de dados//

    class Database {
         /** 
         * Host de conexão com o banco de dados
         * @var string
        */
        const HOST = 'localhost'; //127.0.0.1(localhost)

         /** 
         * Nome do Banco de dados
         * @var string
        */
        const NAME = 'primeirocrud'; //Mesmo nome do banco de dados criado

        /** 
         * Usuário do Banco de dados
         * @var string
        */
        const USER = 'root'; //User

        /** 
         * Senha de acesso do Banco de dados
         * @var string
        */
        const PASS = ''; //Password

        /** 
         * Nome da tabela a ser manipulada
         * @var string
        */
        private $table;//Varíavel privada

        /** 
         * Instância PDO para conexão com o banco de dados
         * @var PDO
        */
        private $connection;//Varíavel privada

        /** 
         * Define a tabela e instância a conexão
         * @param string $table
        */
        public function __construct($table = null) {
            $this->table = $table;
            $this->setConnection();
        }
        /** 
         * Método responsável por criar uma conexão com o banco de dados
         * @param string $table
        */
        private function setConnection() {
            try {
                //PDO é a classe que recebe os parametros para devolver um objeto de conexão com o banco de dados
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                die('ERROR: ' . $e->getMessage());
            }
        }

        /** 
     * Método responsável por executar querys no banco de dados (útil para querys de consulta)
     * @params string query
     * @param array $values [field => value]
     * @return PDOStatement
    */
    public function executar($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        }catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
            /** 
         * Método responsável por inserir registros no banco
         * @param array $values [field => value]
         * @return Id inserido
        */
        public function insert($values) {
            // $query = 'INSERT INTO vagas (titulo, descricao, data, status) VALUES ("teste", "bla bla", "2020-08-18 00:00:00", "Ativo")';
            // ? = O PDO usa esse formato para validar e verificar a proteção contra SQLInjection
            // echo "<pre>"; print_r($values); echo "</pre>"; exit;


            //Dados da query
            $fields = array_keys($values);
            $binds = array_pad([], count($fields), '?');

            $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES ('.implode(",", $binds).')';
            // echo "<pre>"; print_r($fields); echo "</pre>"; exit;
            // echo "<pre>"; print_r($binds); echo "</pre>"; exit;

            //Monta a query
            //implode transporma um array em uma string
            $query = 'INSERT INTO '.$this->table.' ('.implode(",", $fields).') VALUES ('.implode(",", $binds).')';
            // echo "<pre>"; print_r($query); echo "</pre>"; exit;

            //Executa o insert
            $this->executar($query, array_values($values));

            return $this->connection->lastInsertId();
        }
    }
?>