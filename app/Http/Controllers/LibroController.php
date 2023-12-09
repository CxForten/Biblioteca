<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    
    
    public function index(){
        $autor = Autor::where('estado', 1)->get();
        return view('libro.libro',compact('autor'));
    }

    public function saveLibro(Request $request){
        $datos = new Libro();
        $datos->titulo = $request->titulo;
        $datos->estado = true;
        $datos->year = $request->year;
        $datos->autor_id = $request->id_autor;
        $datos->save();
        return back();
    }
    public function mostrar(){
        $autor = Autor::where('estado', 1)->get();
        $libros = DB::table('libros')
        ->join('autors', 'autor_id', '=', 'autors.id')
        ->where('libros.estado', 1)
        ->select('libros.*', 'autors.nombre')
        ->get();
         return view('libro.tabla',compact('libros', 'autor'));
    }

    public function filtrar(Request $request){
        $categoria=Categoria::all();
        $producto=DB::table("categorias")
        ->join('productos', 'Id_categoria', '=', 'productos.Id_categoria')

        ->where('productos.estado', 1)

        ->where('categorias.nombre', 'LIKE','%'.$request->buscar.'%')
        ->select('productos.id','productos.nombre','productos.fechadevencimiento','productos.precio', 'productos.stock','categorias.nombre as categoria')
        ->get();
           return view("productos.index",compact("categorias"),compact("productos"));
   
    }
    

    public function eliminar($id){
        $libro = Libro::find($id);
        if($libro){
            $libro->estado = false;
            $libro->save();
            return back();
        }

    }

    public function actualizar($id){
        $autor = Autor::where('estado', 1)->get();
        $libro = Libro::find($id);
        if($id){
            return view('libro.actualizar', compact('libro', 'autor'));
        }
       
    }

    public function updateLibro(Request $request, $id){
        $datoNuevo = Libro::find($id);
        if ($datoNuevo) {
            $datoNuevo->update([
                "titulo" => $request->input("titulo"),
                "year" => $request->input("year"),
                "autor_id" => $request->input("id_autor")
            ]);
        } 
        return redirect('datos');
    //    return view('libro.libro',  compact('autor'));
    // return back();
    }
}

