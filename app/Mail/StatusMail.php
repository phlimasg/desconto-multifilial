<?php

namespace App\Mail;

use App\Models\Publico\PublicAluno;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PublicAluno $publicAluno,$mensagem = null)
    {
        $this->aluno = $publicAluno;
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.status',[
            'aluno' => $this->aluno,
            'mensagem' => $this->mensagem
        ]
        )->replyTo($this->aluno->Processo->email, 'SBD La Salle')->subject('Atualização do Processo de '.$this->aluno->nome.' | '.date('d/m/Y H:m'));
    }
}
