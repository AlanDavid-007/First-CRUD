<?php
    //Ponte do sistema com o banco de dados//
    namespace app\Db;

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
                $this->connection = new PDO('mysql:host=localhost'.self::HOST.';dbname=primeirocrud'.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                die('ERROR: ' . $e->getMessage());
            }
        }
        
    }
?>