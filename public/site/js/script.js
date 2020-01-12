$( document ).ready(function() {
  $.ajax({
    url: $('#routeGet').val(),
    method: 'GET',
    headers: {              
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    success: function(data){
      if( data !=''){
         $.each(data, function(key, val) {
            $('.todo').append('<div class="todoblock"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><p class="text">'+val.text+
                              '</p></div><div class="clearfix"></div><hr><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right todoRight"><span>Дата выполнения : </span><span class="date">'+val.date+
                              '</span>&nbsp; |&nbsp; <span>Дата создания :</span><span> '+val.created_at+ '</span>&nbsp;|&nbsp;<span>Действия : </span>&nbsp;<span class="glyphicon glyphicon-pencil todoEdit" onclick="todoEdit('+val.id+')" data-id="'+val.id+
                              '"></span>&nbsp;|&nbsp;<span class="glyphicon glyphicon-trash todoDelete" onclick="todoDelete('+val.id+')" data-id="'+val.id+
                              '"></span>&nbsp;|&nbsp;<span class="glyphicon glyphicon-check todoDone" aria-hidden="true"  onclick="todoDone('+val.id+')" data-id="'+val.id+
                              '"></span></div></div></div></div>')
                            });
      }else{
        $('.todo').append('<h2 id="noResult">Нет задачи</h2>');
      }
    },
    errors:function(data){
      console.log(data);
    }
  });
});
    
$('#todoSave').click(function(){
  var text = $('#text').val();
  var date = $('#date').val();
  $.ajax({
    url: $('#routeStore').val(),
    method: 'POST',
    headers: {              
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    data:{
        text: text,
        date: date,
    },
    success: function(data){
      $('#text').val('');
      $('#date').val('');
      // location.reload();
      $('#noResult').text('');
      $('.todo').prepend('<div class="todoblock"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><p class="text">'+data.text+
                                '</p></div><div class="clearfix"></div><hr><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right todoRight"><span>Дата выполнения : </span><span class="date">'+data.date+
                                '</span>&nbsp; |&nbsp; <span>Дата создания :</span><span> '+data.created_at+ '</span>&nbsp;|&nbsp;<span>Действия : </span>&nbsp;<span class="glyphicon glyphicon-pencil todoEdit" onclick="todoEdit('+data.id+')" data-id="'+data.id+
                                '"></span>&nbsp;|&nbsp;<span class="glyphicon glyphicon-trash todoDelete" onclick="todoDelete('+data.id+')" data-id="'+data.id+
                                '"></span>&nbsp;|&nbsp;<span class="glyphicon glyphicon-check todoDone" aria-hidden="true"  onclick="todoDone('+data.id+')" data-id="'+data.id+
                                '"></span></div></div></div></div>')
    },

  });
});

function todoDelete(id){
  if( confirm('Вы действительно хотите удалить эту задачу?')){
    $.ajax({
      url: 'api/todo/'+id,
      method: 'DELETE',
      headers: {              
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      data:{
          id: id,
      },
      success: function(data){
        location.reload();
      },

    });
  }
}

function todoEdit(id){
  $('#editModal').modal('show');
  $.ajax({
    url: 'api/todo/'+id,
      method: 'GET',
      headers: {              
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
    success: function(data){
      $('#textEdit').val(data.text);
      $('#dateEdit').val(data.date);
      $('#idEdit').val(data.id);
     },

  });
}
function todoDone(id){
  if( confirm('задача выполнена?')){
    $.ajax({
      url: 'api/todo/'+id,
        method: 'PUT',
        headers: {              
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
      data:{id:id,status:1},
      success: function(data){
        location.reload();
      },
    });
  }
}
$('#updateTodo').click(function(){
  var id = $('#idEdit').val();
  var text = $('#textEdit').val();
  var date = $('#dateEdit').val();
  $.ajax({
      url: 'api/todo/'+id,
      method: "PUT",
      headers: {              
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      data:{
          id: id,
          text: text,
          date: date,
      },
      success: function(data){
       location.reload();
      },
  });
});

$('#datetimepicker6').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'
});

$('#datetimepicker6Edit').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'
});



function handleMask(event, mask) {
    with (event) {
        stopPropagation()
        preventDefault()
        if (!charCode) return
        var c = String.fromCharCode(charCode)
        if (c.match(/\D/)) return
        with (target) {
            var val = value.substring(0, selectionStart) + c + value.substr(selectionEnd)
            var pos = selectionStart + 1
        }
    }
    var nan = count(val, /\D/, pos) // nan va calcolato prima di eliminare i separatori
    val = val.replace(/\D/g,'')

    var mask = mask.match(/^(\D*)(.+9)(\D*)$/)
    if (!mask) return // meglio exception?
    if (val.length > count(mask[2], /9/)) return

    for (var txt='', im=0, iv=0; im<mask[2].length && iv<val.length; im+=1) {
        var c = mask[2].charAt(im)
        txt += c.match(/\D/) ? c : val.charAt(iv++)
    }

    with (event.target) {
        value = mask[1] + txt + mask[3]
        selectionStart = selectionEnd = pos + (pos==1 ? mask[1].length : count(value, /\D/, pos) - nan)
    }

    function count(str, c, e) {
        e = e || str.length
        for (var n=0, i=0; i<e; i+=1) if (str.charAt(i).match(c)) n+=1
        return n
    }
}