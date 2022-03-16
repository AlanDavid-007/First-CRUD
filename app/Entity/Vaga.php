<?php 
   namespace App\Entity;
   use \App\Db\Database;
   use \PDO;

   class Vaga {
        /** 
         * Identificador único da vaga
         * @var integer
        */
        public $id;

        /** 
         * Título da vaga
         * @var string
        */
        public $titulo;

        /** 
         * Descrição da vaga (pode conter html)
         * @var string
        */
        public $descricao;

        /** 
         * Define se a vaga está ativa (s or n)
         * @var string
        */
        public $status;

        /** 
         * Data da publicação da vaga
         * @var timestamp
        */
        public $data;

        /** 
         * Função para cadastrar a vaga no banco
         * @var boolean
        */
        public function cadastrar() {
            //Definir data
            $this->data = date('Y-m-d H:i:s');
            echo "<pre>"; print_r($this); echo "</pre>"; exit;
            
            //Inserir vaga no banco e retornar o ID
            
        }
   }

?>