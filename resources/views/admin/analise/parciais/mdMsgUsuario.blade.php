<div class="modal fade" id="mdMsgUsuario" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Mensagens para o usuário</h4>
            <button type="button" class="close" onclick="$('#msgUsuario').modal('hide');">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 direct-chat-primary">
                    @forelse ($dados->MensagensUsuario as $i)                    
                      <div class="direct-chat-msg @if (Auth::user()->email == $i->user_create) right @endif">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{$i->user_create}}</span>
                          <span class="direct-chat-timestamp float-left">{{date('d/m/Y H:i',strtotime($i->created_at))}}</span>
                        </div>
                        
                        <img class="direct-chat-img" src="{{$i->User->profile_image}}">
                        
                        <div class="direct-chat-text">
                            {!!$i->msg_usuario!!}
                        </div>
                        
                      </div>
                    @empty
                        Nenhuma mensagem enviada
                    @endforelse                    
                </div>                
              </div>
        </div>        
        </div>
    </div>
</div>