<?php

namespace App\Http\Repository;

interface UserRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function destroy($id);

}
