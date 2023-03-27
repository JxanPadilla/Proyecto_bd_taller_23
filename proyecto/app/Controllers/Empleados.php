<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;
use App\Models\MunicipiosModel;
use App\Models\CargosModel;
class Empleados extends BaseController    
{    
    protected $empleados;
    protected $cargos;
    protected $municipios;
    public function __construct()
    {
        $this -> empleados = new EmpleadosModel();
        $this -> cargos = new CargosModel();
        $this -> municipios = new MunicipiosModel();
    }
        public function index() 
        {   
            $empleados= $this-> empleados->obtenerEmpleados();  
            $municipios = $this->municipios->obtenerMunicipios(); 
            $cargos= $this-> cargos->where('estado', "A")->findAll();        
            $data = ['titulo' => 'Proyecto Taller','nombre'=>'Yuleidis Avilez','empleados'=>$empleados, 'cargos'=>$cargos, 'municipios' => $municipios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/empleados/empleados', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }     

        function insertar(){
            if($this->request->getMethod() == "post") {
                $this->empleados->save([
                    'nombres' => $this->request->getPost('nombre'),
                    'apellidos' => $this->request->getPost('apellido'),
                    'id_municipio' => $this->request->getPost('muni'),
                    'nacimiento' => $this->request->getPost('nacimiento'),
                    'id_cargo' => $this->request->getPost('cargo'),
                ]);
                return redirect()->to(base_url('/empleados'));
            }
        }

}
