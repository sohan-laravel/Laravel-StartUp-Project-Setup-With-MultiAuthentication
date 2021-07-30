(function ($) {
    "use strict";
    $(document).ready(function () {
        /*-----------------------------------------------------------------------------------*/
        /* Home page properties pagination
         /*-----------------------------------------------------------------------------------*/
        $('body').on('click', '.rhea_pagination_wrapper a', function (e) {
            e.preventDefault();

            var thisParent = $(this).parents('.rhea_ele_property_ajax_target');
            var id = $(thisParent).attr('id');
            var thisLoader = $(thisParent).find('.rhea_svg_loader');
            var thisInner = $(thisParent).find('.home-properties-section-inner-target');
            var pageNav = $(thisParent).find('.rhea_pagination_wrapper a');
            var thisLink = $(this);

            if (!(thisLink).hasClass('current')) {
                var link = $(this).attr('href');
                thisInner.fadeTo('slow', 0.5);

                thisLoader.slideDown('fast');
                // thisContent.fadeOut('fast', function(){
                thisParent.load(link + ' #' + id + ' .home-properties-section-inner-target', function (response, status, xhr) {
                    if (status == 'success') {
                        thisInner.fadeTo('fast', 1);
                        pageNav.removeClass('current');
                        thisLink.addClass('current');
                        thisLoader.slideUp('fast');
                        if (typeof EREloadNewsSlider != 'undefined' && $.isFunction(EREloadNewsSlider)) {
                            EREloadNewsSlider();
                        }
                        if (typeof setVideoHeightElementor != 'undefined' && $.isFunction(setVideoHeightElementor)) {
                            setVideoHeightElementor();
                        }
                        $('html, body').animate({
                            scrollTop: $('#' + id).offset().top - 32
                        }, 1000);
                    } else {
                        thisInner.fadeTo('fast', 1);
                        thisLoader.slideUp('fast');
                    }
                });
            }
        });


        $('.rhea_price_slider_wrapper').each(function () {

            var thisLabel = $(this).find('.rhea_price_label');
            var thisRange = $(this).find('.rhea_price_range');

            var thisRangeWidth = thisRange.width();

            var thisLabelWidth = thisLabel.width();


            var maxRangeWidth = thisRange.find('.rhea_max_slide').width();
            var minRangeWidth = thisRange.find('.rhea_min_slide').width();

            // thisRange.find('.rhea_min_slide').css('min-width', maxRangeWidth);
            thisRange.css('min-width', thisRangeWidth + (maxRangeWidth - minRangeWidth));
            thisLabel.css('min-width', thisLabelWidth + (maxRangeWidth - minRangeWidth));

        });


        // Agent Dropdown for future updates TODO

        // jQuery('.rhea_agent_list_extra').each(function () {
        //     if (jQuery(this).children('.rhea_agent_list').length > 0) {
        //         jQuery(this).parent().addClass('rhea_expand_parent');
        //     }
        // });

        // jQuery('body').on('click', '.rhea_agents_expand_button.rhea_open', function () {
        //
        //     jQuery(this).parent('.rhea_expand_parent').addClass('rhea_expanded');
        //     jQuery(this).parent('.rhea_expand_parent').find('.rhea_agent_list_extra').slideDown('fast');
        //
        //     if (jQuery(this).parent('.rhea_expand_parent').hasClass('rhea_expanded')) {
        //         jQuery(this).hide();
        //     }
        //
        //
        // });
        // jQuery('body').on('click', '.rhea_agents_expand_button.rhea_close', function () {
        //
        //     jQuery(this).parents('.rhea_expand_parent').removeClass('rhea_expanded');
        //     jQuery(this).parents('.rhea_expand_parent').find('.rhea_agent_list_extra').slideUp('fast', function () {
        //         if (!jQuery(this).parents('.rhea_expand_parent').hasClass('.rhea_expanded')) {
        //             jQuery(this).parents('.rhea_expand_parent').find('.rhea_open').show();
        //         }
        //     });
        //
        // });

        // jQuery('html').on('click', function (e) {
        //
        //     jQuery('.rhea_expand_parent').removeClass('rhea_expanded');
        //     jQuery('.rhea_expand_parent').find('.rhea_agent_list_extra').slideUp('fast', function () {
        //         if (!jQuery('.rhea_expand_parent').hasClass('.rhea_expanded')) {
        //             jQuery('.rhea_expand_parent').find('.rhea_open').show();
        //         }
        //     });
        //
        //     e.stopPropagation();
        //
        // });


    });


    /*-----------------------------------------------------------------------------------*/
    /* Select 2
     /*-----------------------------------------------------------------------------------*/

    window.rheaSelectPicker = function (id) {
        if ($().selectpicker) {
            $(id).selectpicker({
                iconBase: 'fas',
                dropupAuto: 'true',
                tickIcon: 'fa-check',
                selectAllText: '<span class="rhea_select_bs_buttons rhea_bs_select"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><polygon points="22.1 9 20.4 7.3 14.1 13.9 15.8 15.6 "/><polygon points="27.3 7.3 16 19.3 9.6 12.8 7.9 14.5 16 22.7 29 9 "/><polygon points="1 14.5 9.2 22.7 10.9 21 2.7 12.8 "/></svg></span>',
                deselectAllText: '<span class="rhea_select_bs_buttons rhea_bs_deselect"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><style type="text/css">  \n' +
                    '\t.rh-st0{fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;}\n' +
                    '</style><path class="rhea_des rh-st0" d="M3.4 10.5H20c3.8 0 7 3.1 7 7v0c0 3.8-3.1 7-7 7h-6"/><polyline class="rhea_des rh-st0" points="8.4 15.5 3.4 10.5 8.4 5.5 "/></svg></span>',

            });
        }
    };


    /*-----------------------------------------------------------------------------------*/
    /* Search Form Widget
     /*-----------------------------------------------------------------------------------*/
    window.rheaSearchFields = function (id, fieldCount, topFields, collapsedFields) {

        var divList = $(id).find('.rhea_prop_search__option');
        divList.sort(function (a, b) {
            return $(a).data("key-position") - $(b).data("key-position")
        });

        $(topFields).html(divList).promise().done(function () {


            var getDataTopBar = fieldCount;


            var advanceSearch = $(topFields).find('.rhea_prop_search__option');

            var prePendTo = $(collapsedFields);

            var j = 0;

            var i = 0;

            advanceSearch.each(function () {
                if (i < getDataTopBar) {
                    if ($(this).hasClass('hide-fields')) {
                        j = 2;
                    }
                }
                i++;
            });

            var advanceElements = getDataTopBar + j + 1;


            if (advanceElements > 0) {
                var advanceFieldsSmart = $(topFields).find('.rhea_prop_search__option:nth-of-type(n+' + advanceElements + ')');

                advanceFieldsSmart.detach().prependTo(prePendTo);

            }

        });


    };


    window.rheaPropertySlider = function (id, min, max, pos = 'before', separator = ',', currency = '$',) {

        function thousandSeparator(n) {
            if (typeof n === 'number') {
                n += '';
                var x = n.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + separator + '$2');
                }
                return x1 + x2;
            } else {
                return n;
            }
        }

        var getPosition = pos;

        var PosBefore = '';
        var PosAfter = '';
        if (getPosition === 'before') {
            PosBefore = currency;
        } else {
            PosAfter = currency;
        }

        $(id).slider({
            range: true,
            min: min,
            max: max,
            step: 1000,
            values: [min, max],
            slide: function (event, ui) {


                for (var i = 0; i < ui.values.length; ++i) {
                    $("input.rhea_slider_value[data-index=" + i + "]").val(ui.values[i]);
                    $("span.rhea_price_display[data-index=" + i + "]").text(PosBefore + thousandSeparator(ui.values[i]) + PosAfter);

                }
            },
        });
    };

    window.rheaSearchAdvanceState = function (buttonID, wrapperID) {
        $(buttonID).on('click', function () {
            $(buttonID).toggleClass('rhea_advance_open');
            if ($(buttonID).hasClass('rhea_advance_open')) {
                $(wrapperID).slideDown('normal');
            } else {
                $(wrapperID).slideUp('normal');
            }
        });


    };

    window.rheaFeaturesState = function (buttonID, wrapperID) {
        $(buttonID).on('click', function () {
            $(buttonID).toggleClass('rhea_features_open');
            if ($(buttonID).hasClass('rhea_features_open')) {
                $(wrapperID).slideDown('normal');
            } else {
                $(wrapperID).slideUp('normal');
            }
        });


    };

    /*-----------------------------------------------------------------------------------*/
    /* Search Form price change on status change
     /*-----------------------------------------------------------------------------------*/
    window.rheaSearchStatusChange = function (priceOther, PriceRent, statusID,) {


        if (typeof localizedSearchParams.rent_slug !== "undefined") {

            var rhea_property_status_changed = function (new_status) {
                var price_for_others = $(priceOther);
                var price_for_rent = $(PriceRent);

                if (price_for_others.length > 0 && price_for_rent.length > 0) {

                    if (new_status == localizedSearchParams.rent_slug) {
                        price_for_others.addClass('hide-fields').find('select');
                        price_for_rent.removeClass('hide-fields').find('select');


                    } else {
                        price_for_rent.addClass('hide-fields').find('select');
                        price_for_others.removeClass('hide-fields').find('select');
                    }
                }
            };
            $(statusID).change(function (e) {
                var selected_status = $(this).val();
                rhea_property_status_changed(selected_status);
            });

            /* On page load ( as on search page ) */
            var selected_status = $(statusID).val();
            if (selected_status == localizedSearchParams.rent_slug) {
                rhea_property_status_changed(selected_status);
            }
        }
    };

    window.minMaxPriceValidation = function (minID, maxID) {

        /**
         * Max and Min Price
         * Shows red outline if min price is bigger than max price
         */

        /* for normal prices */
        $(minID).add(maxID).on('changed.bs.select', function () {
            var min_text_val = $(minID).val();
            var min_int_val = (isNaN(min_text_val)) ? 0 : parseInt(min_text_val);

            var max_text_val = $(maxID).val();
            var max_int_val = (isNaN(max_text_val)) ? 0 : parseInt(max_text_val);

            if ((min_int_val >= max_int_val) && (min_int_val != 0) && (max_int_val != 0)) {
                $(minID).add(maxID).siblings('.dropdown-toggle').addClass('rhea-error');
            } else {
                $(minID).add(maxID).siblings('.dropdown-toggle').removeClass('rhea-error');
            }
        });
    };
    window.minMaxRentPriceValidation = function (minID, maxID) {

        /* for rent prices */
        $(minID).add(maxID).on('changed.bs.select', function () {

            var min_text_val = $(minID).val();

            var min_int_val = (isNaN(min_text_val)) ? 0 : parseInt(min_text_val);

            var max_text_val = $(maxID).val();
            var max_int_val = (isNaN(max_text_val)) ? 0 : parseInt(max_text_val);

            if ((min_int_val >= max_int_val) && (min_int_val != 0) && (max_int_val != 0)) {
                $(minID).add(maxID).siblings('.dropdown-toggle').addClass('rhea-error');
            } else {
                $(minID).add(maxID).siblings('.dropdown-toggle').removeClass('rhea-error');
            }
        });
    };

    window.minMaxAreaValidation = function (minID, maxID) {
        /**
         * Max and Min Area
         * To show red outline if min is bigger than max
         */
        $(minID).add(maxID).on('change', function (obj, e) {
            var min_text_val = $(minID).val();
            var min_int_val = (isNaN(min_text_val)) ? 0 : parseInt(min_text_val);

            var max_text_val = $(maxID).val();
            var max_int_val = (isNaN(max_text_val)) ? 0 : parseInt(max_text_val);

            if ((min_int_val >= max_int_val) && (min_int_val != 0) && (max_int_val != 0)) {
                $(minID).add(maxID).addClass('rhea-error');
            } else {
                $(minID).add(maxID).removeClass('rhea-error');
            }
        });
    };


    /*-----------------------------------------------------------------------------------*/
    /* OSM map
     /*-----------------------------------------------------------------------------------*/
    window.rheaLoadOSMap = function (id, settingObj) {

        var ThisMapID = id;


        if (typeof settingObj !== "undefined") {

            if (0 < settingObj.length) {


                var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                });

                // get map bounds
                var mapBounds = [];
                for (var i = 0; i < settingObj.length; i++) {
                    if (settingObj[i].lat && settingObj[i].lng) {
                        mapBounds.push([settingObj[i].lat, settingObj[i].lng]);
                    }
                }

                // Basic map
                var mapCenter = L.latLng(27.664827, -81.515755);	// given coordinates not going to matter 99.9% of the time but still added just in case.
                if (1 == mapBounds.length) {
                    mapCenter = L.latLng(mapBounds[0]);	// this is also not going to effect 99% of the the time but just in case of one property.
                }
                var mapDragging = (L.Browser.mobile) ? false : true; // disabling one finger dragging on mobile but zoom with two fingers will still be enabled.
                var mapOptions = {
                    dragging: mapDragging,
                    center: mapCenter,
                    zoom: 13,
                    zoomControl: false,
                    tap: false
                };
                var propertiesMap = L.map(ThisMapID, mapOptions);

                L.control.zoom({
                    position: 'bottomleft'
                }).addTo(propertiesMap);

                propertiesMap.scrollWheelZoom.disable();

                if (1 < mapBounds.length) {
                    propertiesMap.fitBounds(mapBounds);	// fit bounds should work only for more than one properties
                }

                propertiesMap.addLayer(tileLayer);

                for (var i = 0; i < settingObj.length; i++) {

                    if (settingObj[i].lat && settingObj[i].lng) {

                        var propertyMapData = settingObj[i];

                        var markerLatLng = L.latLng(propertyMapData.lat, propertyMapData.lng);

                        var markerOptions = {
                            riseOnHover: true
                        };

                        // Marker icon
                        if (propertyMapData.title) {
                            markerOptions.title = propertyMapData.title;
                        }

                        if (propertyMapData.classes) {
                            var mapClasses = propertyMapData.classes.join(' ');
                        } else {
                            mapClasses = '';
                        }


                        // Marker icon
                        if (propertyMapData.icon) {
                            var iconOptions = {
                                iconUrl: propertyMapData.icon,
                                iconSize: [42, 57],
                                iconAnchor: [20, 57],
                                popupAnchor: [1, -54],
                                className: mapClasses,
                            };
                            if (propertyMapData.retinaIcon) {
                                iconOptions.iconRetinaUrl = propertyMapData.retinaIcon;
                            }
                            markerOptions.icon = L.icon(iconOptions);
                        }

                        var propertyMarker = L.marker(markerLatLng, markerOptions).addTo(propertiesMap);

                        // Marker popup
                        var popupContentWrapper = document.createElement("div");
                        popupContentWrapper.className = 'osm-popup-content';
                        var popupContent = "";

                        if (propertyMapData.thumb) {
                            popupContent += '<a class="osm-popup-thumb-link" href="' + propertyMapData.url + '"><img class="osm-popup-thumb" src="' + propertyMapData.thumb + '" alt="' + propertyMapData.title + '"/></a>';
                        }

                        if (propertyMapData.title) {
                            popupContent += '<h5 class="osm-popup-title"><a class="osm-popup-link" href="' + propertyMapData.url + '">' + propertyMapData.title + '</a></h5>';
                        }

                        if (propertyMapData.price) {
                            popupContent += '<p><span class="osm-popup-price">' + propertyMapData.price + '</span></p>';
                        }

                        popupContentWrapper.innerHTML = popupContent;

                        propertyMarker.bindPopup(popupContentWrapper);

                    }

                }

            } else {

                // Fallback Map
                var fallbackLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                });

                // todo: provide an option for fallback map coordinates
                var fallbackMapOptions = {
                    center: [27.664827, -81.515755],
                    zoom: 12
                };

                var fallbackMap = L.map(ThisMapID, fallbackMapOptions);
                fallbackMap.addLayer(fallbackLayer);

            }

        }


        // });


    };


    /*-----------------------------------------------------------------------------------*/
    /* Google map
     /*-----------------------------------------------------------------------------------*/
    window.rheaLoadGoogleMap = function (id, propertiesMapData, propertiesMapOptions, mapStuff) {

        var ThisMapID = id;


        if (typeof propertiesMapData !== "undefined") {

            if (0 < propertiesMapData.length) {

                var fullScreenControl = true;
                var fullScreenControlPosition = google.maps.ControlPosition.TOP_LEFT;

                var mapTypeControl = true;
                var mapTypeControlPosition = google.maps.ControlPosition.LEFT_BOTTOM;

                if (mapStuff.modernHome) {
                    mapTypeControl = false;
                    fullScreenControlPosition = google.maps.ControlPosition.LEFT_BOTTOM;
                }

                var mapOptions = {
                    zoom: 12,
                    maxZoom: 16,
                    fullscreenControl: fullScreenControl,
                    fullscreenControlOptions: {
                        position: fullScreenControlPosition
                    },
                    mapTypeControl: mapTypeControl,
                    mapTypeControlOptions: {
                        position: mapTypeControlPosition
                    },
                    scrollwheel: false, styles: [{
                        "featureType": "landscape", "stylers": [{
                            "hue": "#FFBB00"
                        }, {
                            "saturation": 43.400000000000006
                        }, {
                            "lightness": 37.599999999999994
                        }, {
                            "gamma": 1
                        }]
                    }, {
                        "featureType": "road.highway", "stylers": [{
                            "hue": "#FFC200"
                        }, {
                            "saturation": -61.8
                        }, {
                            "lightness": 45.599999999999994
                        }, {
                            "gamma": 1
                        }]
                    }, {
                        "featureType": "road.arterial", "stylers": [{
                            "hue": "#FF0300"
                        }, {
                            "saturation": -100
                        }, {
                            "lightness": 51.19999999999999
                        }, {
                            "gamma": 1
                        }]
                    }, {
                        "featureType": "road.local", "stylers": [{
                            "hue": "#FF0300"
                        }, {
                            "saturation": -100
                        }, {
                            "lightness": 52
                        }, {
                            "gamma": 1
                        }]
                    }, {
                        "featureType": "water", "stylers": [{
                            "hue": "#0078FF"
                        }, {
                            "saturation": -13.200000000000003
                        }, {
                            "lightness": 2.4000000000000057
                        }, {
                            "gamma": 1
                        }]
                    }, {
                        "featureType": "poi", "stylers": [{
                            "hue": "#00FF6A"
                        }, {
                            "saturation": -1.0989010989011234
                        }, {
                            "lightness": 11.200000000000017
                        }, {
                            "gamma": 1
                        }]
                    }]
                };

                // Map Styles
                if (undefined !== propertiesMapOptions.styles) {
                    mapOptions.styles = JSON.parse(propertiesMapOptions.styles);
                }

                // Setting Google Map Type
                switch (propertiesMapOptions.type) {
                    case 'satellite':
                        mapOptions.mapTypeId = google.maps.MapTypeId.SATELLITE;
                        break;
                    case 'hybrid':
                        mapOptions.mapTypeId = google.maps.MapTypeId.HYBRID;
                        break;
                    case 'terrain':
                        mapOptions.mapTypeId = google.maps.MapTypeId.TERRAIN;
                        break;
                    default:
                        mapOptions.mapTypeId = google.maps.MapTypeId.ROADMAP;
                }

                var propertiesMap = new google.maps.Map(document.getElementById(ThisMapID), mapOptions);

                var overlappingMarkerSpiderfier = new OverlappingMarkerSpiderfier(propertiesMap, {
                    markersWontMove: true,
                    markersWontHide: true,
                    keepSpiderfied: true,
                    circleSpiralSwitchover: Infinity,
                    nearbyDistance: 50
                });
                var mapBounds = new google.maps.LatLngBounds();
                var openedWindows = [];

                var closeOpenedWindows = function () {
                    while (0 < openedWindows.length) {
                        var windowToClose = openedWindows.pop();
                        windowToClose.close();
                    }
                };

                var attachInfoBoxToMarker = function (map, marker, infoBox) {
                    google.maps.event.addListener(marker, 'click', function () {
                        closeOpenedWindows();
                        var scale = Math.pow(2, map.getZoom());
                        var offsety = ((100 / scale) || 0);
                        var projection = map.getProjection();
                        var markerPosition = marker.getPosition();
                        var markerScreenPosition = projection.fromLatLngToPoint(markerPosition);
                        var pointHalfScreenAbove = new google.maps.Point(markerScreenPosition.x, markerScreenPosition.y - offsety);
                        var aboveMarkerLatLng = projection.fromPointToLatLng(pointHalfScreenAbove);
                        map.setCenter(aboveMarkerLatLng);
                        infoBox.open(map, marker);
                        openedWindows.push(infoBox);

                        // lazy load info box image to improve performance
                        var infoBoxImage = infoBox.getContent().getElementsByClassName('prop-thumb');
                        if (infoBoxImage.length) {
                            if (infoBoxImage[0].dataset.src) {
                                infoBoxImage[0].src = infoBoxImage[0].dataset.src;
                            }
                        }

                    });
                };

                // Loop to generate marker and info windows based on properties data
                var markers = [];
                var map = {
                    '&amp;': '&',
                    '&#038;': "&",
                    '&lt;': '<',
                    '&gt;': '>',
                    '&quot;': '"',
                    '&#039;': "'",
                    '&#8217;': "’",
                    '&#8216;': "‘",
                    '&#8211;': "–",
                    '&#8212;': "—",
                    '&#8230;': "…",
                    '&#8221;': '”'
                };

                for (var i = 0; i < propertiesMapData.length; i++) {

                    if (propertiesMapData[i].lat && propertiesMapData[i].lng) {

                        var iconURL = propertiesMapData[i].icon;
                        var size = new google.maps.Size(42, 57);
                        if (window.devicePixelRatio > 1.5) {
                            if (propertiesMapData[i].retinaIcon) {
                                iconURL = propertiesMapData[i].retinaIcon;
                                size = new google.maps.Size(83, 113);
                            }
                        }

                        var makerIcon = {
                            url: iconURL,
                            size: size,
                            scaledSize: new google.maps.Size(42, 57),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(21, 56)
                        };

                        markers[i] = new google.maps.Marker({
                            position: new google.maps.LatLng(propertiesMapData[i].lat, propertiesMapData[i].lng),
                            map: propertiesMap,
                            icon: makerIcon,
                            title: propertiesMapData[i].title.replace(/\&[\w\d\#]{2,5}\;/g, function (m) {
                                return map[m];
                            }),  // Decode PHP's html special characters encoding with Javascript
                            animation: google.maps.Animation.DROP,
                            visible: true
                        });

                        // extend bounds
                        mapBounds.extend(markers[i].getPosition());

                        // prepare info window contents
                        var boxText = document.createElement("div");
                        boxText.className = 'rhea-map-info-window';
                        var innerHTML = "";

                        // info window image place holder URL to improve performance
                        var infoBoxPlaceholderURL = "";
                        if ((typeof mapStuff !== "undefined") && mapStuff.infoBoxPlaceholder) {
                            infoBoxPlaceholderURL = mapStuff.infoBoxPlaceholder;
                        }

                        if (propertiesMapData[i].thumb) {
                            innerHTML += '<a class="thumb-link" href="' + propertiesMapData[i].url + '">' + '<img class="prop-thumb" src="' + infoBoxPlaceholderURL + '"  data-src="' + propertiesMapData[i].thumb + '" alt="' + propertiesMapData[i].title + '"/>' + '</a>';
                        } else {
                            innerHTML += '<a class="thumb-link" href="' + propertiesMapData[i].url + '">' + '<img class="prop-thumb" src="' + infoBoxPlaceholderURL + '" alt="' + propertiesMapData[i].title + '"/>' + '</a>';
                        }

                        innerHTML += '<h5 class="prop-title"><a class="title-link" href="' + propertiesMapData[i].url + '">' + propertiesMapData[i].title + '</a></h5>';
                        if (propertiesMapData[i].price) {
                            innerHTML += '<p><span class="rhea-popup-price price">' + propertiesMapData[i].price + '</span></p>';
                        }
                        innerHTML += '<div class="arrow-down"></div>';
                        boxText.innerHTML = innerHTML;

                        // info window close icon URL
                        var closeIconURL = "";
                        if ((typeof mapStuff !== "undefined") && mapStuff.closeIcon) {
                            closeIconURL = mapStuff.closeIcon;
                        }

                        // finalize info window
                        var infoWindowOptions = {
                            content: boxText,
                            disableAutoPan: true,
                            maxWidth: 0,
                            alignBottom: true,
                            pixelOffset: new google.maps.Size(-122, -48),
                            zIndex: null,
                            closeBoxMargin: "0 0 -16px -16px",
                            closeBoxURL: closeIconURL,
                            infoBoxClearance: new google.maps.Size(1, 1),
                            isHidden: false,
                            pane: "floatPane",
                            enableEventPropagation: false
                        };
                        var currentInfoBox = new InfoBox(infoWindowOptions);

                        // attach info window to marker
                        attachInfoBoxToMarker(propertiesMap, markers[i], currentInfoBox);

                        // apply overlapping marker spiderfier to marker
                        overlappingMarkerSpiderfier.addMarker(markers[i]);

                    }

                }


                // fit map to bounds as per markers
                propertiesMap.fitBounds(mapBounds);

                // cluster icon URL
                var clusterIconURL = "";
                if ((typeof mapStuff !== "undefined") && mapStuff.clusterIcon) {
                    clusterIconURL = mapStuff.clusterIcon;
                }

                // Markers clusters
                var markerClustererOptions = {
                    ignoreHidden: true, maxZoom: 14, styles: [{
                        textColor: '#ffffff',
                        url: clusterIconURL,
                        height: 48,
                        width: 48
                    }]
                };
                var markerClusterer = new MarkerClusterer(propertiesMap, markers, markerClustererOptions);


            } else {

                // Fallback Map in Case of No Properties
                // todo: provide an option for fallback map coordinates
                var fallBackLocation = new google.maps.LatLng(27.664827, -81.515755);	// Default location of Florida in fallback map.
                var fallBackOptions = {
                    center: fallBackLocation,
                    zoom: 10,
                    maxZoom: 16,
                    scrollwheel: false
                };

                // Map Styles
                if (undefined !== propertiesMapOptions.styles) {
                    fallBackOptions.styles = JSON.parse(propertiesMapOptions.styles);
                }

                var fallBackMap = new google.maps.Map(document.getElementById(ThisMapID), fallBackOptions);

            }
        }

    };


    window.rheaLocationField = function (allLoc, locPH, SelectIDs, LocInParams, countSelects, anyVal, multi) {


        // All locations
        var allLocations = allLoc;


        var locationPlace = locPH;

        // Number of total locations in all locations array
        var locationsCount = allLocations.length;

        // Select boxes names that can be used as ids
        var selectIds = SelectIDs;

        // number of select boxes to manage
        var selectCount = parseInt(countSelects);


        // parameters related to location boxes
        var locationsInParams = LocInParams;

        // "Any" text as it could be translated
        // var any_text            = locationData.any_text;

        // "any" value
        var any_value = anyVal;


        var multiple = multi;


        /**
         * Add child of given term id in target select box
         * @param parentID      parent term id
         * @param targetSelect  target select box
         * @param prefix        prefix to add before child name
         * @param all_child     add all child or only first level child
         * @returns {Array}     return array of child locations
         */

        var addChildLocations = function (parentID, targetSelect, prefix, all_child) {
            var childLocations = [];
            var childLocationsCounter = 0;

            // add "any" option to empty select
            for (var j = 0; j < locationsCount; j++) {



                // this code works for search field in search form
                if ((targetSelect.has('option').length == 0) && (targetSelect.parents('.rhea_prop_search__select').hasClass('rhea_location_prop_search_' + j + ''))) {
                    if (multiple !== "multiple") {
                        targetSelect.append('<option value="' + any_value + '" selected="selected">' + locationPlace[j] + '</option>');
                    }
                    targetSelect.val(any_value).trigger("change");
                }

            }

            for (var i = 0; i < locationsCount; i++) {
                var currentLocation = allLocations[i];
                if (parseInt(currentLocation['parent']) == parentID) {
                    targetSelect.append('<option value="' + currentLocation['slug'] + '">' + prefix + currentLocation['name'] + '</option>');
                    childLocations[childLocationsCounter] = currentLocation;
                    childLocationsCounter++;
                    if (all_child) {
                        var currentLocationID = parseInt(currentLocation['term_id']);

                        addChildLocations(currentLocationID, targetSelect, prefix + '- ', all_child);
                    }
                }


            }
            return childLocations;
        };


        /**
         * Get term id related to target location
         * @param selectedLocation  target location
         * @returns {number}    term id
         */
        var getRelatedTermID = function (selectedLocation) {
            var termID = 0;
            var currentLocation;
            // loop through all locations and match selected slug with each one to find the related term id which will be used as parent id later on
            for (var i = 0; i < locationsCount; i++) {
                currentLocation = allLocations[i];
                if (currentLocation['slug'] == selectedLocation) {
                    termID = parseInt(currentLocation['term_id']);
                    break;
                }
            }
            return termID;
        };

        /**
         * Does the following things to a target select box.
         * 1. Make it empty.
         * 2. Add an option with "any" as value and "Any" as it's title/text
         * @param targetSelect
         */
        var resetSelect = function (targetSelect) {
            targetSelect.empty();
            for (var j = 0; j < locationsCount; j++) {

                if (targetSelect.parents('.rhea_prop_search__select').hasClass('rhea_location_prop_search_' + j + '')) {

                    var thisPH = targetSelect.parents('.rhea_prop_search__select').data('get-location-placeholder');

                    targetSelect.append('<option value="' + any_value + '" selected="selected">' + thisPH + '</option>');
                }

            }
            targetSelect.val(any_value).trigger("change");


        };


        /**
         * Disable a select box and next select boxes if exists
         * @param targetSelect
         */
        var disableSelect = function (targetSelect) {


            resetSelect(targetSelect);
            targetSelect.closest('.option-bar').addClass('disabled');
            if (targetSelect.is(':enabled')) {
                targetSelect.prop("disabled", true);
                targetSelect.parents('.rhea_prop_search__select').addClass('rhea_disable_parent');
            }

            var targetSelectID = targetSelect.attr('id');                    // target select box id
            var targetSelectIndex = selectIds.indexOf(targetSelectID);      // target select box index
            var nextSelectBoxesCount = selectCount - (targetSelectIndex + 1);

            // disable next select boxes
            if (nextSelectBoxesCount > 0) {
                for (var i = targetSelectIndex + 1; i < selectCount; i++) {
                    var tempSelect = $('#' + selectIds[i]);
                    resetSelect(tempSelect);
                    tempSelect.closest('.option-bar').addClass('disabled');
                    if (tempSelect.is(':enabled')) {
                        tempSelect.prop("disabled", true);
                        tempSelect.parents('.rhea_prop_search__select').addClass('rhea_disable_parent');
                    }
                }
            }


        };


        /**
         * Enable a select box
         * @param targetSelect
         */
        var enableSelect = function (targetSelect) {
            if (targetSelect.is(':disabled')) {
                targetSelect.prop('disabled', false);
                targetSelect.parents('.rhea_prop_search__select').removeClass('rhea_disable_parent');
            }
            var optionWrapper = targetSelect.closest('.option-bar');
            if (optionWrapper.hasClass('disabled')) {
                optionWrapper.removeClass('disabled');
                optionWrapper.parents('.rhea_prop_search__select').removeClass('rhea_disable_parent');
            }
        };


        /**
         * Update next select box based on change in parent select box
         * @param event
         */
        var updateChildSelect = function (event) {

            var selectedLocation = $(this).val();                                               // get selected slug
            var currentSelectIndex = selectIds.indexOf($(this).attr('id'));                   // current select box index

            /* in case of "any" selection */
            if (selectedLocation == any_value && currentSelectIndex > -1 && currentSelectIndex < (selectCount - 1)) {  // no need to run this on last select box

                for (var s = currentSelectIndex; s < (selectCount - 1); s++) {


                    var childSelectIsLast = (selectCount == (s + 2));
                    var childSelect = $('#' + selectIds[s + 1]);

                    childSelect.empty();                                                   // make it empty

                    /* loop through select options to find and add child locations into next select */
                    var anyChildLocations = [];
                    $('#' + selectIds[s] + ' > option').each(function () {
                        var currentOptionVal = this.value;
                        if (currentOptionVal != any_value) {
                            var relatedTermID = getRelatedTermID(currentOptionVal);
                            if (relatedTermID > 0) {
                                var tempLocations = addChildLocations(relatedTermID, childSelect, '', childSelectIsLast);
                                if (tempLocations.length > 0) {
                                    anyChildLocations = $.merge(anyChildLocations, tempLocations);
                                }
                            }
                        }
                    });

                    /* enable next select if options are added otherwise disable it */
                    if (anyChildLocations.length > 0) {
                        enableSelect(childSelect);                                    // enable child select box
                        if (!childSelectIsLast) {
                            childSelect.change(updateChildSelect);
                        }
                    } else {
                        disableSelect(childSelect);
                        break;
                    }

                }

                /* in case of valid location selection */
            } else {
                var parentID = getRelatedTermID(selectedLocation);                        // get related term id that will be used as parent id below
                if (parentID > 0) {                                                        // We can only do something if term id is valid
                    var childLocations = [];
                    for (var n = currentSelectIndex + 1; n < selectCount; n++) {
                        var childSelect = $('#' + selectIds[n]);                          // selector for next( child locations ) select box
                        var childSelectIsLast = (selectCount == (n + 1));
                        childSelect.empty();                                           // make it empty

                        if (childLocations.length == 0) {    // 1st iteration
                            childLocations = addChildLocations(parentID, childSelect, '', childSelectIsLast);    // add all children
                        } else if (childLocations.length > 0) {  // 2nd and later iterations
                            var currentLocations = [];
                            for (var i = 0; i < childLocations.length; i++) {
                                var tempLocations = addChildLocations(parseInt(childLocations[i]['term_id']), childSelect, '', childSelectIsLast);
                                if (tempLocations.length > 0) {
                                    currentLocations = $.merge(currentLocations, tempLocations);
                                }
                            }
                            childLocations = currentLocations;
                        }

                        if (childLocations.length > 0) {
                            enableSelect(childSelect);                                    // enable child select box
                            if (!childSelectIsLast) {
                                childSelect.change(updateChildSelect);
                            }
                        } else {
                            disableSelect(childSelect);
                            break;
                        }
                    }
                }
            }

        };


        /**
         * Mark the current value in query params as selected
         * @param targetSelect
         */
        var selectRightOption = function (targetSelect) {
            if (Object.keys(locationsInParams).length > 0) {
                var selectName = targetSelect.attr('name');
                if (typeof locationsInParams[selectName] != 'undefined') {
                    targetSelect.find('option[value="' + locationsInParams[selectName] + '"]').prop('selected', true);
                }
            }
        };


        /**
         * Initialize location boxes in search form
         */
        var initLocations = function () {

            var parentLocations = [];
            for (var s = 0; s < selectCount; s++) {

                var currentSelect = $('#' + selectIds[s]);
                var currentIsLast = (selectCount == (s + 1));

                // 1st iteration
                if (s == 0) {
                    parentLocations = addChildLocations(0, currentSelect, '', currentIsLast);

                    // later iterations
                } else {
                    if (parentLocations.length > 0) {
                        var currentLocations = [];
                        var previousSelect = $('#' + selectIds[s - 1]);

                        // loop through all if value is "any"
                        if (previousSelect.val() == any_value) {
                            for (var i = 0; i < parentLocations.length; i++) {
                                var tempLocations = addChildLocations(parseInt(parentLocations[i]['term_id']), currentSelect, '', currentIsLast);
                                if (tempLocations.length > 0) {
                                    currentLocations = $.merge(currentLocations, tempLocations);
                                }
                            }

                            // else display only children of current value
                        } else {
                            var parentID = getRelatedTermID(previousSelect.val());
                            if (parentID > 0) {
                                currentLocations = addChildLocations(parentID, currentSelect, '', currentIsLast);
                            }
                        }
                        previousSelect.change(updateChildSelect);
                        parentLocations = currentLocations;
                    }
                }

                // based on what happens above
                if (parentLocations.length == 0) {
                    disableSelect(currentSelect);
                    break;
                } else {
                    selectRightOption(currentSelect);
                }

            }
        };

        /* Runs on Load */
        initLocations();


    };

    var rheaLocationSuccessList = function (data,thisParent,refreshList = false) {

        if(true === refreshList){
            thisParent.find('option').not(':selected, .none').remove().end();
        }
        var getSelected = $(thisParent).val();


        jQuery.each(data, function (index, text) {

            if (getSelected) {
                if (getSelected.indexOf(text[0]) < 0) {
                    thisParent.append(
                        $('<option value="' + text[0] + '">' + text[1] + '</option>')
                    );
                }
            } else {
                thisParent.append(
                    $('<option value="' + text[0] + '">' + text[1] + '</option>')
                );
            }
        });
        thisParent.selectpicker('refresh');
        $(parent).find('ul.dropdown-menu li:first-of-type a').focus();

        $(parent).find('input').focus();

    };


    var rheaLoaderFadeIn =function (parent) {
        $(parent).find('.rhea-location-ajax-loader').fadeIn('fast');
    };

    var rheaLoaderFadeOut =function (parent) {
        $(parent).find('.rhea-location-ajax-loader').fadeOut('fast');
    };

    var rheaTriggerAjaxOnLoad = function(parent,thisParent,ajaxurl, hideEmpty, SortAlpha,fieldValue = ''){

        $.ajax({
            url: ajaxurl,
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: {
                action: 'rhea_get_location_options', // AJAX action for admin-ajax.php
                query: fieldValue,
                hideemptyfields: hideEmpty,
                sortplpha: SortAlpha,

            },
            beforeSend:rheaLoaderFadeIn(parent),
            success: function (data) {
                rheaLoaderFadeOut(parent);
                rheaLocationSuccessList(data,thisParent,true);
            }
        });

    };

    var rheaTriggerAjaxOnScroll = function(parent,thisParent,farmControl ,ajaxurl, hideEmpty, SortAlpha,fieldValue = ''){

        var paged = 2;

        farmControl.on('keyup', function (e) {
            paged = 2;

            fieldValue = $(this).val();
        });

        var targetInner = $(parent).find('div.inner');

        targetInner.on('scroll', function () {
            var thisInner = $(this);

            var thisInnerHeight = thisInner.innerHeight();
            var getScrollIndex = thisInner.scrollTop() + thisInnerHeight;
            if(getScrollIndex >= $(this)[0].scrollHeight) {


                $.ajax({
                    url: ajaxurl,
                    dataType: 'json',
                    delay: 250, // delay in ms while typing when to perform a AJAX search
                    data: {
                        action: 'rhea_get_location_options', // AJAX action for admin-ajax.php
                        query: fieldValue,
                        page: paged,
                        hideemptyfields: hideEmpty,
                        sortplpha: SortAlpha,
                    },
                    // beforeSend: loaderFadeIn(),
                    beforeSend:rheaLoaderFadeIn(parent),
                    success: function (data) {
                        rheaLoaderFadeOut(parent);
                        paged++;
                        rheaLocationSuccessList(data, thisParent, false);

                        if (!$.trim(data)){
                            $(parent).find('.rhea-location-ajax-loader').fadeTo( "fast" , 0);
                        }
                    }
                });
            }
        });
    };

    window.rheaAjaxSelect = function (parent, id, ajaxurl, hideEmpty, SortAlpha) {


        var farmControl = $(parent).find('.form-control');

        var thisParent = $(id);
        rheaTriggerAjaxOnScroll(parent, thisParent, farmControl, ajaxurl, hideEmpty, SortAlpha);

        rheaTriggerAjaxOnLoad(parent,thisParent,ajaxurl,hideEmpty,SortAlpha);

        farmControl.on('keyup', function (e) {


            var fieldValue = $(this).val();


            fieldValue = fieldValue.trim();

            var wordcounts = jQuery.trim(fieldValue).length;

            $(parent).find('.rhea-location-ajax-loader').fadeTo( "fast" , 1);

            if (wordcounts > 0) {

                $.ajax({
                    url: ajaxurl,
                    dataType: 'json',
                    delay: 250, // delay in ms while typing when to perform a AJAX search

                    data: {
                        action: 'rhea_get_location_options', // AJAX action for admin-ajax.php
                        query: fieldValue,
                        hideemptyfields: hideEmpty,
                        sortplpha: SortAlpha,
                    },
                    beforeSend:rheaLoaderFadeIn(parent),
                    success: function (data) {
                        rheaLoaderFadeOut(parent);
                        thisParent.find('option').not(':selected').remove().end();
                        // var options = [];
                        if (fieldValue && data) {
                            rheaLocationSuccessList(data,thisParent);
                        } else {
                            thisParent.find('option').not(':selected').remove().end();
                            thisParent.selectpicker('refresh');
                            $(parent).find('ul.dropdown-menu li:first-of-type a').focus();
                            $(parent).find('input').focus();
                        }
                    },

                });
            } else {
                rheaTriggerAjaxOnLoad(parent,thisParent,ajaxurl,hideEmpty,SortAlpha)
            }

        });

    };

    window.rheaTestimonialsTwoCarousel = function (id, itemsFluid = 4, items = 3, itemsTab = 2, itemsMob = 1, gap = 30, dots = true, rtl = false) {
        if ($().owlCarousel) {
            $(id).owlCarousel({
                loop: false,
                dots: dots,
                nav: false,
                margin: gap,
                rtl: rtl,
                responsive: {
                    0: {
                        items: itemsMob
                    },
                    767: {
                        items: itemsTab
                    },
                    1024: {
                        items: items
                    },
                    1440: {
                        items: itemsFluid
                    }
                }

            });
        }
    };

    window.rheaTestimonialsThreeCarousel = function (slide1, slide2, navSelectors, animationspeed = '600', slideshowspeed = '5000',
                                                     slideShow1 = true, direction1 = 'horizontal', animation1 = 'fade', reverse1 = false, animation2 = 'fade', reverse2 = false) {
        if ($().flexslider) {
            $(slide1).flexslider({
                controlNav: false,
                directionNav: false,
                animationLoop: true,
                slideshow: slideShow1,
                direction: direction1,
                animation: animation1,
                reverse: reverse1,
                animationSpeed: animationspeed,
                slideshowSpeed: slideshowspeed,
            });

            $(slide2).flexslider({
                controlNav: false,
                animation: animation2,
                animationLoop: true,
                slideshow: slideShow1,
                reverse: reverse2,
                customDirectionNav: $(navSelectors),
                sync: $(slide1),
                animationSpeed: animationspeed,
                slideshowSpeed: slideshowspeed,
            });
        }
    };

    window.rheaSubmitContactForm = function (formID, btnSelector) {
        if (jQuery().validate && jQuery().ajaxSubmit) {

            var submitButton = $(btnSelector),
                ajaxLoader = $(formID).find('.rhea-ajax-loader'),
                messageContainer = $(formID).find('.rhea-message-container'),
                errorContainer = $(formID).find(".rhea-error-container");

            var formOptions = {
                beforeSubmit: function () {
                    submitButton.attr('disabled', 'disabled');
                    ajaxLoader.fadeIn('fast');
                    messageContainer.fadeOut('fast');
                    errorContainer.fadeOut('fast');
                },
                success: function (ajax_response, statusText, xhr, $form) {
                    var response = $.parseJSON(ajax_response);
                    ajaxLoader.fadeOut('fast');
                    submitButton.removeAttr('disabled');
                    if (response.success) {
                        $form.resetForm();
                        messageContainer.html(response.message).fadeIn('fast');

                        setTimeout(function () {
                            messageContainer.fadeOut('slow')
                        }, 5000);

                        // call reset function if it exists
                        if (typeof inspiryResetReCAPTCHA == 'function') {
                            inspiryResetReCAPTCHA();
                        }

                        if (typeof CFOSData !== 'undefined') {
                            setTimeout(function () {
                                window.location.replace(CFOSData.redirectPageUrl);
                            }, 1000);
                        }

                        if (typeof contactFromData !== 'undefined') {
                            setTimeout(function () {
                                window.location.replace(contactFromData.redirectPageUrl);
                            }, 1000);
                        }
                    } else {
                        errorContainer.html(response.message).fadeIn('fast');
                    }
                }
            };


            // Agent single page form
            $(formID).validate({
                errorLabelContainer: errorContainer,
                submitHandler: function (form) {
                    $(form).ajaxSubmit(formOptions);
                }
            });
        }
    };


    function isInViewport(node) {
        var rect = node.getBoundingClientRect();
        return (
            (rect.height > 0 || rect.width > 0) &&
            rect.bottom >= 0 &&
            rect.right >= 0 &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        )
    }

    function scrollParallax(selector) {
        var scrolled = jQuery(window).scrollTop();
        jQuery(selector).each(function (index, element) {
            var initY = jQuery(this).offset().top;
            var height = jQuery(this).height();
            var endY = initY + jQuery(this).height();

            // Check if the element is in the viewport.
            var visible = isInViewport(this);
            if (visible) {
                var diff = scrolled - initY;
                var ratio = Math.round((diff / height) * 100);
                jQuery(this).css('background-position', 'center ' + parseInt((ratio * 1)) + 'px')
            }

        })
    }

    jQuery('.ere_cta_parallax').each(function () {
        scrollParallax(this);
    });

    jQuery(window).scroll(function () {
        jQuery('.ere_cta_parallax').each(function () {
            scrollParallax(this);
        });

    });

})
(jQuery);








