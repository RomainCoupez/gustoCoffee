import BookingApi from '../api/booking';

export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        bookings: [],
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
        hasBookings (state) {
            return state.bookings.length > 0;
        },
        bookings (state) {
            return state.bookings;
        },
    },
    mutations: {
        ['CREATING_BOOKING'](state) {
            state.isLoading = true;
            state.error = null;
        },
        ['CREATING_BOOKING_SUCCESS'](state, booking) {
            state.isLoading = false;
            state.error = null;
            state.bookings.unshift(booking);
        },
        ['CREATING_BOOKING_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.bookings = [];
        },
        ['FETCHING_BOOKINGS'](state) {
            state.isLoading = true;
            state.error = null;
            state.bookings = [];
        },
        ['FETCHING_BOOKINGS_SUCCESS'](state, bookings) {
            state.isLoading = false;
            state.error = null;
            state.bookings = bookings;
        },
        ['FETCHING_BOOKINGS_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.bookings = [];
        },
    },
    actions: {
        createBooking ({commit}, message) {
            commit('CREATING_BOOKING');
            return BookingApi.create(message)
                .then(res => commit('CREATING_BOOKING_SUCCESS', res.data))
                .catch(err => commit('CREATING_BOOKING_ERROR', err));
        },
        fetchBookings ({commit}) {
            commit('FETCHING_BOOKINGS');
            return BookingApi.getAll()
                .then(res => commit('FETCHING_BOOKINGS_SUCCESS', res.data))
                .catch(err => commit('FETCHING_BOOKINGS_ERROR', err));
        },
    },
}