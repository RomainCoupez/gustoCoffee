<template>
	<b-container fluid class="py-4">
		<div v-if="isLoading" class="row col">
		    <loader></loader>
		</div>
		<div v-else-if="hasError" class="row col">
		    <error-message :error="error"></error-message>
		</div>
		<div v-else-if="!hasRooms" class="row col">
		    This room is not found !
		</div>
		<b-row v-else>
			<b-col cols="12">
				<h2>
					<b-badge v-if="room.privatized" variant="dark">
						Bureau privatisé
					</b-badge>
					<b-badge v-else variant="dark">
						A partager
					</b-badge>
					{{room.name}}
				</h2>
			</b-col>
			<b-col cols="12" md="7" class="mb-4">
				<img src="../../img/homepage.jpeg" class="rounded mb-3" 
				style="max-height: 65vh;width: 100%;object-fit: cover;">
				<h4>Description</h4>
				<p class="text-justify">{{room.description}}</p>
			</b-col>
			<b-col cols=12 md="5" class="mb-4">
				<b-form>
					<b-card no-body>
						<b-card-header>
							Réservation 
							<b-badge v-if="room.privatized" variant="secondary" class="float-right">
								{{room.price}}€ par heure
							</b-badge>
							<b-badge v-else variant="secondary" class="float-right">
								{{room.price}}€ par heure et par place
							</b-badge>
						</b-card-header>
						<b-card-body>
							<b-form-group id="input-group-1" label="Email address:" label-for="input-1" description="We'll never share your email with anyone else.">
					        	<b-form-input id="input-1" v-model="form.start" type="email"
					          	required placeholder="Enter email"
					        	></b-form-input>
					      	</b-form-group>
					      	<b-form-group id="input-group-1" label="Email address:" label-for="input-1" description="We'll never share your email with anyone else.">
					        	<b-form-input id="input-1" v-model="form.end" type="email"
					          	required placeholder="Enter email"
					        	></b-form-input>
					      	</b-form-group>
					      	<b-form-group v-if="room.privatized == false" id="input-group-1" label="Email address:" label-for="input-1" description="We'll never share your email with anyone else.">
					        	<b-form-input id="input-1" v-model="form.places" type="email"
					          	required placeholder="Enter email"
					        	></b-form-input>
					      	</b-form-group>
						</b-card-body>
						<b-card-footer>
							<div class="mb-3">
								Total TTC
								<span class="float-right">{{bill}}€</span>
							</div>
							<div class="text-center">
								<b-button type="submit" variant="warning">Confirmer</b-button>
							</div>
						</b-card-footer>
					</b-card>
				</b-form>
			</b-col>
		</b-row>
	</b-container>
</template>

<script>
import Loader from './Loader';
import ErrorMessage from '../components/ErrorMessage';

export default {
  name: 'Room',
  components: {
      Loader,
      ErrorMessage,
  },
  data() {
  	return {
  		form: {
  			start: null,
  			end: null,
  			places: 0
  		},
  		bill: 0
  	}
  },
  created () {
      this.$store.dispatch('room/fetchRoom',this.$route.params.name
      	.replace(/-([a-z])/g, function (g) { return ' '+g[1].toUpperCase(); }))
  },
  computed: {
      isLoading () {
          return this.$store.getters['room/isLoading']
      },
      hasError () {
          return this.$store.getters['room/hasError']
      },
      error () {
          return this.$store.getters['room/error']
      },
      hasRooms () {
          return this.$store.getters['room/hasRooms']
      },
      room () {
      	  return this.$store.getters['room/room']
      }
  },
};
</script>