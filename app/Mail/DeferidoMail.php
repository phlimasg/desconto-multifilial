<?php

namespace App\Mail;

use App\Models\Publico\PublicAluno;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeferidoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PublicAluno $publicAluno)
    {
        $this->aluno = $publicAluno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.deferido',[
            'aluno' => $this->aluno
        ]
        )->replyTo('bolsa.abel@lasalle.org.br', 'Bolsa Social')->subject(date('d/m/Y H:m').' - Processo de Bolsa Social - '.$this->aluno->ra);
    }
}
