<?php
require_once('BD.php');

/**
 *
 * @property mixed _last
 */
class Paginador {

    private $_MAX;
    private  $_DIV=5;

    private $_pass; //son las paginas que seran rederizadas en el body

    private $_page_actual;

    private $bd; //referenicia a la bd

    function __construct(){

        $this->_page_actual=0;
        $this->bd = new BD('paginador.bd',true);
        $this->_MAX = $this->bd->getLength();
        $this->result();
    }

    private  function result(){
        $this->_pass =$this->_MAX/$this->_DIV;

    }


    public function render_nav(){

        if(intval($_GET["page"])>4)
        {
            if( $_GET["page"] <= $this->_pass){
                $llegada= $_GET["page"]+1;
                $ter = $_GET["page"]-4;
            }else{
                $llegada= $_GET["page"];
                $ter = $_GET["page"]-5;
            }
        }
        else{
            $llegada= 5;
            $ter =0;
        }

        if($_GET["page"]>$this->_pass){
            $llegada= $this->_pass;
            $ter =0;
        }

        if ($this->_pass<$this->_DIV){
            $llegada= $this->_pass;
            $ter =0;
        }

         //echo ("pagina" .  $this->_page_actual++ . "  ");
        for ($i = $ter; $i < $llegada; $i++) {
            echo('<li><a href="?page=' . ($i+1) . '">' . ($i+1) . '</a></li>');
        }
    }

    public function render_body(){

        $resultado = $this->bd->getName((intval($_GET["page"])-1)*5);
        if  (intval($_GET["page"])-1>$this->_pass){
            $resultado = $this->bd->getName(0);
        }
        echo("<br/>");

        while ($row = $resultado->fetchArray()) {
       //     var_dump($row);
            echo"<br/>";

          //  echo (' <img src="img/100_3405.JPG" alt="Smiley face" height="100" width="100"> ');
            echo('<div>');
            echo $row['nombre'];
            echo('</div>');

            echo ("<hr/>");
        }
        echo("<br/>");
    }

}//end of class
