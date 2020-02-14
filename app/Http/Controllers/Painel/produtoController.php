<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Painel\Produto;
use App\Http\Requests\Painel\ProdutoFormRequest;

class produtoController extends Controller
{

    private $produto;
    private $totalPage = 2;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produto $produto)
    {
        $title = 'Listagem de Produtos';
        $produtos = $this->produto->paginate($this->totalPage);

        return view('painel.produtos.index', compact('produtos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro de Produtos';
        $categorys = ['eletronicos','moveis','limpeza','banho'];

        return view('painel.produtos.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoFormRequest $request)
    {
        $dataFor = $request->all();

        $dataFor['active'] = ( !isset($dataFor['active'])) ? 0 : 1;

        $insert = $this->produto->create($dataFor);

        if ($insert) 
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');

        return 'cadastrando';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        $title = "Produto: {$produto->name}";

        return view('painel.produtos.show', compact('title', 'produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        $title = "Editar Produto: {$produto->name}";
        $categorys = ['eletronicos','moveis','limpeza','banho'];

        return view('painel.produtos.create-edit', compact('title', 'categorys', 'produto'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoFormRequest $request, $id)
    {
        $dataFor = $request->all();

        $produto = $this->produto->find($id);

        $dataFor['active'] = ( !isset($dataFor['active'])) ? 0 : 1;

        $update = $produto->update($dataFor);

        if($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->with(['errros' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        $delete = $produto->delete();

        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show', $id)->with(['errros' => 'Falha ao deletar']);
    }
}
