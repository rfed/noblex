<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\Interfaces\SubjectInterface;
use Noblex\Subject;

class SubjectController extends Controller
{
    private $subject;

    public function __construct(SubjectInterface $subject)
    {
        $this->middleware('auth');
        $this->subject = $subject;
    }


    public function index()
    {
        $subjects = $this->subject->getAll();

        return view('admin.pages.subjects.index', compact("subjects"));
    }

    
    public function create()
    {
        return view('admin.pages.subjects.create');
    }


    public function store(Request $request)
    {
        $this->subject->store($request);

        return redirect()->route('admin.subjects.index')->with('success', 'Asunto agregado correctamente');
    }


    public function edit(Subject $subject)
    {
        $subject = $this->subject->findById($subject->id);

        return view('admin.pages.subjects.edit', compact("subject"));
    }


    public function update(Request $request, Subject $subject)
    {
        $this->subject->update($request, $subject->id);

        return redirect()->route('admin.subjects.index')->with('info', 'Asunto editado correctamente');
    }


    public function destroy(Subject $subject)
    {
        $this->subject->destroy($subject->id); 

        return redirect()->route('admin.subjects.index')->with('danger', 'Asunto eliminado correctamente');
    }
}
