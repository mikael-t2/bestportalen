$( document ).ready(function() {
	var sightPref = "/best"
	$('#cpu-slider').change(function() {
        $('#cpu-output').html('<b>CPU: ' + $(this).val() + ' core</b>');
    });
	$('#minne-slider').change(function() {
        $('#minne-output').html('<b>Minne: ' + $(this).val() + ' GB</b>');
    });
	
//Omstyrning efter skickat formulär
	$('div.wpcf7-mail-sent-ok').is(function() {
		window.location.assign( sightPref + "/case/" + localStorage.getItem("ordernr") );
        //window.location.href = "/case/" + localStorage.getItem("ordernr");
    });

	
//Knappar
	$( "#skapaBestKnappen" ).click(function() {
		var ordernr=$("#nyorder").val();
		localStorage.setItem("ordernr", ordernr);
	});
	$( "#skapaNyBest" ).click(function() {
		var ordernr=$("#nyorder").val();
		window.location.assign( sightPref + "/skapa-bestallning/" );
		//window.location.href = "/best/skapa-bestallning/";
	});
	
//Hämta info från sida
	$('#setOrdernummer').is(function() {
		localStorage.setItem("ordernummer", $("#setOrdernummer").text());
    });
	$('#setKund').is(function() {
		localStorage.setItem("kundnamn", $("#setKund").text());
    });
	$('#setParent').is(function() {
		localStorage.setItem("parent", $("#setParent").text());
    });
	$('#json-app').is(function() {
		localStorage.setItem("appar", $("#json-app").text());
    });
	

//lägg in värde i form-fält via js
	$( "#getOrder" ).is(function() {
		$("#getOrder").val(localStorage.getItem("ordernummer"));
	});
	$( "#getParent" ).is(function() {
		$("#getParent").val(localStorage.getItem("parent"));
	});
	$( "#getKund" ).is(function() {
		$("#getKund").val(localStorage.getItem("kundnamn"));
	});
	$( "#app" ).is(function() {
		var apparna = JSON.parse(localStorage.getItem("appar"));
		var applista = "<option value=>---</option>";
		var i;
		for (i = 0; i < apparna.length; ++i) {
			applista += "<option value=\"" + apparna[i] + "\">" + apparna[i] + "</option>";
		}
		$("#app").html(applista);
	});


	
	//Lägg in värde i frontend	
	$( ".visaFokus" ).is(function() {
		$(".visaFokus").text(localStorage.getItem("ordernummer"));
	});
	$( ".visaKund" ).is(function() {
		$(".visaKund").text(localStorage.getItem("kundnamn"));
	});
	$( ".visaId" ).is(function() {
		$(".visaId").text(localStorage.getItem("parent"));
	});

});

