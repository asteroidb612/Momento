'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
controller('ReminderListController',
    ["$scope", "$http", "$cookieStore",  function($scope, $http) {
}])

.controller('ReminderDetailController', 
    ["$scope", "$http", "$cookieStore", function($scope, $http) {
      $scope.updateForm = function() {
      }

    }])
.controller('LoginController', 
    ["$scope", "$http", "$location", "$cookieStore", function($scope, $http, $location) {
      $scope.processForm = function() {
        $http.post({method:'POST', url:'new_account.php'}).
  sucess(function(data, status, headers, config) {
      
  }).

        $location.path("/reminders");
      }
    }]);
