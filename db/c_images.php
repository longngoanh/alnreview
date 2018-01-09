<?php

class CImages {
    
    const TABLE_NAME = 'images';
    var $data;
    
    function GetImageID() {
        return $this->data['imageID'];
    }
    
    function GetEmployeeID() {
        return $this->data['employeeID'];
    }
    
    function GetUploadTime() {
        return $this->data['uploadTime'];
    }
    
    function GetImageType() {
        return $this->data['imageType'];
    }
    
    function GetVisibilityToUser() {
        return $this->data['visibilityToUser'];
    }
    
    function __construct($data) {
        $this->data = $data;
    }
    
    /**
     * 
     * @param type $connectDBObj
     * @param type $nImageID
     * @return \self
     */
    static function fetchByImageID($connectDBObj, $nImageID) {
        $cImage = null;
        $szSql = "SELECT * FROM " . self::TABLE_NAME . " WHERE EmployeeID = $nImageID";
        $stmt = $connectDBObj->prepare($szSql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultData = $stmt->fetchAll();
        $cImage = new self($resultData[0]);

        return $cImage;
    }
    
    static function CreateNew($connectDBObj, $nEmployeeID, $szUploadTime, $nImageType, $nVisibilityToUser, $szCond = '') {
        $szSql = " insert into " . self::TABLE_NAME . " set"
                . " employeeID = '$nEmployeeID'"
                . ", uploadTime = '$szUploadTime'"
                . ", imageType = '$nImageType'"
                . ", visibilityToUser = '$nVisibilityToUser'"
                . " " . $szCond;
        
        return $connectDBObj->exec($szSql);
    }
    
    static function updateData($connectDBObj, $aSetKeyValuePairs, $szCondition){
        $szSql = "UPDATE ".self::TABLE_NAME." SET ";
        foreach ($aSetKeyValuePairs as $szKey => $szValue){
            $szSql .= "$szKey = '$szValue',";
        }
        // Remove last , sign 
        $szSql = substr_replace($szSql,"",-1);
        $szSql .= " ".$szCondition;
        // Prepare statement
        $stmt = $connectDBObj->prepare($szSql);
        
        // execute the query
        $stmt->execute();
        
        return $stmt->rowCount();
    }
}