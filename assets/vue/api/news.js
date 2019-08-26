import axios from 'axios';

export default {
    create (message) {
        return axios.post(
            '/api/news/create',
            {
                message: message,
            }
        );
    },
    getAll () {
        return axios.get('/api/newss');
    },
}