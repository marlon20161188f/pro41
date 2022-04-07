<?php

namespace Modules\Sale\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sale\Models\OP;
use Modules\Sale\Http\Resources\OPCollection;
use Modules\Sale\Http\Requests\OPRequest;

class OPController extends Controller
{

    public function index()
    {
        return view('item::categories.index');
    }


    public function columns()
    {
        return [
            'name' => 'Nombre',
        ];
    }

    public function records(Request $request)
    {
        $records = OP::where($request->column, 'like', "%{$request->value}%")
                            ->latest();

        return new OPCollection($records->paginate(config('tenant.items_per_page')));
    }


    public function record($id)
    {
        $record = OP::findOrFail($id);

        return $record;
    }

    /**
     * Crea o edita una nueva categoría.
     * El nombre de categoría debe ser único, por lo tanto se valida cuando el nombre existe.
     *
     * @param OPRequest $request
     *
     * @return array
     */
    public function store(OPRequest $request)
    {
        $id = (int)$request->input('id');
        $name = $request->input('name');
        $error = null;
        $category = null;
        if(!empty($name)){
            $category = OP::where('name', $name);
            if(empty($id)) {
                $category= $category->first();
                if (!empty($category)) {
                    $error = 'El nombre de categoría ya existe';
                }
            }else{
                $category = $category->where('id','!=',$id)->first();
                if (!empty($category)) {
                    $error = 'El nombre de categoría ya existe para otro registro';
                }
            }
        }
        $data = [
            'success' => false,
            'message' => $error,
            'data' => $category
        ];
        if(empty($error)){
            $category = OP::firstOrNew(['id' => $id]);
            $category->fill($request->all());
            $category->save();
            $data = [
                'success' => true,
                'message' => ($id)?'Categoría editada con éxito':'Categoría registrada con éxito',
                'data' => $category
            ];
        }
        return $data;

    }

    public function destroy($id)
    {
        try {

            $category = OP::findOrFail($id);
            $category->delete();

            return [
                'success' => true,
                'message' => 'Categoría eliminada con éxito'
            ];

        } catch (Exception $e) {

            return ($e->getCode() == '23000') ? ['success' => false,'message' => "La categoría esta siendo usada por otros registros, no puede eliminar"] : ['success' => false,'message' => "Error inesperado, no se pudo eliminar la categoría"];

        }

    }




}
