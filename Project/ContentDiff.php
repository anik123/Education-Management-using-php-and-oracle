<?php

class ContentDiff 
{ 
      
    var    $fileOld="temp/"; 
    var $fileNew="temp/"; 
    var $handleOld; 
    var $handleNew; 
    var $styleOld=' style="text-decoration: line-through;color:red;"  ';   //for convinience default decoration is assigned 
    var $styleNew=' style="color:blue;" ';   //for convinience default decoration is assigned 
    var $oldContentTEXT;       //place holder for oldContent 
    var $newContentTEXT;       //place holder for newContent 
    var $newText=""; 
      
    /* 
    * Constructor will accept four parameters 
    * $oldContent -------------  place holder for an old text 
    * $newContent -------------  place holder for a new text 
    * $styleOld   -------------  place holder for the old style (i.e. css class name, class="oold") 
    * $styleNew   -------------  place holder for the new style (i.e. css class name, class="new") 
    */ 
      
    function ContentDiff($oldContent, $newContent, $styleOld="",$styleNew="") 
    { 
        $this->fileOld=$this->fileOld."old_".rand() ; 
        $this->fileNew=$this->fileNew."new_".rand(); 
        $this->handleOld = fopen($this->fileOld,'w'); 
        $this->handleNew = fopen($this->fileNew,'w');          
        if (!empty($styleOld)) 
            $this->styleOld = $styleOld; 
        if (!empty($styleNew)) 
            $this->styleNew = $styleNew; 
              
        $this->oldContentTEXT = $oldContent; 
        $this->newContentTEXT = $newContent; 
          
          
    } 
      
    function showDifference() 
    { 
        $success = false; 
        if (!$this->isOldContent()) 
            return true; 
                  
        if ($this->oldContentTEXT==$this->newContentTEXT) 
        { 
            $this->newText = $this->newContentTEXT; 
            return true; 
        } 
          
        if ($this->writeContentToFile($this->oldContentTEXT,$this->newContentTEXT)) 
            $success = true; 
              
        $mergedLines = $this->mergeTwoFiles(); 
        $this->deleteFiles(); 
        if($this->convertToText($mergedLines)) 
            $success = true; 
        return $success;          
    } 
      
    function isOldContent() 
    {              
        if (!empty($this->oldContentTEXT)) 
            return true; 
        else 
            return false;                  
    } 
      
      
    function writeContentToFile($oldContent,$newContent) 
    { 
        $success = true; 
        if (fwrite($this->handleOld, $oldContent ) === FALSE) { 
            $this->messages[] = array("error"=>true,"message"=>"Cannot write old content to the file for merging",);                                  
            $success = false; 
        } 
  
        if (fwrite($this->handleNew, $newContent ) === FALSE) { 
            $this->messages[] = array("error"=>true,"message"=>"Cannot write new content to file for merging",);      
            $success = false; 
        } 
          
        fclose($this->handleOld); 
        fclose($this->handleNew); 
          
        return $success; 
    } 
      
    function mergeTwoFiles() 
    { 
        //diff options 
        $diffOpts .= " -aBbHiws --minimal --ignore-blank-lines --ignore-space-change "; 
        $diffOpts .= "--new-line-format='<font ".$this->styleNew.">%l</font>n' "; 
        $diffOpts .= "--old-line-format='<font ".$this->styleOld.">%l</font>n' ";  
        exec("diff ". $diffOpts.$this->fileOld." ".$this->fileNew." 2>&1",$report,$return_val); 
        return $report; 
    } 
      
    function convertToText($lineArray) 
    { 
        $newText=""; 
        foreach($lineArray as $line) 
            $newText.=$line."n"; 
          
        $this->newText = $newText; 
        if (!empty($this->newText)) 
            return true; 
        else 
            return false; 
    } 
      
    function deleteFiles() 
    { 
        unlink($this->fileOld); 
        unlink($this->fileNew); 
    } 
} 
//end of class 

?> 