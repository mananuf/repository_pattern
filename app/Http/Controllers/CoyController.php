<?php

namespace App\Http\Controllers;

use App\Repositories\Companies\CompanyContract;
use Illuminate\Http\Request;

class CoyController extends Controller
{

    protected $coy;

    public function __construct(CompanyContract $companyContract)
    {
        $this->coy = $companyContract;
    }
    
    // index
    public function index(){
        $fetchedData = $this->coy->show();
        return view('coys.index', $fetchedData);
    }

    // create
    public function create()
    {
        //
        return view('coys.create');
    }

    // store/create
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $store = $this->coy->create($request);
        
        return redirect()->route('coys.index', $store)
        ->with('success','Company has been created successfully.');
    }


    public function edit($id){
        $company = $this->coy->findId($id);

        return view('coys.edit')->with('company', $company);
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        ]);
        
        $company = $this->coy->edit($id, $request);

        return redirect()->route('coys.index', $company)
        ->with('success', $company->name.' company Has Been updated successfully');
    }

    // destroy
    public function destroy($id)
    {
        $this->coy->remove($id);
        return redirect()->route('coys.index')
        ->with('success','Company has been deleted successfully');
    }
}
