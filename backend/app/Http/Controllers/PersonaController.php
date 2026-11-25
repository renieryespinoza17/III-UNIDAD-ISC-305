<?php 
namespace App\Http\Controllers; 
use App\Models\Persona; 
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule; 
class PersonaController extends Controller 
{ 
public function index() 
{ 
$personas = Persona::orderBy('id')->get(); 
return response()->json($personas, 200); 
} 
public function show(int $id) 
{ 
$persona = Persona::findOrFail($id); 
return response()->json($persona, 200); 
} 
public function store(Request $request) 
{ 
$datos = $request->validate([ 
'dni' => ['required', 'regex:/^[0-9]{13}$/', 
'unique:personas,dni'], 
'nombre' => ['required', 'string', 'max:100'], 
'fecha_nacimiento' => ['required', 'date', 
'before_or_equal:today'], 
]); 
$persona = new Persona(); 
$persona->dni = $datos['dni']; 
$persona->nombre = $datos['nombre']; 
$persona->fecha_nacimiento = $datos['fecha_nacimiento']; 
$persona->save(); 
return response()->json($persona, 201); 
}
}