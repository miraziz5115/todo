@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-4" style="">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Новая задача</h2></div>
                <div class="panel-body">
                    <textarea id="text" name="text" class="form-control NewcommentArea"></textarea>
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker6">
                            <input type="text" class="form-control" id="date" onkeypress="handleMask(event, '9999-99-99 24:99:9999')" placeholder="ГГГГ-ММ-ДД ЧЧ:ММ:СС">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                    </div>
                </div>
                @if( $errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <div class="panel-footer">
                    <div class="text-right">
                        <input type="submit" id="todoSave" value="OK" class="btn btn-primary" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center">Список задач</h3>
    <div class="col-sm-12 col-md-12" id="result"></div>
    <hr>
    <div class="todo col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>

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
                        <div class="input-group date" id="datetimepicker6Edit">
                            <input type="text" class="form-control" id="dateEdit" onkeypress="handleMask(event, '9999-99-99 24:99:9999')" placeholder="ГГГГ-ММ-ДД ЧЧ:ММ:СС">
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
<input type="hidden" id="routeGet" value="{{ route('todo.index')}}">
<input type="hidden" id="routeStore" value="{{ route('todo.store')}}">

@endsection
