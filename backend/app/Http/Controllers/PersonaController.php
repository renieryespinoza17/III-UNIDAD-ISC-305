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
}