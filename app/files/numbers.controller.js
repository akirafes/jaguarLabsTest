/**
 * Created by fernando on 17/01/2015.
 */
controllers.numbers = function($scope,files){
    $scope.files = {
        "type": "file",
        "name": ""
    };
    $scope.fileName = "";
    $scope.currentAction = "";
    $scope.currentStep = 1;
    $scope.fileContentRaw = "";
    $scope.fileContentformated = "";
    $scope.lastResponse = {};
    $scope.numberOfNumbers = 1;
    $scope.numbers = [{"value":0}];
    $scope.grabado = false;

    $scope.resetInfo = function(){
        $scope.lastResponse = {};
        $scope.numberOfNumbers = 1;
        $scope.numbers = [{"value":0}];
    }

    $scope.changeNumberOfNumbers = function(){
        $scope.numbers = [];
        for(cont = 1; cont <= $scope.numberOfNumbers; cont++){
            $scope.numbers.push({"value":0});
        }

    }

    $scope.setAction = function(action){
        $scope.currentAction = action;
        $scope.currentStep = 2;
        $scope.resetInfo();
        switch (action){
            case "leer":
                $scope.readFileContent();
                break;
            case "escribir":
                break;
        }
    }

    $scope.showStep = function(step,action){
        response = false;
        if($scope.currentAction == action && step >= $scope.currentStep){
            response = true;
        }
        return response;
    }

    $scope.setCurrentFileName = function(name){
        $scope.fileName = name;
    }


    $scope.saveFile = function(){
        $scope.grabado = false;
        files.saveFileContent($scope.fileName,$scope.numbers, function(result){
            $scope.grabado = true;
        });
    }

    $scope.readFileContent = function(){
        files.getFileContent($scope.fileName,function(result){
            if(result.status == "ok") {
                $scope.lastResponse = result;
            } else {
                $scope.lastResponse = {"formated": ["File No Exist"], "raw": "File No Exist","status": "error" };
            }

        });
    }

    $scope.init = function(){
       files.getFiles(function(result){
         $scope.files = result.content;
       });
    };

    $scope.init();
};