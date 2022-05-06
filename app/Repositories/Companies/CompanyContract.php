<?php

namespace App\Repositories\Companies;

interface CompanyContract{
    public function create($request);
    public function edit($id, $request);
    public function remove($id);
    public function findId($id);
    public function show();
}
