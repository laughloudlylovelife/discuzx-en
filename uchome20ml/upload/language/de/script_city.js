/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: script_city.js 11751 2009-03-23 10:20:50Z zhengqingpeng $
*/

function setcity(provinceid, cityid) {
	var province = document.getElementById(provinceid).value;
    switch (province) {
        case "Deutschland" :
            var cityOptions = new Array(
            "Berlin", "Berlin",
            "Bremen", "Bremen",
            "Dresden", "Dresden",
            "Düsseldorf", "Düsseldorf",
            "Erfurt", "Erfurt",
            "Hamburg", "Hamburg",
            "Hannover", "Hannover",
            "Kiel", "Kiel",
            "Magdeburg", "Magdeburg",
            "Mainz", "Mainz",
            "München", "München",
            "Potsdam", "Potsdam",
            "Saarbrücken", "Saarbrücken",
            "Schwerin", "Schwerin",
            "Stuttgart", "Stuttgart",
            "Wiesbaden", "Wiesbaden",
            "Köln", "Köln",
            "Frankfurt", "Frankfurt");
             break;
        case "Österreich" :
            var cityOptions = new Array(
            "Wien", "Wien",
            "Graz", "Graz",
            "Innsbruck", "Innsbruck",
            "Salzburg", "Salzburg",
            "Bregenz-Dornbirn", "Bregenz-Dornbirn",
            "Klagenfurt", "Klagenfurt",
            "Wels", "Wels",
            "Wiener Neustadt", "Wiener Neustadt",
            "Villach", "Villach",
            "Sankt Pölten", "Sankt Pölten",
            "Feldkirch", "Feldkirch",
            "Steyr", "Steyr",
            "Linz", "Linz");
            break;
        case "Schweiz" :
            var cityOptions = new Array(
            "Aarau", "Aarau",
            "Appenzell", "Appenzell",
            "Herisau", "Herisau",
            "Liestal", "Liestal",
            "Basel", "Basel",
            "Bern", "Bern",
            "Fribourg","Fribourg",
            "Genève", "Genève",
            "Glarus", "Glarus",
            "Chur", "Chur",
            "Delémont", "Delémont",
            "Luzern", "Luzern",
            "Neuenburg", "Neuenburg",
            "Stans", "Stans",
            "Sarnen", "Sarnen",
            "Sankt Gallen", "Sankt Gallen",
            "Schaffhausen", "Schaffhausen",
            "Schwyz", "Schwyz",
            "Solothurn", "Solothurn",
            "Frauenfeld", "Frauenfeld",
            "Bellinzona", "Bellinzona",
            "Altdorf", "Altdorf",
            "Sitten", "Sitten",
            "Lausanne", "Lausanne",
            "Zug", "Zug",
            "Zürich", "Zürich");
            break;
        case "Italien" :
            var cityOptions = new Array(
            "Ancona", "Ancona",
            "Aosta", "Aosta",
            "Bari", "Bari",
            "Bologna", "Bologna",
            "Bozen", "Bozen",
            "Cagliari", "Cagliari",
            "Campobasso", "Campobasso",
            "Catanzaro", "Catanzaro",
            "Florenz", "Florenz",
            "Genua", "Genua",
            "L’Aquila", "L’Aquila",
            "Mailand", "Mailand",
            "Neapel", "Neapel",
            "Palermo", "Palermo",
            "Perugia", "Perugia",
            "Potenza", "Potenza",
            "Rom", "Rom",
            "Trient", "Trient",
            "Triest", "Triest",
            "Turin", "Turin",
            "Venedig", "Venedig",
            "Pisa", "Pisa");
             break;
        case "Slowenien" :
            var cityOptions = new Array(
            "Ljubljana", "Ljubljana",
            "Maribor", "Maribor",
            "Kranj", "Kranj",
            "Celje", "Celje",
            "Koper", "Koper",
            "Novo mesto", "Novo mesto",
            "Nova Gorica", "Nova Gorica",
            "Velenje", "Velenje",
            "Ptuj", "Ptuj",
            "Murska Sobota", "Murska Sobota");
            break;
        case "Tschechien" :
            var cityOptions = new Array(
            "Prag", "Prag",
            "Brünn", "Brünn",
            "Ostrau", "Ostrau",
            "Pilsen", "Pilsen",
            "Olmütz", "Olmütz",
            "Reichenberg", "Reichenberg",
            "Budweis", "Budweis",
            "Pardubitz", "Pardubitz",
            "Zlin", "Zlin",
            "Kladno", "Kladno",
            "Brüx", "Brüx",
            "Karwin", "Karwin",
            "Troppau", "Troppau",
            "Karlsbad", "Karlsbad",
            "Tetschen", "Tetschen",
            "Teplitz", "Teplitz",
            "Komotau", "Komotau",
            "Proßnitz", "Proßnitz",
            "Gablonz", "Gablonz",
            "Jungbunzlau", "Jungbunzlau");
            break;
        case "Slowakei" :
            var cityOptions = new Array(
            "Bratislava", "Bratislava",
            "Košice", "Košice",
            "Prešov", "Prešov",
            "Nitra", "Nitra",
            "Žilina", "Žilina",
            "Banská Bystrica", "Banská Bystrica",
            "Trnava", "Trnava",
            "Martin", "Martin",
            "Trenčín", "Trenčín",
            "Poprad", "Poprad",
            "Prievidza", "Prievidza");
            break;
        case "Niederlande" :
            var cityOptions = new Array(
            "Amsterdam", "Amsterdam",
            "Haarlem", "Haarlem",
            "Eindhoven", "Eindhoven",
            "Rotterdam", "Rotterdam",
            "Den Haag", "Den Haag",
            "Utrecht", "Utrecht",
            "Maastricht", "Maastricht",
            "Assen", "Assen");
            break;
        case "Ungarn" :
            var cityOptions = new Array(
            "Budapest", "Budapest",
			"Györ", "Györ",
			"Miskolc", "Miskolc",
			"Debrecen", "Debrecen",
			"Sopron", "Sopron",
			"Szeged", "Szeged");
            break;
        default:
            var cityOptions = new Array("Stadt auswählen", "");
            break;
    }
	
	var cityObject = document.getElementById(cityid);
	cityObject.options.length = 0;
	cityObject.options[0] = new Option("Stadt auswählen", "");
	var j = 0;
	for(var i = 0; i < cityOptions.length/2; i++) {
		j = i + 1;
	    cityObject.options[j] = new Option(cityOptions[i*2],cityOptions[i*2+1]);
	}
}

function initprovcity(provinceid, province) {
	var provObject = document.getElementById(provinceid);
    for(var i = 0; i < provObject.options.length; i++) {
        if (provObject.options[i].value == province) {
        	provObject.selectedIndex = i;
			break;
        }
    }
    //setcity(provinceid, cityid);
}

function showprovince(provinceid, cityid, province, boxid) {
	var provinces = new Array(
		"Deutschland", "Österreich", "Schweiz", "Italien", "Slowenien", "Tschechien", "Slowakei", "Niederlande", "Ungarn"
	);
	
	var selObj = document.createElement("select");
	selObj.name = provinceid;
	selObj.id = provinceid;
	selObj.onchange = function() {
		setcity(provinceid, cityid);
	};
	$(boxid).appendChild(selObj);
	
	selObj.options[0] = new Option("Land auswählen", "");
	var j = 0;
	for(var i = 0; i < provinces.length; i++) {
		j = i + 1;
		selObj.options[j] = new Option(provinces[i], provinces[i]);
	}
	
	initprovcity(provinceid, province);

}

function showcity(cityid, city, provinceid, boxid) {
	if(isUndefined(provinceid)) provinceid = '';
	
	var selObj = document.createElement("select");
	selObj.name = cityid;
	selObj.id = cityid;
	$(boxid).appendChild(selObj);
	if(city == "") {
		selObj.options[0] = new Option("Stadt auswählen", "");
	} else {
		selObj.options[0] = new Option(city, city);
	}

	if(provinceid != '') {
		setcity(provinceid, cityid);
		initprovcity(cityid, city);
	}
}
