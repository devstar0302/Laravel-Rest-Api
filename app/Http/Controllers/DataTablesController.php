<?php

namespace App\Http\Controllers;

use App\Datatable;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;

class DataTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.examples.datatables');
    }

    public function data()
    {
        $tables = Datatable::select(['id', 'username', 'fullname', 'email']);

        return Datatables::of($tables)
            ->make(true);
    }

    public function editableDatatableIndex()
    {
        return view('admin.examples.editable_table');
    }

    public function editableDatatableData()
    {
        $tables = Datatable::get(['id','username', 'fullname','points','notes']);

        return Datatables::of($tables)
            ->add_column('edit', '<a class="edit" href="javascript:;">'.config('Convert.edit')[0].'</a>')
            ->add_column('delete', '<a class="delete" href="javascript:;">'.config('Convert.delete')[0].'</a>')
            ->make(true);
    }

    public function editableDatatableStore(Request $request)
    {
        if($request->ajax()) {
            Datatable::create($request->except('_token'));
        }
    }

    public function editableDatatableUpdate(Request $request, $id)
    {
        $table = Datatable::find($id);

        $table->update($request->except('_token'));
        return $table->id;

    }

    public function editableDatatableDestroy($id)
    {
        $row=Datatable::find($id);
        $row->delete();
        return $row->id;
    }
}
