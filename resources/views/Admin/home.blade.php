@extends('layouts.app')

@section('content')

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Bienvenue sur le dashboard du site Lambillionea</h1></div>

                <div class="panel-body">          
                    <!--<p>You are logged in!</p>-->
                    <h4>Depuis cet interface vous aurez la possibilité de gérer le contenu du site public Lambillionea.</h4>
                    
                    <a href="{{url('admin/evenements') }}">
                        <div class="col-md-6">
                            <div><span class="glyphicon glyphicon-calendar"  style="font-size:80px;"></span></div>  
                            <p>Gestion des évènements</p>
                        </div>
                        </a> 
                    <a href="">
                        <div class="col-md-6">
                            <div><span class="glyphicon glyphicon-link" style="font-size:80px;"></span></div>  
                            <p>Gestion des liens partenaires</p>
                        </div>
                   </a> 

                 <!--   <button class="btn btn-warning">
                        <span class="glyphicon glyphicon-shopping-cart"></span>Ajouter au panier
                    </button> -->
                    
                </div>
            </div>
        </div>

@endsection
