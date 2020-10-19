<div class="modal fade" id="historico" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Histórico de Sugestões</h4>
            <button type="button" class="close" onclick="$('#historico').modal('hide');">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 direct-chat-primary">
                    @forelse ($dados->DescontoHistorico as $i)                    
                      <div class="direct-chat-msg @if (Auth::user()->email == $i->user_create) right @endif">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{$i->user_create}}</span>
                          <span class="direct-chat-timestamp float-left">{{date('d/m/Y H:i',strtotime($i->created_at))}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{$i->User->profile_image}}">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Percentual: <span class="text-danger">{{$i->percentual}}</span></h3>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                    @empty
                        Nenhuma sujestão feita.
                    @endforelse
                    <!-- END timeline item -->                    
                </div>
                <!-- /.col -->
              </div>
        </div>        
        </div>
    </div>
</div>