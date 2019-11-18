import VueRouter from 'vue-router';
import HomePage from './Components/HomePage';

export default new VueRouter({
	routes : [
	{
		path : '/home',
		component : HomePage
	
	}
	],
	mode: 'history'
	
})