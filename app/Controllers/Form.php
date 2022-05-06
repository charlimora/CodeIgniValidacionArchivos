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
            'archivo' => [
                //uploaded no permitirá que el campo se envíe vacío
                //el tamaño se especifica en KB. max_dims define un ancho y alto predeterminado
                //'rules' => 'uploaded[miarchivo]|max_size[miarchivo, 200]|ext_in[miarchivo,jpg,png]|max_dims[miarchivo,100,50]|is_image[miarchivo]',
                'rules' => 'uploaded[archivo.0|max_size[archivo, 200]',
                'label' => 'El archivo'
                ]
            ];

        if ($this->validate($rules)){
           // $archivo = $this->request->getFile('miarchivo');
           // echo $archivo->getName(); Esta línea estaba inicialmente pero al final se quitó
           //if($archivo ->isValid() && !$archivo->hasMoved()){
            //        $archivo->move('./uploads/images', $archivo->getRandomName());
             //  }
           // exit(); esta línea también estaba inicialmente pero se quitó por las líneas del if para validar el archivo
           //     $archivo->move('./uploads/images', $archivo->getRandomName());
           // }
           $archivos = $this->request->getFiles();
           foreach($archivos['archivo'] as $archivo){
               if($archivo ->isValid() && !$archivo->hasMoved()){
                   //quito el getRandomName
                    $archivo->move('./uploads/images/multiple');
               }
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