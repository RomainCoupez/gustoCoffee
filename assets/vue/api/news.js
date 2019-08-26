import axios from 'axios';

export default {
    create (formData) {
        console.log(formData)
        return axios.post(
            '/api/news/create',
            formData
        );
    },
    getAll () {
        return axios.get('/api/newss');
    },
}