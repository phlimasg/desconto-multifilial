<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="margin: 0 auto; max-width: 600px; width: 100%">
        <div style="width: 100%; background-color: #004aba">
            <img src="http://lasalle.edu.br/public/uploads/images/abel/5af5fc44d4812(BRANCA-HORIZONTAL)_Abel.png" alt="" width="255px">
        </div>
        <div>
        <h3>Atualização do processo "{{$aluno->Processo->nome}}"</h3>

            <p>Informamos que atualizamos os dados da sua solicitação.</p>
            <p><b>Novo Status:</b> {{$aluno->status}}</p>
            <br>
            @if ($aluno->status == 'Falta Documento')
                <p><b>Mensagem:</b></p>
                {!!$mensagem->msg_usuario!!}
            @endif
            @if ($aluno->status == 'Deferido')
                <p><b>Parabéns!</b></p>
                <p>Seu desconto de <b>{{$aluno->desconto_deferido}}</b> foi deferido.</p>
                @if (!empty($mensagem))
                    {!!$mensagem->msg_usuario!!}
                @endif
            @endif
            <br>
            <p>Agradecemos a confiança e parceria.</p>

            <div style="text-align: right">
                <p>Atenciosamente,<br>

                    Colégio La Salle Abel</p>
            </div>
        </div>
    </div>
</body>
</html>