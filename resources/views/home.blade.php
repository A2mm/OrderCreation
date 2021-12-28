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
            <a href="/get/orders" class="btn btn-info" style="margin-top: 30px;"> My Orders</a>

            <div class="row" style="margin-top: 30px;">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Order Details</div>
                        <div class="card-body"> 
                            <p> {{ $product->name }}</p>
                            <p> {{ $product->description }}</p>
                            <img height="100" width="150" src="{{ asset('products/prod.jpg') }}">
                        </div>
                        <div class="card-footer"> <label class="badge"> {{ $product->price }}  EGP </label> </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> Order Confirmation</div>
                        <div class="card-body"> 
                            <p> Total is  <span style="padding-right: 10px; padding-left: 10px; border-radius: 5px; background: orange">  {{ $product->sum('price') }} </span> &nbsp; EGP </p>
                            <form class="form" method="post" action="{{ route('web.create_order') }}">
                                @csrf

                                <?php $amount = $product->sum('price'); ?>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="amount" value="{{$amount}}">
                                <button type="submit" name="submit" class="btn btn-success"> Confirm </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

     <!-- <form class="form" method="post" action="{{ route('web.create_order') }}" style="margin-top: 25px;">
        <div class="card-footer"> <button type="submit" class="btn btn-success"> Confirm </button> </div>
        </form> -->

        </div>
    </body>
</html>
