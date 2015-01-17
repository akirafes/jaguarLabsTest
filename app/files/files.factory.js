/**
 * Created by fernando on 17/01/2015.
 */
factories.files =  function($http,$filter) {
    var factory = {};
    factory.getAgencies = function (callback, resort, agency, rate, pax, extras, checkin, checkout, lead, numRooms) {
        var ex = JSON.stringify(extras);
        /*$http.get('travelDates.php?cin='+$filter('date')(checkin, "yyyy-MM-dd")+'&cout='+$filter('date')(checkout, "yyyy-MM-dd")+'&ag='+agency+"&rt="+rate+"&pax="+pax+"&ex="+ex).success(callback);*/
        $http.get('calculateRates.php?res=' + resort + '&cin=' + $filter('date')(checkin, "yyyy-MM-dd") + '&cout=' + $filter('date')(checkout, "yyyy-MM-dd") + '&ag=' + agency + "&rt=" + rate + "&pax=" + pax + "&ex=" + ex + "&lid=" + lead.id + "&numrooms=" + numRooms).success(callback);
    }

    factory.getFiles = function (callback) {
        //	$http.get('listAgencies.php').success(callback);
        $http.get('data/listFiles.php').success(callback);
    }

    factory.getFileContent = function(file,callback){
        $http.get('data/getFileContent.php?archivo='+file).success(callback);
    }

    factory.saveFileContent = function($values,callback){

    }

    factory.saveFileContent = function(file,postData,successCallback){
        $http.post('data/saveFileContents.php?archivo='+file, postData).success(successCallback);
    }
    return factory;
}
