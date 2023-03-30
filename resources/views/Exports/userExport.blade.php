<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>usuarios registrados</title>

    <style>
        @page {
            margin: 100px 40px 10px 40px;
            font-family: Arial;
        }

        header,
        footer {
            position: fixed;
            left: 0px;
            right: 0px;
            width: 100%;
            padding-top: 30px;
        }

        header {
            top: -60px;
            height: 120px;
            display: inline-block;

        }

        header img {
            float: left;
            /* padding-top: 20px; */
        }

        header table {
            float: right;
        }

        header h4 {
            text-align: center;
        }


        footer {
            bottom: 8px;
            height: 70px;
            border-bottom: 2px solid white;
            font-size: 10px;
        }

        footer .page:after {
            content: counter(page);
        }

        footer table {
            width: 100%;
        }

        footer .izq {
            text-align: left;
        }

        .page-break {
            margin: 10px;
            padding-top: 100px;
            padding-bottom: 6rem;
        }

        table {
            border-spacing: 0px;
            text-align: justify;
            vertical-align: bottom;
        }

        th,
        td {
            border: 0.5px solid black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-orden {
            width: 100%;
        }

        .span-grid {
            text-align: center;
            font-size: 1rem;
            padding: 10px;
            text-transform: uppercase;
            text-decoration: overline;
        }

    </style>
</head>
<body>
    <header>
        
        <table>
            <tr>
                <td>No. DOCUMENTO</td>
                <td>User-{{date_format(now(),'Y')}}</td>
        
        </table>
        <h4>Movimiento de usuarios y registros</h4>
    </header>
    <footer style="padding-bottom: 30px">
      
        <table>
            <tr>
                <td>
                    <span style="padding-left:35px">Elaborado por: {{$userAuth}}</span>
                
                </td>
                <td>
                    <p class="page" style="text-align: center;">
                        Página
                    </p>
                </td>
                <td>
                    <p style="text-align: center">{{ date_format(now(), 'Y-m-d') }}</p>
                </td>
            </tr>
        </table>
    </footer>
    <div class="page-break">



    



        <table class="table-orden">
            <caption>Gestión de Usuarios</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Email</th>
                    <th>Fecha de registro</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td> {{ $user->cedula }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->cretaed_at }}</td>

                </tr>
                @endforeach
             
            </tbody>
        </table>








    </div>



</body>
</html>
