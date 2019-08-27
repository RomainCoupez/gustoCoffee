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
					<span class="d-block d-md-inline">{{room.name}}</span>
				</h2>
			</b-col>
			<b-col cols="12" md="7" class="mb-4">
				<img src="../../img/homepage.jpeg" class="rounded mb-3" 
				style="max-height: 65vh;width: 100%;object-fit: cover;">
				<h4>Description</h4>
				<p class="text-justify">{{room.description}}</p>
			</b-col>
			<b-col cols=12 md="5" class="mb-4">
				<b-form v-on:submit.prevent="onSubmit">
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
							<b-form-group label="Jour :" description="Choisir un jour">
					        	<datetime v-model="day" type="date" input-class="form-control">
					        	</datetime>
					      	</b-form-group>
					      	<b-form-group label="De :" description="Choisir une heure de début">
					        	<datetime :min-datetime="minTime" :max-datetime="maxTime" 
					        	:minute-step="60" v-model="form.startDate" type="time" input-class="form-control"></datetime>
					      	</b-form-group>
					      	<b-form-group label="A :" description="Choisir une heure de fin">
					        	<datetime :min-datetime="minTime" :max-datetime="maxTime" 
					        	:minute-step="60" v-model="form.endDate" type="time" input-class="form-control"></datetime>
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
								<span class="float-right">
									<strong v-if="bill">{{bill}}€</strong>
									<span v-else>{{bill}}€</span>
								</span>
							</div>
							<div class="text-center">
								<b-button :disabled="isValid" type="submit" variant="warning">Confirmer</b-button>
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
import moment from 'moment'

export default {
  name: 'Room',
  components: {
      Loader,
      ErrorMessage,
  },
  data() {
  	return {
  		disabledDates: [],
  		day: null,
  		form: {
  			room: this.room,
  			startDate: null,
  			endDate: null,
  			places: 0
  		},
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
      },
      minTime () {
      	  return moment(moment().format('YYYYMMDD')+'080000','YYYYMMDDHHmmss').toISOString()
      },
      maxTime() {
      	  return moment(moment().format('YYYYMMDD')+'210000','YYYYMMDDHHmmss').toISOString()
      },
      isValid () {
      	// return this.form.day !== null || this.form.startDate !== null || this.form.endDate !== null
      	return false;
      },
      bill () {
      	let startTime = moment(this.form.startDate,moment.HTML5_FMT.DATETIME_LOCAL_MS)
      	let endTime = moment(this.form.endDate,moment.HTML5_FMT.DATETIME_LOCAL_MS)
      	let price = endTime.diff(startTime, 'hours') * this.room.price
      	return isNaN(price) ? 0 : price 
      }
  },
  methods: {
  	onSubmit () {
  		let startDate = moment(this.day.split('T')[0] + 'T' + this.form.startDate.split('T')[1], moment.HTML5_FMT.DATETIME_LOCAL_MS)
		let endDate = moment(this.day.split('T')[0] + 'T' + this.form.endDate.split('T')[1], moment.HTML5_FMT.DATETIME_LOCAL_MS)
  		this.$store.dispatch('booking/createBooking', {
  			startDate: startDate.format('YYYY-MM-DD HH:mm:ss'),
  			endDate: endDate.format('YYYY-MM-DD HH:mm:ss'),
  			room: this.room.id
  		}).then(() => this.form = {

  		})
  	}
  }
};
</script>