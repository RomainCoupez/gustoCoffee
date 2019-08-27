import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import moment from 'moment'
import BootstrapVue from 'bootstrap-vue';
import Datetime from 'vue-datetime'
import { Settings } from 'luxon'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
// CSS
import 'vue-datetime/dist/vue-datetime.css'
import '../css/app.css'

library.add(fas,fab)
Settings.defaultLocale = 'fr'
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.filter('formatDate',function(value){
	if(value)
		return moment(String(value)).format('DD/MM/YYYY')
})
Vue.use(Datetime)
Vue.use(BootstrapVue)
Vue.config.productionTip = false

new Vue({
    template: '<App/>',
    components: { App },
    router,
    store
}).$mount('#app');