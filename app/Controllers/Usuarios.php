<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $model = new UsuarioModel();

        $usuarios = $model->findAll();

        return view('usuarios', [
            'usuarios' => $usuarios
        ]);
    }

    public function criar()
    {
        $nome = trim((string) $this->request->getPost('nome'));
        $email = trim((string) $this->request->getPost('email'));

        if ($nome === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/usuarios');
        }

        $model = new UsuarioModel();

        $model->insert([
            'nome' => $nome,
            'email' => $email
        ]);

        return redirect()->to('/usuarios');
    }

    public function editar($id)
    {
        $nome = trim((string) $this->request->getPost('nome'));
        $email = trim((string) $this->request->getPost('email'));

        if ($nome === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/usuarios');
        }

        $model = new UsuarioModel();

        $usuario = $model->find($id);

        if ($usuario) {
            $model->update($id, [
                'nome' => $nome,
                'email' => $email
            ]);
        }

        return redirect()->to('/usuarios');
    }

    public function excluir($id)
    {
        $model = new UsuarioModel();

        $usuario = $model->find($id);

        if ($usuario) {
            $model->delete($id);
        }

        return redirect()->to('/usuarios');
    }
}
