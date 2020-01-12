@extends('layouts.admin')
@section('content')

<<div class="right_col" role="main">
    
    <h3 class="text-center">Список выполненных задач</h3>
    <hr>
    <div class="todoDone col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>

<div class="clearfix"></div>
</div>
<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Задача</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md">
                    <input type="hidden" id="idEdit">
                    <textarea id="textEdit" name="textEdit" class="form-control NewcommentArea"></textarea>
                </div>
                <div class="col-sm-12 col-md-6">
                   <div class="form-group">
                        <div class="input-group date" id="datetimepicker6">
                            <input type="text" class="form-control" id="dateEdit" onkeypress="handleMask(event, '9999/99/99 24:99:9999')" placeholder="ГГГГ/ММ/ДД ЧЧ:ММ:СС">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="updateTodo">Сохранить</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="routeGet" value="{{ route('todoDoneList')}}">
  <script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: $('#routeGet').val(),
        method: 'GET',
        headers: {              
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data){
            if( data !=''){
                $.each(data, function(key, val) {
                    $('.todoDone').append('<div class="todoblock"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><p class="text">'+val.text+'</p></div><div class="clearfix"></div><hr><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right todoRight"><span>Дата выполнения : </span><span class="date">'+val.date+'</span>&nbsp; |&nbsp; <span>Дата создания :</span><span> '+val.created_at+ '</span></div></div></div></div>')
                });
            }else{
                $('.todoDone').append('<h2>Нет выполненных задач</h2>');
            }
        },
  });
}); 

</script>
@endsection

