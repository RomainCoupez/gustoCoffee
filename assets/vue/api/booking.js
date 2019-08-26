import axios from 'axios';

export default {
    create (message) {
        return axios.post(
            '/api/booking/create',
            {
                message: message,
            }
        );
    },
    getAll () {
        return axios.get('/api/bookings');
    },
}