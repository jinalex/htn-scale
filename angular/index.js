angular./**
* app Module
*
* Description
*/
module('app', [])
	.config(function($provide) {
		$provide.constant('getUserItems', 'getAllItems.php');
	}).service('httpHandler', ['$http', function($http){
		this.request = function(UrlToQuery, Data) {
			return $http({
				method: "post",
				url: UrlToQuery,
				data: Data,
				headers: { 'Content-Type': 'application/json;charset=utf-8' }
			});
		}
	}]).factory('indexFactory', ['httpHandler', 'getUserItems', function(httpHandler, getUserItems){
		return {
			UserItems: function() {
				return httpHandler.request(getUserItems, {});
			}
		}
	}]).directive("rdWidget", function() {
        var d={
            transclude:!0,
            template:'<div class="widget" ng-transclude></div>',
            restrict:"EA"
        };
        return d
    }).directive('enterSubmit', function () {
	    return {
	      restrict: 'A',
	      link: function (scope, elem, attrs) {
	       
	        elem.bind('keydown', function(event) {
	          var code = event.keyCode || event.which;
	                  
	          if (code === 13) {
	            if (!event.shiftKey) {
	              event.preventDefault();
	              scope.$apply(attrs.enterSubmit);
	            }
	          }
	        });
	      }
	    }
	}).directive("rdLoading", function() {
        var d=
        {
            restrict:"AE",
            template:'<div class="loading"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>'
        };
        return d
    }).directive("rdWidgetBody", function() {
        var d=
        {
            requires:"^rdWidget",
            scope:{
                loading:"@?",
                classes:"@?"
            },
            transclude:!0,
            template:'<div class="widget-body" ng-class="classes"><rd-loading ng-show="loading"></rd-loading><div ng-hide="loading" class="widget-content" ng-transclude></div></div>',
            restrict:"E"
        };
        return d
    }).directive("rdWidgetFooter",function (){
        var e=
        {
            requires:"^rdWidget",
            transclude:!0,
            template:'<div class="widget-footer" ng-transclude></div>',
            restrict:"E"
        };
        return e
    }).directive("rdWidgetHeader", function() {
        var e=
        {
            requires:"^rdWidget",
            scope:{
                title:"@",
                icon:"@"},
                transclude:!0,
                template:'<div class="widget-header"><i class="fa" ng-class="icon"></i> {{title}} <div class="pull-right" ng-transclude></div></div>',
                restrict:"E"
        };
        return e
    }).controller('controller', ['$scope', 'indexFactory', function($scope, indexFactory){
		$scope.toggle = true;
		
		$scope.toggleSidebar = function() {
			/*
			Had to simplify a lot of routing
			 */
			$scope.toggle = !$scope.toggle;
		}

		$scope.getUserItems = function() {
			indexFactory.UserItems().then(function(successResponse) {
				$scope.user = {
					items: successResponse.data
				};
			}, function(errorResponse) {
				console.log(errorResponse);
			})
		}
		$scope.getUserItems();
	}]);