<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model;
    protected $totalpages = 2;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->model->paginate($this->totalpages);

        return view('painel.modulos.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('painel.modulos.usuarios.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();
        $dataForm['password'] = bcrypt($dataForm['password']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
            $upload = $image->storeAs('users', $nameFile);
            if ($upload)
                $dataForm['image'] = $nameFile;
            else
                return redirect()
                    ->route('usuarios.create')
                    ->withErrors(['errors' => 'Erro'])
                    ->withInput();
        }

        $insert = $this->model->create($dataForm);
        if ($insert)
            return redirect()
                ->route('usuarios.index')
                ->with(['success' => 'realizado com sucesso!']);
        else
            return redirect()
                ->route('usuarios.create')
                ->withErrors(['errors' => 'Falha'])
                ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->find($id);

        return view('painel.modulos.usuarios.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recuperar usuário
        $data = $this->model->find($id);

        return view('painel.modulos.usuarios.create-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->model->find($id);

        $this->validate($request, $this->model->rules($id));
        $dataForm = $request->all();

        if (!empty($dataForm['password'])) {
            $dataForm['password'] = bcrypt($dataForm['password']);
        } else {
            $dataForm['password'] = $data['password'];
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($data->image == '') {
                $nameImage = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
                $dataForm['image'] = $nameImage;
            } else {
                $nameImage = $data->image;
            }

            $upload = $image->storeAs('users', $nameImage);

            if ($upload)
                $dataForm['image'] = $nameImage;
            else
                return redirect()
                    ->route('usuarios.index')
                    ->withErrors(['errors' => 'Erro'])
                    ->withInput();
        }

        $update = $data->update($dataForm);

        if ($update)
            return redirect()
                ->route('usuarios.index')
                ->with(['success' => 'Alteração realizada!']);
        else
            return redirect()
                ->route('usuarios.update')
                ->withErrors(['errors' => 'Falha'])
                ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        $delete = $data->delete();
        if ($delete) {
            return redirect()
                ->route("usuarios.index")
                ->with(['success' => "{$data->name} excluido com sucesso!"]);
        } else {
            return redirect()
                ->route("usuarios.show")
                ->withErrors(['errors' => 'Falha ao excluir!']);
        }
    }

    public function search(Request $request)
    {
        $dataForm = $request->get('pesquisa');
        $users = $this->model
            ->where('name', 'LIKE', "%{$dataForm}%")
            ->orWhere('email', 'LIKE', "%{$dataForm}%")
            ->paginate($this->totalpages);
        return view("painel.modulos.usuarios.index", compact('users', 'dataForm'));
    }
}
