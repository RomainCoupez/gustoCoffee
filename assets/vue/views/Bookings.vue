<template>
    <div>
        <div class="row col">
            <h1>Bookings</h1>
        </div>

        <div class="row col" v-if="canCreateBooking">
            <form>
                <div class="form-row">
                    <div class="col-8">
                        <input v-model="message" type="text" class="form-control">
                    </div>
                    <div class="col-4">
                        <button @click="createBooking()" :disabled="message.length === 0 || isLoading" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>

        <div v-if="isLoading" class="row col">
            <loader></loader>
        </div>
        <div v-else-if="hasError" class="row col">
            <error-message :error="error"></error-message>
        </div>
        <div v-else-if="!hasBookings" class="row col">
            No bookings!
        </div>

        <div v-else v-for="booking in bookings" class="row col">
            <booking :message="booking.message"></booking>
        </div>
    </div>
</template>

<script>
    import Loader from './Loader';
    import Booking from '../components/Booking';
    import ErrorMessage from '../components/ErrorMessage';

    export default {
        name: 'bookings',
        components: {
            Loader,
            Booking,
            ErrorMessage,
        },
        data () {
            return {
                message: '',
            };
        },
        created () {
            this.$store.dispatch('booking/fetchBookings');
        },
        computed: {
            isLoading () {
                return this.$store.getters['booking/isLoading'];
            },
            hasError () {
                return this.$store.getters['booking/hasError'];
            },
            error () {
                return this.$store.getters['booking/error'];
            },
            hasBookings () {
                return this.$store.getters['booking/hasBookings'];
            },
            bookings () {
                return this.$store.getters['booking/bookings'];
            },
            canCreateBooking () {
                return this.$store.getters['security/hasRole']('ROLE_FOO');
            }
        },
        methods: {
            createBooking () {
                this.$store.dispatch('booking/createBooking', this.$data.message)
                    .then(() => this.$data.message = '')
            },
        },
    }
</script>