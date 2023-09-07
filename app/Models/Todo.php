<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = "Todo";
    protected $fillable = ["id", "task"];

    public function deleteRow($id) {
        $this->where('Id', $id)->delete();
    }

    public function updateRow($request) {
        $this->where('Id', $request->input("id"))->update(["task" => $request->input("task")]);
    }
}
