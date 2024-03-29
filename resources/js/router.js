import VueRouter from 'vue-router';
import HomePage from './Components/HomePage';
import HomeBalans from './Components/HomeBalans';
import HomeDaxod from './Components/HomeDaxod';
import HomeRasxod from './Components/HomeRasxod';
import HomeOtchet from './Components/HomeOtchet';
import HomeTools from './Components/HomeTools';

export default new VueRouter({
	routes : [
	{
		path : '/home',
		name: 'home',
		component : HomePage,
		children: [
		 {path: 'daxod',
          name: 'daxod',
          component: HomeDaxod},
         {path: 'rasxod',
         name: 'rasxod',
          component: HomeRasxod},
          {path: 'balans',
          name: 'balans',
          component: HomeBalans},
          {path: 'tools',
          name: 'tools',
          component: HomeTools}



          ]
	
	},
    




	],
	mode: 'history'
	
})