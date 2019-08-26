<template>
	<b-col cols="12" md="6" lg="4" class="mb-3"> 
		<b-card no-body img-top class="shadow-sm"
		img-src="https://www.roberthalf.com.au/sites/roberthalf.com.au/files/styles/full_width_content_image_1x_small_480/public/2018-01/shutterstock_547750285%20%28compressed%29.jpg?itok=ZO4857Qu">
			<b-card-body>
				<b-card-title>{{$attrs.name}}</b-card-title>
				<div v-if="$attrs.privatized">
					<span class="badge p-1 mb-1 badge-dark">Privatisé</span>
					<span class="badge p-1 mb-1 badge-warning">{{$attrs.places}} personnes</span>
					<span class="badge p-1 mb-1 badge-secondary">{{$attrs.price}}€/H</span>
				</div>
				<div v-else>
					<span class="badge p-1 mb-1 badge-dark">Partagé</span>
					<span class="badge p-1 mb-1 badge-warning">{{$attrs.places}} places</span>
					<span class="badge p-1 mb-1 badge-secondary">{{$attrs.price}}€/place/H</span>
				</div>
			</b-card-body>
			<b-card-footer class="text-center">
				<b-button :to="{path: '/rooms/' + kCaseRoomName}" variant="warning">Infos & Réservations</b-button>
			</b-card-footer>
		</b-card>
	</b-col>
</template>

<script>
    export default {
        name: 'room',
        computed: {
        	kCaseRoomName() {
        		return this.$attrs.name.replace(/([a-z])([A-Z])/g, "$1-$2").replace(/\s+/g, '-').toLowerCase();
        	}
        }
    }
</script>