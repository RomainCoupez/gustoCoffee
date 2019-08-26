<template>
	<main>
    	<b-container fluid class="w-100 bg-warning d-flex align-items-center justify-content-center" style="background-image:url('../../img/homepage.jpeg');height: 50vh;max-height:400px;object-fit: cover;">
			<h1 class="text-white">Actualités</h1>
    	</b-container>
	    <b-container class="my-5">
	 <!--        <div class="row col" v-if="canCreateNews">
	            <form>
	                <div class="form-row">
	                    <div class="col-8">
	                        <input v-model="message" type="text" class="form-control">
	                    </div>
	                    <div class="col-4">
	                        <button @click="createNews()" :disabled="message.length === 0 || isLoading" type="button" class="btn btn-primary">Create</button>
	                    </div>
	                </div>
	            </form>
	        </div> -->

	        <div v-if="isLoading" class="row col">
	            <loader></loader>
	        </div>
	        <div v-else-if="hasError" class="row col">
	            <error-message :error="error"></error-message>
	        </div>
	        <div v-else-if="!hasNewss" class="row col">
	            No newss!
	        </div>
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
            canCreateNews () {
                return this.$store.getters['security/hasRole']('ROLE_FOO');
            }
        },
        methods: {
            createNews () {
                this.$store.dispatch('news/createNews', this.$data.message)
                    .then(() => this.$data.message = '')
            },
        },
    }
</script>