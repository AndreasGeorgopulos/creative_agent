<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

interface ICrud {
    public function read ($page_index = -1);
    public function create (Request $request);
    public function update (Request $request);
    public function delete ($id);
}
?>