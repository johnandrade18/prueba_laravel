<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['personals'] = Personal::paginate(5);
        return view('personal.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se reciben los datos del formulario de creacion
        //se declara la siguiente variable
        $campos =[
            'primer_nombre'=> 'required|string|max:100',
            'segundo_nombre'=> 'required|string|max:100',
            'primer_apellido'=> 'required|string|max:100',
            'segundo_apellido'=> 'required|string|max:100',
            'fecha_nacimiento'=> 'required|date',
            'tipo'=> 'required|string|max:100',
            'telefono'=> 'required|integer|max:11',
            'direccion'=> 'required|string|max:200',
            'foto'=> 'required|mimes:jpeg,png,jpg|max:10000',
        ];
        $mensaje=[

            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosPersonal = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosPersonal['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Personal::insert($datosPersonal);
        // return response()->json($datosPersonal);
        return redirect('personal')->with('mensaje','Personal Agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $personal = Personal::findOrFail($id);
        return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos =[
            'primer_nombre'=> 'required|string|max:100',
            'segundo_nombre'=> 'required|string|max:100',
            'primer_apellido'=> 'required|string|max:100',
            'segundo_apellido'=> 'required|string|max:100',
            'fecha_nacimiento'=> 'required|date',
            'tipo'=> 'required|string|max:100',
            'telefono'=> 'required|integer|max:11',
            'direccion'=> 'required|string|max:200',
        ];
        $mensaje=[

            'required'=>'El :attribute es requerido',
        ];


        if ($request->hasFile('foto')){
            $campos =['foto'=> 'required|mimes:jpeg,png,jpg|max:10000'
        ];
            $mensaje=[
                'foto.required'=>'La foto es requerido'
            ];
        }
        $this->validate($request, $campos, $mensaje);


        $datosPersonal = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            $personal = Personal::findOrFail($id);
            Storage::delete('public/' . $personal->foto);
            $datosPersonal['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Personal::where('id', '=', $id)->update($datosPersonal);
        $personal = Personal::findOrFail($id);
        // return view('personal.edit', compact('personal'));
        return redirect('personal')->with('mensaje','Personal actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        if (Storage::delete('public/' . $personal->foto)) {
            Personal::destroy($id);
        }
        return redirect('personal')->with('mensaje','Personal eliminado');
    }
}
