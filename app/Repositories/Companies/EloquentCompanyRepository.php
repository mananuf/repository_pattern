<?php

namespace App\Repositories\Companies;
use App\Models\Company;
use App\Repositories\Companies\CompanyContract;
use GuzzleHttp\Psr7\Request;

class EloquentCompanyRepository implements CompanyContract{

    public function edit($id, $request){
        $company = Company::find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        
        return $company;
    }


    public function create($request){

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();

        return $company;
    }

    public function remove($id){
        return Company::find($id)->delete();
    }


    public function findId($id){
        return Company::where('id', $id)->first();      // find specific id, where id, matches first
    }


    public function show(){
        $companies['companies'] = Company::orderBy('id', 'desc')->paginate(5);   // arrange in descending order
        return $companies;
    }
}