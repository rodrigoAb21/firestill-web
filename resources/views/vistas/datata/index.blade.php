
<!DOCTYPE html>
<html>
<head>
    <title>Laravel DataTables</title>
    <script src="{{asset('plantilla/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('plantilla/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('plantilla/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('plantilla/material/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('plantilla/material/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('plantilla/material/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('plantilla/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('plantilla/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('plantilla/material/js/custom.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Chart JS -->

    <script src="{{asset('plantilla/assets/plugins/Chart.js/Chart.min.js')}}"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('plantilla/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

</head>
<body>

<div class="container">
    <table id="task" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Id</th>
            <th>Task</th>
            <th>Category</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr class="text-center">
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre_empresa}}</td>
                <td>
                    {{$cliente->direccion}}
                </td>
                <td>{{$cliente->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#task').DataTable();

    });
</script>
</body>
</html>
