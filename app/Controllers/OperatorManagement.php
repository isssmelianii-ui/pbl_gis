<?php

namespace App\Controllers;

use App\Models\UserModel;

class OperatorManagement extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $operator = $model
            ->where('role', 'operator')
            ->findAll();

        return view('superadmin/operator', [

            'operator' => $operator

        ]);
    }

    public function create()
    {
        return view('superadmin/tambah_operator');
    }

    public function store()
    {
        $model = new UserModel();

        $model->save([
    'name' => $this->request->getPost('name'),
    'username' => $this->request->getPost('username'),
    'email' => $this->request->getPost('email'),
    'password' => password_hash(
        $this->request->getPost('password'),
        PASSWORD_DEFAULT
    ),
    'role' => 'operator',
]);

        return redirect()->to('/superadmin/data-operator');
    }
    
public function edit($id)
{
    $model = new UserModel();

    $operator = $model->find($id);

    return view('superadmin/edit_operator', [

        'operator' => $operator

    ]);
}

public function update($id)
{
    $model = new UserModel();

    $data = [

        'name' => $this->request->getPost('name'),

        'email' => $this->request->getPost('email')

    ];

    // kalau password diisi

    if($this->request->getPost('password') != ''){

        $data['password'] = password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        );

    }

    $model->update($id, $data);

    return redirect()->to('/superadmin/data-operator')
    ->with('success', 'Data operator berhasil diperbarui');

}
public function delete($id)
{
    $model = new UserModel();

    $model->delete($id);

    return redirect()->to('/superadmin/data-operator')
    ->with('success', 'Operator berhasil dihapus');
}
}