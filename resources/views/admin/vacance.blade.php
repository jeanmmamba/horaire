    @extends('admin.layout.master')
    @section('content')


    <style>
        * {
        box-sizing: border-box;
        }
        
        #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        }
        
        #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
        }
        
        #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
        }
        
        #myTable tr {
        border-bottom: 1px solid #ddd;
        }
        
        #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
        }
        </style>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="recherche .." title="Type in a name">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </a>

    <table id="myTable">
        <tr class="header">
            <th>#</th>
            <th>nom</th>
            <th>fonction </th>
            <th>debut </th>
            <th>fin</th>
            <th>motif</th>
            <th>statut</th>
        </tr>
        <tbody>

            @foreach($datas as $i=>$row)
            <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->fonction }}</td>
            <td>{{ $row->debut }}</td>
            <td>{{ $row->fin }}</td>
            <td> {{ $row->motif }} </td>
            <td>
                {{ Form::open(['method'=>'put','url'=>['/back/fichevac/statut/'.$row->id], 'style'=>'display:inline' ]) }}
            @if($row->statut_vac===1)
                {{ Form::submit('en conger',['class'=>'btn btn-warning']) }}
            @else
                {{ Form::submit('en poste',['class'=>'btn btn-success']) }}
            @endif
            {{ Form::close() }}

        </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
        </script>

        </div>

    @endsection