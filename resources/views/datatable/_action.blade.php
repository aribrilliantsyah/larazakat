{!! Form::model($model,['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message] )!!}
 
 {!! Form::button('<i class="fa fa-trash"></i> Hapus',['type'=>'submit', 'class'=>'btn btn-xs'])!!}
{!! Form::close()!!}