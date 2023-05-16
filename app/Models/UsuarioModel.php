<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'contraseña'];

    public function getLastId()
    {
        $query = $this->db->query('SELECT MAX(id_usuario) as last_id FROM Usuario');
        $result = $query->getRow();

        if ($result) {
            return $result->last_id + 1;
        }

        return 1; // Si no hay registros, se asigna 1 como el primer ID
    }
}
