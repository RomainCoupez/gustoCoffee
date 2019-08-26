import NewsApi from '../api/news';

export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        newss: [],
    },
    getters: {
        isLoading (state) {
            return state.isLoading;
        },
        hasError (state) {
            return state.error !== null;
        },
        error (state) {
            return state.error;
        },
        hasNewss (state) {
            return state.newss.length > 0;
        },
        newss (state) {
            return state.newss;
        },
    },
    mutations: {
        ['CREATING_NEWS'](state) {
            state.isLoading = true;
            state.error = null;
        },
        ['CREATING_NEWS_SUCCESS'](state, news) {
            state.isLoading = false;
            state.error = null;
            state.newss.unshift(news);
        },
        ['CREATING_NEWS_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.newss = [];
        },
        ['FETCHING_NEWSS'](state) {
            state.isLoading = true;
            state.error = null;
            state.newss = [];
        },
        ['FETCHING_NEWSS_SUCCESS'](state, newss) {
            state.isLoading = false;
            state.error = null;
            state.newss = newss;
        },
        ['FETCHING_NEWSS_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.newss = [];
        },
    },
    actions: {
        createNews ({commit}, message) {
            commit('CREATING_NEWS');
            return NewsApi.create(message)
                .then(res => commit('CREATING_NEWS_SUCCESS', res.data))
                .catch(err => commit('CREATING_NEWS_ERROR', err));
        },
        fetchNewss ({commit}) {
            commit('FETCHING_NEWSS');
            return NewsApi.getAll()
                .then(res => commit('FETCHING_NEWSS_SUCCESS', res.data))
                .catch(err => commit('FETCHING_NEWSS_ERROR', err));
        },
    },
}