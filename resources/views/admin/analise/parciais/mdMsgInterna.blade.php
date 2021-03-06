<div class="modal fade" id="mdMsgInterna" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Mensagens internas</h4>
            <button type="button" class="close" onclick="$('#mdMsgInterna').modal('hide');">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 direct-chat-primary">
                    @forelse ($dados->MensagensInternas as $i)                    
                      <div class="direct-chat-msg @if (Auth::user()->email == $i->user_create) right @endif">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{$i->user_create}}</span>
                          <span class="direct-chat-timestamp float-left">{{date('d/m/Y H:i',strtotime($i->created_at))}}</span>
                        </div>
                        
                        <img class="direct-chat-img" src="{{$i->User->profile_image}}">
                        
                        <div class="direct-chat-text">
                            {!!$i->msg_interna!!}
                        </div>
                        
                      </div>
                    @empty
                        Nenhuma mensagem salva.
                    @endforelse                    
                </div>                
              </div>
        </div>        
        </div>
    </div>
</div>