import axios from 'axios';

export default {
    create (formData) {
        return axios.post(
            '/api/booking/create',
            formData
        );
    },
    getAll () {
        return axios.get('/api/bookings');
    },
}