<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('icon.png') }}" sizes="16x16">
        <title>Tempo Training</title>
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.css') }}"  media="screen,projection"/>
          <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"  />

          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <base href="/">

        

        
    </head>
    <body ng-app="tempoApp">

        <div class="navbar">
            <nav>
              <div class="nav-wrapper black row">
                <h5 class=" col s12 center tempo-font white-text">
                  <span class="material-icons">fitness_center</span>
                    <span class="teal-text">TEMPO TRAINING</span>                  
                  <span class="material-icons ">fitness_center </span>
                </h5>

              </div>
            </nav>
        </div>     
        @verbatim
        <main class="container" ng-controller="TempoController">
                   
          <div class="row">  
            <div class="col s12 m8 offset-m2">           
                   
              <ul class="collection with-header ">
                <li class="collection-header teal darken-3">
                  <h5 class="center white-text tempo-font">USUARIOS</h5>
                  <nav>
                    <div class="nav-wrapper">
                      <form class="row"> 
                        <div class="input-field teal darken-3" >
                          <input id="search" type="search" ng-model="searchText">
                          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                          <i class="material-icons" ng-click="clearText()">close</i>
                        </div>
                        
                        <p class="col s4">
                          <label>
                            <input ng-model="checkAll" type="checkbox" ng-change="checkChange('checkAll')" checked />
                            <span>Todos</span>
                          </label>
                        </p>
                        <p class="col s4">
                          <label>
                            <input ng-model="checkWarning" type="checkbox" ng-change="checkChange('checkWarning')" />
                            <span>En Riesgo</span>
                          </label>
                        </p>
                        <p class="col s4">
                          <label>
                            <input ng-model="checkDanger" type="checkbox" ng-change="checkChange('checkDanger')" />
                            <span>Inhabilitados</span>
                          </label>
                        </p>                     
                      </form>
                    </div>
                  </nav>
                </li>
                <br>
                <li class="collection-item center" >
                  <h5 class="title">Días hábiles</h5>
                  <p class="row ">
                  <span class="col s4 valign-wrapper">
                    <i class="material-icons teal-text" >grade</i> Más de 6 Días
                  </span>
                  <span class="col s4 valign-wrapper">                
                    <i class="material-icons orange-text" >grade</i>Menos de 5 Días
                  </span>
                  <span class="col s4 valign-wrapper">                 
                    <i class="material-icons red-text" >grade</i> Inhabilitado 
                  </span>               
                  </p>
                </li>
                <li class="collection-item avatar" ng-repeat="user in users | filter:searchText | filter:checkFilter">
                  <img src="images/tempo.jpg" alt="" class="circle">
                  <span class="title">Usuario:  <i> {{user.name}}</i> </span>
                  <p>
                    Correo: <i>{{user.email}}</i> 
                    <br>                 
                    Días hábiles: <strong>{{user.difference}}</strong>
                    <br>
                    <a href="#modalTempo" class="waves-effect waves-light btn-small btn modal-trigger" ng-click="modalTempo(user)">Pago</a>               
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons" ng-class="startClass(user.difference)">grade</i></a>
                </li>   
              </ul>

            </div> 
          </div>
          
         <!-- Modal Structure -->
          <div id="modalTempo" class="modal center">
            <div class="modal-content">
              <h4>Realizar Pago</h4>
              <p>
                Estas a punto de realizar un pago a nombre de <strong>{{actual_user.name}}</strong>
              </p>
            </div>
            <div class="row">
              <a href="#!" ng-click="updateSubscription()" class="modal-close waves-effect waves-ligth teal white-text btn-flat">Aceptar</a>
              <a href="#!" class="modal-close waves-effect waves-ligth red white-text btn-flat">Cancelar</a>
            </div>
          </div>
        </main>


        @endverbatim

        <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angularjs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tempoService.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
