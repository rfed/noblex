<?php 

namespace Noblex\Repositories;

use Noblex\EmailSubject;
use Noblex\Repositories\Interfaces\SubjectInterface;
use Noblex\Subject;

class EloquentSubject implements SubjectInterface
{
	public function getAll()
	{
		return Subject::with('email_subjects:subject_id,email')->get();
	}


	public function findById($subject)
	{
		return Subject::findOrFail($subject);
	}


	public function store($request) 
	{
		$data = $request->validate([
			'title'	=> 'required',
			'email'	=> 'required'
		]);

		$subjects = new Subject();
		$subjects->title = $data['title'];
		$subjects->save();

		foreach($data['email'] as $email)
		{
			EmailSubject::create([
				'subject_id' 	=> $subjects->id,
				'email'			=> $email
			]);
		}
	}


	public function update($request, $subject) 
	{
		$subject = $this->findById($subject);

		$data = $request->validate([
			'title'	=> 'required',
			'email'	=> 'required'
		]);

		$subject->title = $data['title'];
		$subject->save();

		$emailSubjects = EmailSubject::where('subject_id', $subject->id)->delete();

		foreach($data['email'] as $email)
		{
			$emailSubjects = new EmailSubject();
			$emailSubjects->subject_id = $subject->id;	
			$emailSubjects->email = $email;
			$emailSubjects->save();
		}
		
	}


	public function destroy($subject) 
	{
		$subject = $this->findById($subject);		
		$subject->delete();		
	}

}