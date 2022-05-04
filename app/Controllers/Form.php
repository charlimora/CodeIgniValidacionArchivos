<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller{
    
    public function index(){
        helper(['form']);
        $data =[];

        if($_POST){
            $rules = [
            'email' => 'required|valid_email',
            'miarchivo' => [
                //uploaded no permitirá que el campo se envíe vacío
                //el tamaño se especifica en KB. max_dims define un ancho y alto predeterminado
                //'rules' => 'uploaded[miarchivo]|max_size[miarchivo, 200]|ext_in[miarchivo,jpg,png]|max_dims[miarchivo,100,50]|is_image[miarchivo]',
                'rules' => 'uploaded[miarchivo]|max_size[miarchivo, 200]',
                'label' => 'El archivo'
                ]
            ];

        if ($this->validate($rules)){
            $archivo = $this->request->getFile('miarchivo');
           /* echo $archivo->getName();
            exit(); */
            if($archivo->isValid() && !$archivo->hasMoved()){
                $archivo->move('./uploads/images', $archivo->getRandomName());
            }

            return redirect()->to('/form/exitoso');
        } else {
            $data['validacion'] = $this->validator;
            }
        }
         
        return view('form', $data);
    }

    function exitoso(){
        return 'Hey, has pasado la validación. Felicitaciones';
    }
}