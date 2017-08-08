<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: juli-
 * Date: 24/07/2017
 * Time: 9:59
 */
class Asignatura extends Conexion
{
    private $id;

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
    private $name;
    private $ciclo;
    private $price;
    private $N_max;
    private $H_Inicio;
    private $H_Final;
    private $description;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * @param mixed $ciclo
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;
    }

    private $aula;

    /**
     * @return mixed
     */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * @param mixed $aula
     */
    public function setAula($aula)
    {
        $this->aula = $aula;
    }

    /**
     * @param mixed $name
     */


    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function __construct($Profe_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Profe_data)>1){ //
            foreach ($Profe_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->id = "";
            $this->name = "";
            $this->price = "";
            $this->N_max = "";
            $this->H_Inicio = "";
            $this->H_Final = "";
            $this->description = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.asignatura VALUES (NULL, ?,?,?,?,?,?,?,?)", array(

            $this->name,
            $this->price,
            $this->N_max,
            $this->H_Inicio,
            $this->H_Final,
                $this->description,
                $this->ciclo,
                $this->aula,
            )
        );
        $this->Disconnect();
    }
    public function getAll(){
        $sth = $this->datab->prepare('SELECT Nombre,N_min,N_max,H_Inicio,H_Final,profesores FROM asignatura');
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }
    /**
     * @return string
     */
    public function getIdA()
    {
        return $this->idA;
    }

    /**
     * @return string
     */
    public function setIdA($idA)
    {
        $this->idA = $idA;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @return string
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getNMin()
    {
        return $this->N_min;
    }

    /**
     * @return string
     */
    public function setNMin($N_min)
    {
        $this->N_min = $N_min;
    }
    public function getNMax()
    {
        return $this->N_max;
    }
    public function setNMax($N_max)
    {
        $this->N_max = $N_max;

    }

    /**
     * @return string
     */
    public function getHInicio()
    {
        return $this->H_Inicio;
    }

    /**
     * @return string
     */
    public function setHInicio($H_Inicio)
    {
        $this->H_Inicio = $H_Inicio;

    }
    public function getHFinal()
    {
        return $this->H_Final;
    }
    public function setFinal($H_Final)
    {
        $this->H_Final = $H_Final;
    }

    /**
     * @return string
     */
    public function getProfesores()
    {
        return $this->profesores;
    }
    public function setProfesores($profesores)
    {
        $this->profesores = $profesores;
    }
    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }




    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}