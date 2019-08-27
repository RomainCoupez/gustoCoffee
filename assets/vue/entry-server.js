import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import moment from 'moment'
import BootstrapVue from 'bootstrap-vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import '../css/app.css'
import renderToString from "vue-server-renderer/basic";

library.add(fas,fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.filter('formatDate',function(value){
	if(value)
		return moment(String(value)).format('DD/MM/YYYY')
})
Vue.use(BootstrapVue)
Vue.config.productionTip = false

renderToString(function(){
	new Vue({
	    template: '<App/>',
	    components: { App },
	    router,
	    store
	})
}),(err, res) => {
  	print(res);
}
