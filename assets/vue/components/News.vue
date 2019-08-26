<template>
	<b-row class="py-4">
		<b-col cols="12" md="5" lg="4">
			<img class="mw-100" src="../../img/homepage.jpeg">
		</b-col>
		<b-col cols="12" md="7" lg="8">
			<h3 class="mb-0">{{$attrs.title}}</h3>
			<p class="text-muted font-italic">{{$attrs.createdAt|formatDate}}</p>
			<p>{{$attrs.content}}</p>
		</b-col>
	</b-row>
</template>

<script>
    export default {
        name: 'news',
    }
</script>