ymaps.ready(function () {

	docWidth = document.documentElement.clientWidth;
	console.log(docWidth);

	var myKord;
	if(docWidth <= 768){
		myKord = 55.987131;
	} else if(docWidth <= 1440 && docWidth > 1368) {
		myKord = 56.021569;
	} else if(docWidth <= 1024 && docWidth > 768) {
		myKord = 56.022069;
	} else {
		myKord = 56.052069;
	}
            var myMap = new ymaps.Map("yaMap", {
                    center: [54.736921, myKord],
                    zoom: 14
                }),
                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    hintContent: '',
                    balloonContent: '',
                }, {

                    iconLayout: 'default#image',

                    iconImageHref: '/sites/all/themes/photosok/img/sok-map.svg',

                    iconImageSize: [80, 113],

                    iconImageOffset: [-23, -82]
                });

            if(docWidth < 1367 && docWidth > 1280){
            	myPlacemark.geometry.setCoordinates([54.739521, 55.990731]);
            } else if(docWidth <= 1280 && docWidth > 1024){
            	myPlacemark.geometry.setCoordinates([54.739521, 55.990731]);
            } else if(docWidth <= 1024 && docWidth > 768){
            	myPlacemark.geometry.setCoordinates([54.739521, 55.990731]);
            } else if(docWidth <= 768){
            	myPlacemark.geometry.setCoordinates([54.739021, 55.989231]);
            } else {
            	myPlacemark.geometry.setCoordinates([54.739521, 55.990731]);
            }

            //myMap.behaviors.disable(['scrollZoom']);
            myMap.geoObjects.add(myPlacemark);

            /*myPlacemark.events.add('click', function () {
                $('.contacts_popup').fadeIn();
            })*/
});