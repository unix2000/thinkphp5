//vue2.0.1练习
//注册
Vue.component('side-menu', {
	template: '<div>菜单组件!</div>'
})
Vue.component('side-left', {
	template: '<div>左边组件!</div>'
})
Vue.component('side-right', {
	template: '<div>右边组件!</div>'
})
Vue.component('my-component', {
	template: '<div>一个自定义组件!</div>'
})
Vue.component('todo-item', {
	props: ['t2'],
	template: '<li>{{ t2.text }}</li>'
})

//子组件练习
var vm = new Vue({
	el : '#app',
	data : {
		message : 'liner.xie',
		fullname: '',
		firstname : '',
		lastname : '',
		checkedNames: [],
		picked : '',
		isActive: true,
			hasOne: true,
		todos: [
	      { text: '===中文Learn JavaScript===' },
	      { text: '===中文Learn Vue===' },
	      { text: '===中文Build something awesome===' }
	    ]
	},
	filters: {
		cap : function(val){
			if (!val) return ''
				value = val.toString()
				return value.charAt(0).toUpperCase() + value.slice(1)
		}
	},
	// watch : {
	// 	firstname : function(val) {
	// 		this.fullname = val + ' ' + this.lastname
	// 	},
	// 	lastname : function(val){
	// 		this.fullname = val + ' ' + this.firstname 
	// 	}
	// },

	computed: {
		fullname : function(){
			return this.firstname + ' ' + this.lastname
		}
	},

	// computed : {
	// 	fullname : {
	// 		get : function(){
	// 			return this.firstname + ' ' + this.lastname
	// 		},
	// 		set : function(newValue){
	// 			var names = newValue.split(' ')
 //   					this.firstname = names[0]
 //   					this.lastname = names[names.length - 1]
	// 		}
	// 	}
	// },
	methods : {
		doOne: function(event){
			alert('doOne click')
			alert(event.target.tagName)
		},
		say : function(a){
			alert(a)
		},
		warn: function (message, event) {
			// now we have access to the native event
			if (event) event.preventDefault()
		    alert(message)
		}
	}
});		