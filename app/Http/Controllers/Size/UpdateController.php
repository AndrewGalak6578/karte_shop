<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\UpdateRequest;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Size $size)
    {
        $data = $request->validated();

        $size->update($data);

        return view('size.show', compact('size'));
    }
}
