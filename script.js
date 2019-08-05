
var vm = new Vue({
	
	el: '.my-div',

	
	data:{
		
		firstNo :0,
		secNo : 0,
		result : 0,

		cources:[
		{ title: 'HTML', instractor: 'Mr. HTML'},
		{ title: 'CSS', instractor: 'Mr. CSS'},
		{ title: 'JavaScript', instractor: 'Mr. JavaScript'},
		{ title: 'PHP', instractor: 'Mr. PHP'},
		{ title: 'Bootstrap', instractor: 'Mr. Bootstrap'},

		],
	},

	
	methods:{
		addition : function(){

			this.result = Number(this.firstNo)+Number(this.secNo);
		},
		subtraction : function(){

			this.result = this.firstNo-this.secNo;
		},
		multification : function(){

			this.result = this.firstNo*this.secNo;
		},
		divition : function(){

			this.result = this.firstNo/this.secNo;
		},
		
	}

});