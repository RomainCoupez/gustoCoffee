import Vue from 'vue';
import Vuex from 'vuex';
import SecurityModule from './security';
import BookingModule from './booking';
import NewsModule from './news';
import RoomModule from './room';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        security: SecurityModule,
        booking: BookingModule,
        news: NewsModule,
        room: RoomModule,
    }
});