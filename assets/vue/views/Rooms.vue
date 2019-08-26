<template>
	<main>
    	<b-container class="py-5">
    		<b-row class="pb-5">
    			<b-col>
					<h1>Réserver un espace de Coworking à Paris, Gare du nord</h1>
					<p>Profitez d'espaces de travail agréables en plein coeur de Paris proche des grandes lignes et des métros. L'espace de coworking Gusto-Coffee Paris gare du nord se fera un plaisir de vous accueillir.</p>
					<b-button variant="warning" href="#sharedRooms">A partager</b-button>
					<b-button variant="warning" href="#privatizedRooms">Privatisable</b-button>
				</b-col>
			</b-row>
	 <!--        <div class="row col" v-if="canCreateRoom">
	            <form>
	                <div class="form-row">
	                    <div class="col-8">
	                        <input v-model="message" type="text" class="form-control">
	                    </div>
	                    <div class="col-4">
	                        <button @click="createRoom()" :disabled="message.length === 0 || isLoading" type="button" class="btn btn-primary">Create</button>
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
	        <div v-else-if="!hasRooms" class="row col">
	            No rooms!
	        </div>
	        <div v-else>
	        	<h2>Espaces à partager</h2>
		        <b-row id="sharedRooms">
		        	<room v-for="room in sharedRooms" v-bind="room"
       				v-bind:key="room.title"></room>
		        </b-row>
	        	<h2>Bureaux privatisés</h2>
        	    <b-row id="privatizedRooms">
		        	<room v-for="room in privatizedRooms" v-bind="room"
       				v-bind:key="room.title"></room>
		        </b-row>       
	        </div>
	    </b-container>
	</main>
</template>

<script>
    import Loader from './Loader';
    import Room from '../components/Room';
    import ErrorMessage from '../components/ErrorMessage';

    export default {
        name: 'rooms',
        components: {
            Loader,
            Room,
            ErrorMessage,
        },
        data () {
            return {
                message: '',
            };
        },
        created () {
            this.$store.dispatch('room/fetchRooms');
        },
        computed: {
            isLoading () {
                return this.$store.getters['room/isLoading'];
            },
            hasError () {
                return this.$store.getters['room/hasError'];
            },
            error () {
                return this.$store.getters['room/error'];
            },
            hasRooms () {
                return this.$store.getters['room/hasRooms'];
            },
            canCreateRoom () {
                return this.$store.getters['security/hasRole']('ROLE_FOO');
            },
            sharedRooms () {
            	return this.$store.getters['room/sharedRooms'];
            },
            privatizedRooms () {
            	return this.$store.getters['room/privatizedRooms'];
            },
        },
        methods: {
            createRoom () {
                this.$store.dispatch('room/createRoom', this.$data.message)
                    .then(() => this.$data.message = '')
            },
        },
    }
</script>