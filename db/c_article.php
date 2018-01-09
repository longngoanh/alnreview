<?php

class CArticle {

    const TABLE_NAME = 'article';

    var $data;

    function GetArticleID() {
        return $this->data['articleID'];
    }

    function GetWriterID() {
        return $this->data['content'];
    }

    function GetTitle() {
        return $this->data['title'];
    }
    
    function GetBriefContent() {
        return $this->data['briefContent'];
    }

    function GetCategory() {
        return $this->data['category'];
    }

    function GetTimeWriting() {
        return $this->data['timeWriting'];
    }

    function GetContent() {
        return $this->data['content'];
    }

    function GetLikeNum() {
        return $this->data['likeNum'];
    }

    function GetCommentNum() {
        return $this->data['commentNum'];
    }

    function GetViewNum() {
        return $this->data['ViewNum'];
    }

    function GetTags() {
        return $this->data['tags'];
    }
    
    function GetvisibilityToUser(){
        return $this->data['visibilityToUser'];
    }

    function __construct($data) {
        $this->data = $data;
    }

    /**
     * @param type $connectDBObj
     * @param type $nArticleID
     * @return \self
     */
    static function fetchByArticleID($connectDBObj, $nArticleID) {
        $cArticle = null;
        $szSql = "SELECT * FROM " . self::TABLE_NAME . " WHERE articleID = $nArticleID";
        $stmt = $connectDBObj->prepare($szSql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultData = $stmt->fetchAll();
        $cArticle = new self($resultData[0]);

        return $cArticle;
    }

    /**
     * Create new one
     * @param type $connectDBObj
     * @param type $szWriterIPAddress
     * @param type $szTitle
     * @param type $nCategory
     * @param type $szContent
     * @param type $szImageIDChain
     * @param type $szTags
     * @param type $szCond
     * @return type
     */
    static function CreateNew(
            $connectDBObj, 
            $nWriterID, 
            $szTitle,
            $szBriefContent,
            $nCategory,
            $szTimeWriting,
            $szContent,
            $nLikeNum,
            $nCommentNum,
            $nViewNum, 
            $szTags, 
            $nVisibilityToUser,
            $szCond="") {
        $szSql = " insert into " . self::TABLE_NAME . " set"
                . "  writerID = '$nWriterID'"
                . ", title = '$szTitle'"
                . ", briefContent = '$szBriefContent'"
                . ", category = '$nCategory'"
                . ", timeWriting = '$szTimeWriting'"
                . ", content = '$szContent'"
                . ", likeNum = '$nLikeNum'"
                . ", commentNum = '$nCommentNum'"
                . ", viewNum = '$nViewNum'"
                . ", tags = '$szTags'"
                . ", visibilityToUser = '$nVisibilityToUser'"
                . "" . $szCond;
        
        return $connectDBObj->exec($szSql);
    }

    /**
     * Return number of rows effect
     * @param type $connectDBObj
     * @param type $aKeyValuePairs
     * @param type $szCondition
     * @return type
     */
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
