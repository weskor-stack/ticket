@extends('layouts.app')

@section('template_title')
    Warranty
@endsection

@section('content')
<div id=div principal>
    @foreach($consulta_db as $cons_db)
    <table class="table">
        <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"></td>
                <td>4</td>
                <td>5</td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td>6</td>
                <td>7</td>
            </tr>
        </tbody>
    </table>
    @endforeach


</div>
@endsection