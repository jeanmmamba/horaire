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
      <a href="{{ url('/back/presence/list') }}" class="btn btn-primary pull-right">afficher liste de presence </a>  
  </a>


    <table id="myTable">
        <tr class="header">
            <th>#</th>
            <th>Name</th>
            <th>Email </th>
            <th>fonction</th>
            <th>Statut</th>
        </tr>
        <tbody>

            @foreach($users as $i=>$row)
            <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td> {{ $row->fonction }} </td>

            <td>
               
            {{ Form::open(['method'=>'put','url'=>['/historique/record/'.$row->id], 'style'=>'display:inline' ]) }}
              @if($row->type===1)
            {{ Form::submit('Marquer',['class'=>'btn btn-danger']) }}
              @else
            {{ Form::submit('Fin Journee',['class'=>'btn btn-success']) }}
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