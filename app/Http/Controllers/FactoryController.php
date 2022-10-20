<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use DB;
use Illuminate\Http\Request;

/**
 * Class FactoryController
 * @package App\Http\Controllers
 */
class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factories = Factory::paginate();

        return view('factory.index', compact('factories'))
            ->with('i', (request()->input('page', 1) - 1) * $factories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factory = new Factory();
        return view('factory.create', compact('factory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Factory::$rules);
        $statement = DB::statement("SET @user_id = 9999");

        $factory = request()->except('_token','customer_factory','contact_factory');

        $factory ['customer_id'] = $request['customer_factory'];

        $factory ['contact_id'] = $request['contact_factory'];

        $factory ['user_id'] = 9999;

        // return response()->json($factory);

        Factory::insert($factory);

        // $factory = Factory::create($request->all());

        // return redirect()->route('factories.index')
        //     ->with('success', 'Factory created successfully.');
        return '<script>
                        alert("'.__('Created successfully').'"); 
                        javascript:history.go(-1); 
                    </script>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factory = Factory::find($id);

        return view('factory.show', compact('factory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factory = Factory::find($id);

        return view('factory.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Factory $factory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factory $factory)
    {
        request()->validate(Factory::$rules);

        $factory->update($request->all());

        return redirect()->route('factories.index')
            ->with('success', 'Factory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factory = Factory::find($id)->delete();

        return redirect()->route('factories.index')
            ->with('success', 'Factory deleted successfully');
    }
}
