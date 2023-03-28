<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\SalariosModel;
use App\Models\EmpleadosModel;
class Salarios extends BaseController    
{    
    protected $salarios;
    protected $empleados;
    public function __construct()
    {
        $this -> salarios = new SalariosModel();
        $this -> empleados = new EmpleadosModel();
    }
        public function index() 
        {   
            $empleados = $this->empleados->obtenerEmpleados();       
            $salarios= $this->salarios->obtenerSalarios(0);         
            $data = ['titulo' => 'CLINICA DE MOTOCARROS','nombre'=>'Calidad Y Eficiencia','salarios'=>$salarios, 'empleados' => $empleados]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/salarios/salarios', $data);


            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }  
        
        public function salariosG($id) 
        {   
            $empleados = $this->empleados->obtenerEmpleados();       
            $salarios= $this->salarios->obtenerSalarios($id);         
            $data = ['titulo' => 'CLINICA DE MOTOCARROS','nombre'=>'Calidad Y Eficiencia','salarios'=>$salarios, 'empleados' => $empleados]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/salarios/salarios', $data);


            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        } 

        public function buscar_Salarios($id)
    {
        $returnData = array();
        $salarios_ = $this->salarios->traer_Salarios($id);
        if (!empty($salarios_)) {
            array_push($returnData, $salarios_);
        }
        echo json_encode($returnData);
    }


    public function insertar($id)
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->salarios->save([
                    'periodo' => $this->request->getPost('periodo'),
                    'id_empleado' => $this->request->getPost('empleados'),
                    'sueldo' => $this->request->getPost('salario')
                ]);
            } else {
                $this->salarios->update($this->request->getPost('id'),[         
                    'periodo' => $this->request->getPost('periodo'),           
                    'sueldo' => $this->request->getPost('salario')
                ]);

            }
                return redirect()->to(base_url('/salarioemple/').$this->request->getPost('empleados'));

            
        }
    }


    public function eliminados()
    {
        $salarios = $this->salarios->eliminados_salarios();
        $empleados = $this->empleados->obtenerEmpleados();
        $data = ['titulo' => 'CLINICA DE MOTOCARROS','nombre'=>'Calidad Y Eficiencia', 'salarios'=>$salarios, 'empleados' => $empleados];
        echo view('/principal/header', $data);
        echo view('salarios/eliminados', $data);
       
    }

    public function eliminar($id,$estado){
        $salarios_ = $this->salarios->elimina_Salarios($id,$estado);
        return redirect()->to(base_url('/salarios'));


    }
}






