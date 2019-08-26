<template>
    <main>
    	<b-container fluid class="w-100 bg-warning d-flex align-items-center justify-content-center" style="background-image:url('../../img/homepage.jpeg');height: 50vh;max-height:400px;object-fit: cover;">
			<h1 class="text-white">Notre concept</h1>
    	</b-container>
    	<b-container>
    		<b-row class="py-5 justify-content-center align-items-center">
    			<b-col cols="12" md="7" class="py-2">
    				<h4 class="text-warning">Comme à la maison</h4>
    				<p class="text-justify">Bienvenue chez Gusto-Coffee ! Nos thé ainsi que nos cafés sont inclus et à volonté ! A la fin de votre session de travail, vous ne payez que le temps passé sur place. Tout est réuni pour vous sentir comme à la maison, autour de votre boisson préférée. Vous êtes les bienvenus pour travailler, étudier, organiser un rendez-vous, accéder à internet, et tout simplement prendre votre temps ! Nos espaces de travail sont accessibles sans réservation.</p>
    			</b-col>
    			<b-col cols="12" md="5" class="py-2 text-center">
    				<img src="../../img/food1.jpeg" class="mw-100">
    			</b-col>
    		</b-row>
    		<b-row class="py-5 flex-row-reverse justify-content-center align-items-center">
    			<b-col cols="12" md="7" class="py-2">
    				<h4 class="text-warning">L'espace de travail</h4>
    				<p class="text-justify">Connectez-vous à internet haut débit grâce à nos solutions wifi sur mesure. Vous trouverez des prises électriques à côté de chaque chaise pour pouvoir recharger facilement vos outils de travail. Vous pouvez également imprimer et numériser vos documents en couleur ou en noir et blanc. Vous avez la possibilité de réserver un espace privé pour vous et votre équipe, afin réaliser vos conférences téléphoniques et vos réunions de manière efficace.</p>
    			</b-col>
    			<b-col cols="12" md="5" class="py-2 text-center">
    				<img src="../../img/presentation.jpeg" class="mw-100">
    			</b-col>
    		</b-row>
    	</b-container>
    	<b-container fluid class="bg-light py-5">
    	    <b-row class="justify-content-center row-eq-height">
    	    	<b-col cols="12" class="text-center">
    	    		<h3 class="mb-4">Notre offre</h3>
    	    	</b-col>
    	        <b-col cols="12" lg="6" class="my-3">
    	            <b-card no-body img-src="../../img/espaces-travail.jpeg" img-top tag="article" class=" shadow-sm h-100 mx-auto" style="max-width: 500px">
    	            	<b-card-body>
	    	            	<b-card-title class="text-center text-warning">
	    	            		Espace de travail partagé
	    	            	</b-card-title>
	    	                <b-card-text class="text-justify">
	    	                	<p>Optez pour la flexibilité d'un poste de travail non attribué en open space ou le confort d'un poste de travail attribué dans un bureau partagé. Vous bénéficierez ainsi de services haut de gamme ainsi que d'un espace garanti pour vous mettre au travail dès votre arrivée.</p>
	    	                	<strong>Idéal pour :</strong>
	    	                	<ul>
	    	                		<li>Indépendants et consultants</li>
	    	                		<li>Télétravailleurs</li>
	    	                	</ul>
	    	                </b-card-text>
    	            	</b-card-body>
	                	<b-card-footer>
	                		<b-button variant="warning">Voir notre open-space</b-button>
	                	</b-card-footer>
    	            </b-card>
    	        </b-col>
    	        <b-col cols="12" lg="6" class="my-3">
    	            <b-card no-body img-src="../../img/espaces-bureaux.jpeg" img-top tag="article" class=" shadow-sm h-100 mx-auto" style="max-width: 500px">
    	            	<b-card-body>
	    	            	<b-card-title class="text-center text-warning">
	    	            		Bureau privé
	    	            	</b-card-title>
	    	                <b-card-text class="text-justify">
	    	                	<p>Des bureaux fermés et verrouillables qui peuvent accueillir des équipes de toutes tailles. Prêts à l'emploi, aménagés avec des bureaux, des chaises et des armoires de classement.</p>
	    	                	<strong>Idéal pour :</strong>
	    	                	<ul>
	    	                		<li>Start-up</li>
	    	                		<li>Petites entreprises</li>
	    	                	</ul>
	    	                </b-card-text>
	    	            </b-card-body>
	    	           	<b-card-footer>
	    	           		<b-button variant="warning">Voir nos bureaux privés</b-button>
	    	           	</b-card-footer>
    	            </b-card>
    	        </b-col>
    	    </b-row>
    	</b-container>
    </main>
</template>

<script>
    export default {
        name: 'who-are-we'
    }
</script>