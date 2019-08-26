import axios from 'axios';

export default {
    create (message) {
        return axios.post(
            '/api/room/create',
            {
                message: message,
            }
        );
    },
    getAll () {
        return axios.get('/api/rooms');
    },
    getByName (name) {
        return axios.get('/api/rooms/'+name)
    },
}