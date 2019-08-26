<template>
	<main>
    	<b-container fluid class="w-100 bg-warning d-flex align-items-center justify-content-center" style="background-image:url('../../img/homepage.jpeg');height: 50vh;max-height:400px;object-fit: cover;">
			<h1 class="text-white">Actualités</h1>
    	</b-container>
	    <b-container class="my-5">
            <b-row v-if="isLoading || hasError || !hasNewss">
                <b-col>
    	            <loader v-if="isLoading"></loader>
    	            <error-message v-else-if="hasError" :error="error"></error-message>
                    <p v-else>Pas encore d'actualités !</p>
                </b-col>
            </b-row>
			<news v-else v-for="news in newss" v-bind="news"
	       v-bind:key="news.title"></news>
	    </b-container>
	</main>
</template>

<script>
    import Loader from './Loader';
    import News from '../components/News';
    import ErrorMessage from '../components/ErrorMessage';

    export default {
        name: 'newss',
        components: {
            Loader,
            News,
            ErrorMessage,
        },
        data () {
            return {
                message: '',
            };
        },
        created () {
            this.$store.dispatch('news/fetchNewss');
        },
        computed: {
            isLoading () {
                return this.$store.getters['news/isLoading'];
            },
            hasError () {
                return this.$store.getters['news/hasError'];
            },
            error () {
                return this.$store.getters['news/error'];
            },
            hasNewss () {
                return this.$store.getters['news/hasNewss'];
            },
            newss () {
                return this.$store.getters['news/newss'];
            },
        },
    }
</script>