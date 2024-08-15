<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ComplaintFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];


    public function user($user)
    {
        return $this->where('user_id', $user);
    }
    public function state($state)
    {
        return $this->where('state_id', $state);
    }
    public function district($district)
    {
        return $this->where('district_id', $district);
    }
    public function block($block)
    {
        return $this->where('block_id', $block);
    }
    public function department($department)
    {
        return $this->where('department_id', $department);
    }
    public function subdepartment($subdepartment)
    {
        return $this->where('subdepartment_id', $subdepartment);
    }
}
