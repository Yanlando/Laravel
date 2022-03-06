@extends('layouts.body')
@section('container')
<h1> {{ $name }} </h1> 
<h1><?php echo $email ?></h1>
<img src="img/<?php echo $image ?>" alt="yan lando" width=250>

@endsection
