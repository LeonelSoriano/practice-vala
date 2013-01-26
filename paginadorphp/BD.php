<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonel
 * Date: 24/01/13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */ 
class BD {

    private $str_bd;

    private $ref_sql;

    function __construct($str_bd,$bool_exist=false){

        $this->str_bd = $str_bd;
        $this->ref_sql = new SQLite3($this->str_bd);

        if($bool_exist==false){
            $this->create();
        }
    }

    private function create(){
        $this->ref_sql->exec('
            CREATE TABLE paginador(
            id INTEGER PRIMARY KEY,
            nombre TEXT NOT NULL
          )');
    }

    public function insert($inserted){
        $this->ref_sql->exec("INSERT INTO paginador  VALUES (null,'".$inserted."')");
    }

    public function getName( $page ){

        return $this->ref_sql->query('SELECT * FROM paginador limit '. $page .',5 ');

    }


    public function  getAll(){
        $result= $this->ref_sql->query('SELECT * FROM paginador');
        while ($row = $result->fetchArray()) {
            var_dump($row);
            echo ("<br/>");
        }
    }
    public function  getLength(){
        $result= $this->ref_sql->query('SELECT COUNT(*) as count FROM paginador');
        $row = $result->fetchArray();
        return $row['count'];
    }


    public function  getPath(){
        return $this->str_bd;
    }

}
