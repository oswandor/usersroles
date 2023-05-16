<?php

namespace App\Controllers;

use App\Models\UsuarioModel; 
use App\Models\RolModel; 
use App\Models\AsignacionRolModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\RESTful\ResourceController;

class Usersroles extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll();

        // Enviar los usuarios a la vista
        return view('welcome_message', ['usuarios' => $usuarios]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        $roles = new RolModel(); 
        $listOfroles = $roles->findAll();

        $usuarioModel = new UsuarioModel();
        $lastId = $usuarioModel->getLastId(); // Obtener el último ID generado

        return view('createusers', [ 'roleslist' => $listOfroles   , 'lastId'=> $lastId ] ); 
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // Obtener los datos del formulario
        $idUsuario = (int) $this->request->getPost('id_usuario');
        $nombre = $this->request->getPost('nombre');
        $contrasena = $this->request->getPost('password');
        $rolId = $this->request->getPost('rol_id');

        // Crear una instancia del modelo de Usuario
        $usuarioModel = new UsuarioModel();

        echo $idUsuario; 
        // Preparar los datos para guardar en la base de datos
        $data = [
            'nombre' => $nombre,
            'contraseña' => $contrasena,
        ];


        // Guardar los datos en la base de datos
        $usuarioModel->insert($data);

        // asignar rol  
        $addrol = new AsignacionRolModel(); 

        $adddatarol = [
            'id_usuario' => $idUsuario, 
            'rol_id'  => $rolId 
        ]; 


        $addrol->insert($adddatarol); 
                // Establecer un mensaje de éxito en las flash data
               // $session = session();
               // $session->setFlashdata('success', 'Usuario creado exitosamente');
                // Redirigir a la misma vista
        
        return redirect()->to('/users');
        
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        // se intacia el modelo usuario 
        $modeluser = new UsuarioModel();
        // cuando eliminar cuando el id_usuario sea igual a $id  
        $modeluser->where('id_usuario', $id)->delete($id); 
        // redirecciona  a la pagina principal de la lista  
        return $this->response->redirect('/users'); 
    }
}
