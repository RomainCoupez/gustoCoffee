import RoomApi from '../api/room';

export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        rooms: [],
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
        hasRooms (state) {
            return state.rooms.length > 0;
        },
        test (state) {
            return state.rooms != null;
        },
        rooms (state) {
            return state.rooms;
        },
        sharedRooms (state) {
            return state.rooms.filter(function(r){
                return r.privatized == false
            })
        },
        privatizedRooms (state) {
            return state.rooms.filter(function(r){
                return r.privatized
            })
        },
        room (state) {
            return state.rooms[0];
        }
    },
    mutations: {
        ['CREATING_ROOM'](state) {
            state.isLoading = true;
            state.error = null;
        },
        ['CREATING_ROOM_SUCCESS'](state, room) {
            state.isLoading = false;
            state.error = null;
            state.rooms.unshift(room);
        },
        ['CREATING_ROOM_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.rooms = [];
        },
        ['FETCHING_ROOMS'](state) {
            state.isLoading = true;
            state.error = null;
            state.rooms = [];
        },
        ['FETCHING_ROOMS_SUCCESS'](state, rooms) {
            state.isLoading = false;
            state.error = null;
            state.rooms = rooms;
        },
        ['FETCHING_ROOMS_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.rooms = [];
        },
    },
    actions: {
        createRoom ({commit}, message) {
            commit('CREATING_ROOM');
            return RoomApi.create(message)
            .then(res => commit('CREATING_ROOM_SUCCESS', res.data))
            .catch(err => commit('CREATING_ROOM_ERROR', err));
        },
        fetchRooms ({commit}) {
            commit('FETCHING_ROOMS');
            return RoomApi.getAll()
            .then(res => commit('FETCHING_ROOMS_SUCCESS', res.data))
            .catch(err => commit('FETCHING_ROOMS_ERROR', err));
        },
        fetchRoom ({commit}, name){
            commit('FETCHING_ROOMS')
            return RoomApi.getByName(name)
            .then(res => commit('FETCHING_ROOMS_SUCCESS', res.data))
            .catch(err => commit('FETCHING_ROOMS_ERROR', err));
        }
    },
}