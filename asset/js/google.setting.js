var google_default = {
     df_city_lat:6.9344,
     df_city_lon:79.8428,
     df_lat_lon_name:'Colombo',
     df_lon_country_name:'Sri Lanka',
     df_zoom:8,
     df_city_zoom:15,
     df_navigationControl:true,
     set_form_latlng :function (latlng){ fix_leng_lat= latlng.lat()+""; jQuery('#lat').val(fix_leng_lat.substring(0,9)); fix_leng_lng= latlng.lng()+""; jQuery('#lon').val(fix_leng_lng.substring(0,9)); }


}; 
 