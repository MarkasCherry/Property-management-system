<?php

namespace App\Http\Livewire\Questions;

use App\Mail\SendAnswer;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class QuestionComponent extends Component
{
    public $question;
    public $answering = false;
    public $answer;

    protected $rules = [
        'answer' => 'required'
    ];

    public function destroy()
    {
        $this->question->update([
            'active' => false
        ]);

        $this->question->delete();

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Question has been removed'
        ]);
    }

    public function submit()
    {
        $this->validate();

        $this->question->update([
            'answer' => $this->answer,
            'active' => false
        ]);

        Mail::to($this->question->email)
            ->send(new SendAnswer($this->question));

        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Email has been successfully sent!'
        ]);
    }

    public function render()
    {
        return view('livewire.questions.question-component');
    }
}
