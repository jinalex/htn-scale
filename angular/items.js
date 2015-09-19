angular./**
* app Module
*
* Description
*/
module('app', ['ui.bootstrap', 'chart.js'])
	.config(function($provide) {
		$provide.constant('getUserItems', 'getAllItems.php');
		$provide.constant('MessagesSet', [
			{
				message_id: 1,
				message_title: 'Amazon 15% off until end of today',
				message_text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique hendrerit ex, vitae aliquet lacus lacinia non. Nam quis tincidunt elit, eu efficitur tellus. Ut lacinia laoreet magna at vulputate. Cras aliquam eros at ligula hendrerit placerat. Sed at magna tempus dui dictum cursus ac et mauris.'
			},
			{
				message_id: 2,
				message_title: 'Sears 18% off until tomorrow',
				message_text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique hendrerit ex, vitae aliquet lacus lacinia non. Nam quis tincidunt elit, eu efficitur tellus. Ut lacinia laoreet magna at vulputate. Cras aliquam eros at ligula hendrerit placerat. Sed at magna tempus dui dictum cursus ac et mauris.'
			}
		]);
		$provide.constant('GraphData', {
			'data': [
						[25.74, 34.23, 35.67, 37.45, 39.34, 45.54, 45.55, 89.45]
					],
			'series': ['Daily expense'],
			'labels': ['September 12', 'September 13', 'September 14', 'September 15', 'September 16', 'September 17', 'September 18', 'September 19']
			}
		);
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
    }).controller('controller', ['$scope', 'indexFactory', 'MessagesSet', 'GraphData', function($scope, indexFactory, MessagesSet, GraphData){
    	$scope.data = {};
    	$scope.data.messages = MessagesSet;
		$scope.toggle = true;

		$scope.data.dataset = GraphData.data;
		$scope.data.labels = GraphData.labels;
		$scope.data.series = GraphData.series;
		
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

		$scope.close = function(messageID) {
			for (var i = 0; i < $scope.data.messages.length; i++) {
				if ($scope.data.messages[i].message_id == messageID) {
					$scope.data.messages.splice(i, 1);
				}
			}
		}
	}]);