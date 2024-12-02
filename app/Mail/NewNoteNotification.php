<?php

namespace App\Mail;

use App\Http\Controllers\EvaluationEleveController;
use App\Models\EvaluationEleve;
use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewNoteNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $note;

    /**
     * Create a new message instance.
     *
     * @param EvaluationEleve $note
     * @return void
     */
    public function __construct(EvaluationEleve $note)
    {
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle note saisie')
            ->view('emails.new_note')
            ->with([
                'note' => $this->note,
            ]);
    }
}
