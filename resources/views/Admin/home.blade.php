@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Bienvenue sur le dashboard du site Lambillionea</h1></div>

                <div class="panel-body">          
                    <!--<p>You are logged in!</p>-->
                    <h4 class="marge-ext-inferieure-medium">Depuis cet interface vous aurez la possibilité de gérer le contenu du site public Lambillionea.</h4>
                    
                    <a href="{{url('admin/evenements') }}">
                        <div class="col-md-6">
                            <div class="marge-ext-inferieure-medium">
                                <span class="glyphicon-stack">
                                <i class="glyphicon glyphicon-circle glyphicon-stack-2x"></i>
                                <i class="glyphicon glyphicon-calendar glyphicon-stack glyphicon-stack-1x" style="font-size:80px;"></i>
                                </span>
                            </div>  
                            <p>Gestion des évènements</p>
                        </div>
                    </a>                     
                    
                    <a href="{{url('admin/associations-partenaires') }}">
                        <div class="col-md-6">
                            <div class="marge-ext-inferieure-medium">
                                <span class="glyphicon-stack">
                                <i class="glyphicon glyphicon-circle glyphicon-stack-2x"></i>
                                <i class="glyphicon glyphicon-link glyphicon-stack glyphicon-stack-1x" style="font-size:80px;"></i>
                                </span>
                            </div>  
                            <p>Gestion des liens partenaires</p>
                        </div>
                   </a> 
                    
                </div>
            </div>
        </div>

@endsection
