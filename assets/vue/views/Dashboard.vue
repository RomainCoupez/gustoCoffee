<template>
	<main>
    	<b-container fluid class="py-3 bg-light" style="min-height: calc(100vh - 60px)">
    		<b-row>
    			<b-col cols="2" md="3" xl="2">
    				<b-list-group>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Accueil</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fas','home']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Articles</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3" to="/dashboard/news">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Actualités</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> FAQ</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Recrutement</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Catégories</span>
    					</b-list-group-item>
    					<b-list-group-item class="py-4 px-3">
    						<font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon fixed-width>
    						<span class="d-none d-md-inline"> Utilisateurs</span>
    					</b-list-group-item>
    				</b-list-group>
    			</b-col>
    			<b-col cols="10" md="9" xl="10">
    				<router-view></router-view>
    			</b-col>
    		</b-row>
	    </b-container>
	</main>
</template>

<script>

    export default {
        name: 'dashboard',
    }
</script>