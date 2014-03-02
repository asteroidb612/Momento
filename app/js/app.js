'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/reminders', {templateUrl: 'partials/reminders.html', controller: 'ReminderListController'});
  $routeProvider.when('/reminders/:reminderId', {templateUrl: 'partials/reminder-detail.html', controller: 'ReminderDetailController'});
  $routeProvider.when('/', {templateUrl: 'partials/login.html', controller: 'LoginController'});
  $routeProvider.otherwise({redirectTo: '/'});
}]);
