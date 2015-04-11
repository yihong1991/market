@extends('layouts.productLayout')
@section('content')
        <div class="content">
        @include('include.sidebar')
        <?php 
            echo $child;
        ?>
        @include('include.footbar')        
        </div>
@stop


