<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Block;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\District;
use App\Models\State;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $complaints = Complaint::filter($request->all())
            ->with('creator', 'block', 'district', 'state', 'department', 'subdepartment')
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends($request->query());

        $creators = User::all();
        $blocks = Block::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $states = State::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $subdepartments = SubDepartment::where('status', 1)->get();


        return view('dashboard.complaints.index', [
            'complaints' => $complaints,
            'creators' => $creators,
            'states' => $states,
            'blocks' => $blocks,
            'districts' => $districts,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'filters' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $blocks = Block::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $states = State::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $subdepartments = SubDepartment::where('status', 1)->get();

        return view('dashboard.complaints.create', [
            'states' => $states,
            'blocks' => $blocks,
            'districts' => $districts,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'filters' => $request->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        Complaint::create(array_merge(
            $request->validated(),
            ['user_id' => auth()->user()->id]
        ));
        return redirect()->route('complaints.index', $request->query())->with('message', 'Addesd Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint, Request $request)
    {
        $blocks = Block::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $states = State::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $subdepartments = SubDepartment::where('status', 1)->get();

        return view('dashboard.complaints.show', [
            'states' => $states,
            'blocks' => $blocks,
            'districts' => $districts,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'filters' => $request->query(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint, Request $request)
    {
        $blocks = Block::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $states = State::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $subdepartments = SubDepartment::where('status', 1)->get();

        return view('dashboard.complaints.edit', [
            'states' => $states,
            'blocks' => $blocks,
            'districts' => $districts,
            'departments' => $departments,
            'subdepartments' => $subdepartments,
            'filters' => $request->query(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->validated());

        return redirect()->route('complaints.index', $request->query())
            ->with('message', 'Complaint has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint,Request $request)
    {
        $filters= $request->input('_token','_method');

        $complaint->delete();

        return redirect()->route('complaints.index', $filters)
            ->with('message', 'Complaint has been deleted successfully.');
    }
}
