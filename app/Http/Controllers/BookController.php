<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
//use Illuminate\Http\Request;
use App\Models\ModelBook;
use App\User;

class BookController extends Controller
{
    private $objectUser;
    private $objectBook;
    public function __construct()
    {
        $this-> objectBook = new ModelBook();
        $this-> objectUser = new User();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($this->objectBook->find(2)->relUsers);
        $book=$this->objectBook->all();
        return view('index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objectUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $cad=$this->objectBook->create([
            'titulo'=>$request->titulo,
            'paginas'=>$request->paginas,
            'preço'=>$request->preço,
            'id_user'=>$request->id_user

        ]);
        if ($cad){
            return redirect('books');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=$this->objectBook->find($id);
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=$this->objectBook->find($id);
        $users=$this->objectUser->all(); // para manter as opções de selecionar autores
        return view('create', compact('book','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->objectBook->where(['id'=>$id])->update([
        'titulo'=>$request->titulo,
        'paginas'=>$request->paginas,
        'preço'=>$request->preço,
        'id_user'=>$request->id_user
    ]);
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
