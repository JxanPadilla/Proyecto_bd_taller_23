<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\UsuariosModel;
class Usuarios extends BaseController    
{    
    protected $usuarios;
    public function __construct()
    {
        $this -> usuarios = new UsuariosModel();
    }
        public function index() 
        {   
            $usuarios= $this->usuarios->where('estado', "A")->findAll();         
            $data = ['titulo' => 'CLINICA DE MOTOCARROS','nombre'=>'Calidad Y Eficiencia','usuarios'=>$usuarios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
            echo view('/principal/header' , $data);
            echo view('/usuarios/usuarios', $data);

            //echo view('/principal/principal',$data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
        }     

        public function buscar_Usuarios($id)
    {
        $returnData = array();
        $usuarios_ = $this->usuarios->traer_Usuarios($id);
        if (!empty($usuarios_)) {
            array_push($returnData, $usuarios_);
        }
        echo json_encode($returnData);
    }

    public function insertar()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->usuarios->save([
                    'nombres' => $this->request->getPost('nombres'),
                    'apellidos' => $this->request->getPost('apellidos'),
                    'correo' => $this->request->getPost('correo'),
                    'contraseña' => $this->request->getPost('contra1'),
                    'usuario_crea' => $this->request->getPost('')
                ]);
            } else {
                $this->usuarios->update($this->request->getPost('id'),[
                    'nombres' => $this->request->getPost('nombres'),
                    'apellidos' => $this->request->getPost('apellidos'),
                    'correo' => $this->request->getPost('correo'),
                    'contraseña' => $this->request->getPost('contra1'),
                    'usuario_crea' => $this->request->getPost('')
                ]);

            }
            return redirect()->to(base_url('/usuarios'));
        }
    }

    public function eliminados()
    {
        $usuarios = $this->usuarios->where('estado','E')->findAll();
        $data = ['titulo' => 'CLINICA DE MOTOCARROS','nombre'=>'Calidad Y Eficiencia', 'datos' => $usuarios];

        echo view('/principal/header', $data);
        echo view('usuarios/eliminados', $data);
       
    }

    public function eliminar($id,$estado){
        $usuarios_ = $this->usuarios->elimina_Usuarios($id,$estado);
        return redirect()->to(base_url('/usuarios'));
    }

    
}






