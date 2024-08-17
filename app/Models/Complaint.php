<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory, Filterable;

    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function subdepartment()
    {
        return $this->belongsTo(SubDepartment::class);
    }
}
