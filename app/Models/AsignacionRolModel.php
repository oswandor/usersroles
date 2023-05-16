<?php

namespace App\Models;

use CodeIgniter\Model;

class AsignacionRolModel extends Model
{
    protected $table = 'asignacion_rol';
    protected $primaryKey = 'id_asignacion';
    protected $allowedFields = ['id_usuario', 'id_rol'];

    protected $useAutoIncrement = true;

    public function getRolesUsuario($idUsuario)
    {
        return $this->select('rol.*')
                    ->join('rol', 'asignacion_rol.id_rol = rol.id_rol')
                    ->where('asignacion_rol.id_usuario', $idUsuario)
                    ->findAll();
    }
}
