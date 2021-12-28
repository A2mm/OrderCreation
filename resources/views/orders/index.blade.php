<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">

             <a href="/logout" class="btn btn-danger" style="margin-top: 30px;"> Logout</a>
             <a href="{{URL::previous()}}" class="btn btn-warning" style="margin-top: 30px;"> Back</a>

            <p style="margin-top: 25px;"> Orders List </p>

            <table class="table table-striped">
                <tr>
                    <th> Id</th>
                    <th> Username</th>
                    <th> Amount</th>
                    <th> Commission</th>
                    @foreach($orders as $order)
                    <tr>
                        <td> {{ $order->id }} </td>
                        <td> {{ $order->user->name }} </td>
                        <td> {{ $order->amount }} EGP </td>
                        <td>  @foreach($order->commissions as $commission) 
                              {{ $commission->value }} %
                              @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tr>
            </table>

        </div>
    </body>
</html>
