angular./**
* app Module
*
* Description
*/
module('app', ['ui.bootstrap'])
	.config(function($provide) {
		$provide.constant('getUserItems', 'getAllItems.php');
		$provide.constant('getItemByUPC', 'ItembyUPC.php');
		$provide.constant('MessagesSet', [
			{
				message_id: 1,
				message_title: 'Amazon 15% off until end of today',
				message_text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique hendrerit ex, vitae aliquet lacus lacinia non. Nam quis tincidunt elit, eu efficitur tellus. Ut lacinia laoreet magna at vulputate. Cras aliquam eros at ligula hendrerit placerat. Sed at magna tempus dui dictum cursus ac et mauris.',
				cssClass: 'fa fa-amazon',
				pullClass: 'widget-icon orange pull-left'
			},
			{
				message_id: 2,
				message_title: 'Target 18% off until tomorrow',
				message_text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique hendrerit ex, vitae aliquet lacus lacinia non. Nam quis tincidunt elit, eu efficitur tellus. Ut lacinia laoreet magna at vulputate. Cras aliquam eros at ligula hendrerit placerat. Sed at magna tempus dui dictum cursus ac et mauris.',
				cssClass: 'fa fa-dot-circle-o',
				pullClass: 'widget-icon red pull-left'
			}
		]);
		$provide.value('Items', [
   // {
   //     item_name: 'Advil',
   //     pull_class: 'widget-icon red pull-left',
   //     widget_class: 'fa fa-plus-square',
   //     percent_left: '2.3',
   //     label_class: 'label label-danger',
   //     color_code: {
   //     	color: '#D95349'
   //     },
   //     status: 'Almost None',
   //     message: 'Buy by end of today'
   // },
   {
		item_name: 'Advil',
	   	pull_class: 'widget-icon red pull-left',
	   	widget_class: 'fa fa-plus-square',
	   	label_class: 'label label-danger',
	   	color_code: {
	   		color: '#D9534F'
	   	},
	   	status: 'Almost None',
	   	message: 'Buy by end of today'
   },
   {
       item_name: 'Milk',
       pull_class: 'widget-icon blue pull-left',
       widget_class: 'fa fa-shopping-cart',
       percent_left: '8.5',
       label_class: 'label label-warning',
       color_code: {
       	color: '#F0AD4E'
       },
       weight: null,
       status: 'Low',
       message: 'Buy within the next 3 days'
   },
   {
       item_name: 'Oranges',
       pull_class: 'widget-icon blue pull-left',
       widget_class: 'fa fa-shopping-cart',
       percent_left: '16.8',
       label_class: 'label label-warning',
       color_code: {
       	color: '#F0AD4E'
       },
       weight: null,
       status: 'Low',
       message: 'Buy within the next 2 days'
   },
   {
       item_name: 'Soft Drinks',
       pull_class: 'widget-icon green pull-left',
       widget_class: 'fa fa-glass',
       percent_left: '56.8',
       label_class: 'label label-info',
       color_code: {
       	color: '#428BCA'
       },
       weight: null,
       status: 'About Half',
       message: 'Buy in a week'
   },
   {
       item_name: 'Detergent',
       pull_class: 'widget-icon orange pull-left',
       widget_class: 'fa fa-tint',
       percent_left: '91.2',
       label_class: 'label label-success',
       color_code: {
       	color: '#5CB85C'
       },
       weight: null,
       status: 'Plenty',
       message: 'Buy in a couple of months'
   },
]);
	}).service('httpHandler', ['$http', function($http){
		this.request = function(UrlToQuery, Data) {
			return $http({
				method: "post",
				url: UrlToQuery,
				data: Data,
				headers: { 'Content-Type': 'application/json;charset=utf-8' }
			});
		}
	}]).factory('indexFactory', ['httpHandler', 'getUserItems', 'getItemByUPC', function(httpHandler, getUserItems, getItemByUPC){
		return {
			UserItems: function() {
				return httpHandler.request(getUserItems, {});
			},
			UPCDetails: function(upc) {
				return httpHandler.request(getItemByUPC, {
					upc: upc
				});
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
    }).controller('controller', ['$scope', 'indexFactory', 'MessagesSet', 'Items', '$interval', function($scope, indexFactory, MessagesSet, Items, $interval){
    	$scope.data = {};
    	$scope.data.messages = MessagesSet;
		$scope.toggle = true;
		$scope.data.items = Items;
		
		$scope.toggleSidebar = function() {
			/*
			Had to simplify a lot of routing
			 */
			$scope.toggle = !$scope.toggle;
		}

		// $scope.getUserItems = function() {
		// 	indexFactory.UserItems().then(function(successResponse) {
		// 		$scope.user = {
		// 			items: successResponse.data
		// 		};
		// 	}, function(errorResponse) {
		// 		console.log(errorResponse);
		// 	})
		// }
		// $scope.getUserItems();

		function getUserItems() {
			console.log('querried');
			indexFactory.UserItems().then(function(successResponse) {
				console.log(successResponse);
				//First we need to get all the unique items
				var objectArray = {};
				for (var i = 0; i < successResponse.data.length; i++) {
					objectArray[successResponse.data[i].upc] = '';
				}
				console.log(objectArray);
				var objectsToAdd = [];

				function inItems(upc_id) {
					for (var i = 0; i < $scope.data.items.length; i++) {
						if ($scope.data.items[i].upc == upc_id) {
							return true;
						}
					}
					return false;
				}

				angular.forEach(objectArray, function(value, key) {
					if (!inItems(key)) {
						this.push(key);
					}
				}, objectsToAdd);

				console.log(objectsToAdd);

				for (var i = 0; i < objectsToAdd.length; i++) {
					console.log(objectsToAdd[i]);
					indexFactory.UPCDetails(objectsToAdd[i]).then(function(successResponse) {
						console.log(successResponse);
						$scope.data.items.push({
							upc: successResponse.data.upc,
							item_name: successResponse.data.item_name,
							percent_left: 100,
							color_code:{
								color: '#5CB85C'
							},
							widget_class: 'fa fa-leaf',
							pull_class: 'widget-icon purple pull-left',
							status: 'Plenty',
							label_class: 'label label-success'
						});
						//$scope.data.dataset[0][$scope.data.dataset[0].length - 1] += 5;
					}, function(errorResponse) {
						console.log(errorResponse);
					})
				}
			}, function(errorResponse) {
				console.log(errorResponse);
			});
		}
		var promise = $interval(getUserItems, 3000);

		$scope.close = function(messageID) {
			for (var i = 0; i < $scope.data.messages.length; i++) {
				if ($scope.data.messages[i].message_id == messageID) {
					$scope.data.messages.splice(i, 1);
				}
			}
		}
	}]);