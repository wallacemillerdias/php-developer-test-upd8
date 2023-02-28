<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\City;
use App\Models\Client;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->put('success', "");
        $clients = $this->client
            ->all()
            ->load('city')
            ->load('state');
        return view('customer-list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('register', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $msg = [
            'required' => 'O :attribute é obrigatório!',
            'cpf.min' => 'É necessário no mínimo 11 caracteres para o cpf!',
            'name.min' => 'É necessário no mínimo 5 caracteres para o nome!',
            'name.max' => 'O campo nome não deve ter mais de 50 caracteres.',
            'email.email' => 'Digite um email válido!',
            'name.unique' => 'Já existe um cadastro com esse nome.',
            'cpf.unique' => 'Este cpf já foi cadastrado!',
            'address.required' => 'Selecioneo o endereço, é obrigatório!',
            'birth_date.required' => 'Selecione a data nascimento, é obrigatório!',
            'sex.required' => 'Selecione o sexo, é obrigatório!'
        ];
        $validate = $request->validate([
            'cpf' => 'required|unique:clients|min:5',
            'name' => 'required|max:50|unique:clients',
            'address' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ], $msg);
        $data =  $request->post();
        $data['name'] = $this->ucfirst($request->post()['name']);
        if ($request->post()['name']) {
            session()->put('success', "Cliente {$this->ucfirst($request->post()['name'])}, foi cadastrado com sucesso.");
        }
        $this->client::create($data);
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $client = $this->client::find($id);
        $client->delete();
        return redirect('/customer-list');
    }

    public function indexCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    public function ucfirst($str)
    {
        $str = mb_strtolower($str);
        $words = preg_split('/\b/u', $str, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($words as $word) {
            $ucword = mb_strtoupper(mb_substr($word, 0, 1)) . mb_substr($word, 1);
            $str = str_replace($word, $ucword, $str);
        }
        return $str;
    }
}
