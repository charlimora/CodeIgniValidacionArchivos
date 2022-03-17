<?php 
namespace App\Models;

use CodeIgniter\Model;

class Curso extends Model{
    protected $table      = 'cursos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    //activar el acceso a las columnas
    protected $allowedFields = ['nombre','imagen'];
}