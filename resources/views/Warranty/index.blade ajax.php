@extends('layouts.app')
@section('template_title')
	Warranty
@endsection

@section('content')
	<div id="div_principal">

        <select name="" id="nombre_proyecto">
        @foreach($consulta_db as $cons_db)
        <option value="{{$cons_db->project_id}}">{{$cons_db->name}}</option>
        
       
        @endforeach
        </select>

    <script>
        $(document).ready(function(){
            $(document).on('change','#nombre_proyecto', function(){
                var id_proyecto = $(this).val();
                console.log(id_proyecto);

                $.ajax({
                    type:'get',
                    url:"{{ route('get_Warranty_Id') }}?getproject="+id_proyecto,
                  
                    success:function(data){
                        console.log("success");
                        console.log(data);
                    },
                    error:function(){

                    }
                });
            });
        });
    </script>

	</div>
@endsection