(function(){
  "use strict";

  var app = angular.module('tempoApp', ['tempoService']);
	app.constant("moment", moment);

	app.controller('TempoController', ['$scope' ,'moment', '$http','TempoService',
										function($scope, moment,$http,TempoService) {
	    moment.locale('es');
	    $scope.data_now = new moment();	    
	    $scope.users=[];
	    $scope.actual_user;
	    $scope.searchText="";
	    $scope.checkAll=true;
	    $scope.checkWarning=false;	    
	    $scope.checkDanger=false;

	    var elems = document.querySelectorAll('.modal');
    	var instances = M.Modal.init(elems, {});


	    let getUsers = function(){
	    	TempoService.get()
	    	.then(function (data) {
	    		let allUsers = data.data
	    		formatUsers(allUsers);	    			
			});
	    }

	    $scope.updateSubscription = function(){	
	    	let user_id = $scope.actual_user.id
	    	TempoService.updateSubscription(user_id)
	    	.then(function (data) {
		    	let allUsers = data.data
	    		formatUsers(allUsers);	    			
			});
	    }

	    let formatUsers = function(allUsers){
	    	var users = [];	    	
	    	angular.forEach(allUsers, function(user) {
	    		let date = new moment(user.end_subscription).add(1, 'days');
	    		let difference = date.diff($scope.data_now,'days');
	    		if (difference>0) {
	    			user.difference = difference;
	    		}
	    		else{
	    			user.difference = 0;
	    		}
	    			    		
			  	users.push(user);
			});
			$scope.users = users;	
	    }

	    $scope.startClass = function(difference){
	     	
	     	if(difference<=0)
	         return "red-text";

	     	else if(difference<5)
	            return "orange-text";

	     	else
	         return "teal-text";
	    }

	    $scope.modalTempo = function(user){	    	
	    	$scope.actual_user = user;
	    }

	    $scope.clearText = function(){	    	
	    	$scope.searchText="";
	    }

	    $scope.checkChange = function(check) {
	        if(check == 'checkAll'){
	        	$scope.checkAll=true;
	    		$scope.checkWarning=false;	    
	    		$scope.checkDanger=false;
	        }
	        else if(check == 'checkDanger'){
	        	$scope.checkAll=false;
	    		$scope.checkWarning=false;	    
	    		$scope.checkDanger=true;
	        }
	        else if(check == 'checkWarning'){
	        	$scope.checkAll=false;
	    		$scope.checkWarning=true;	    
	    		$scope.checkDanger=false;
	        } 
	    };

	    $scope.checkFilter = function(user)
		{
		    if($scope.checkAll)
		    {		    	
		        return true; 
		    }
		    else if($scope.checkWarning )
		    {	
		    	if (user.difference<5 && user.difference>0) {
		    		return true
		    	} 
		    }

		    else if($scope.checkDanger )
		    {
		    	if (user.difference==0) {
		    		return true
		    	}	    	
		         
		    }

		    return false;

		    
		};    

	    getUsers();    

	    
	}]);

})();


