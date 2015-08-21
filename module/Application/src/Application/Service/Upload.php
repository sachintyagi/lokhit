<?php 
namespace Application\Service;
 
class Upload
{
	public function uploadFile($field_name,$destination)
    {
        $resultArr = array();
        
        $adapter = new \Zend\File\Transfer\Adapter\Http();
		$files = $adapter->getFileInfo();
		
		$postFileName = $field_name; 
		$File = $files[$postFileName];
		$fileinfo = $this->getFileInfo($File['name']);
		$this->randString = $this->getRandomName('5').time();
		$newname = $this->randString.'.'.$fileinfo['ext'];				
		$adapter->addFilter('Rename', 
			array(
				'target' => $destination .'/'. $newname, 
				'overwrite' => false ), 
			$postFileName);
		
		if(!$adapter->isValid()) {
			$resultArr = array("errorMessage" => $adapter->getMessages(),"status" => "failure");
		} else {
			try {
			    $adapter->receive($postFileName);
				$resultArr = array(
				                    "status"    => "success",
				                    "uniqueName"=> $newname,
				                    "fileName"  => $File['name'],
				                    "extension" => $fileinfo['ext'],
				                    "mimeType"  => $adapter->getMimeType(),
				                    "fileSize"  => $adapter->getFileSize()
				                    );				
			} catch (\Zend\Filter\Exception\InvalidArgumentException $e) {
			    $resultArr=array("errorMessage" => $e->getMessage(),"status" => "failure");
			}
		}
		return $resultArr;
    }
	
	/***
	 *  Function Name	:	multipleUpload()
	 *	Description		:	It will Return File Name array and mime type array on successfull full upload
	 *	Author			:	Hardeep Sharma
	 *	Date			:	21/05/2014
	***/  
    public function multipleUpload($destination)
    {
        $resultArr = array();
        $adapter = new \Zend\File\Transfer\Adapter\Http();
		$files = $adapter->getFileInfo();
					
		$i = 1;
		foreach($files as $key => $file) {
		    $filename = $file["name"];
		    $fileinfo = $this->getFileInfo($file["name"]);
		    $newname = $this->getRandomName('10').time().$i.'.'.$fileinfo['ext'];
		    $mime = $this->getMimeType($file['tmp_name']);
			if(move_uploaded_file($file['tmp_name'],$destination.'/'.$newname)) {		        
				$resultArr[$i]["uniqueName"] = $newname;
				$resultArr[$i]["fileName"] = $file["name"];
				$resultArr[$i]["extension"] = $fileinfo['ext'];
				$resultArr[$i]["mimeType"] = $file["type"];
				$resultArr[$i]["fileSize"] = $file["size"];
			} else {
				$resultArr["status"] = "failure";
				$resultArr["message"][$file["name"]] = "Invalid File";
			}
			$i++;
		}
		return $resultArr;
    }
	
	function getRandomName($len=null) { 
		if($len=="") { $len = 5; }
		$rmstr = "";
 	 	$salt = "AB0123FGHPRS678TUVW45XYZabcdefghiJKjklmnopqrLMNstuvwxyzCDE"; 
  		srand((double)microtime()*1000000); 
		for($i = 0;$i < $len;$i++) { 
			$num = rand() % 56; 
			$tmp = substr($salt, $num, 1); 
			$rmstr .= $tmp; 
		} 
		return $rmstr; 
	}
	
	function getFileInfo($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
		$name = substr($str,0,$i);
		$name = str_replace(' ','_',$name);
        return array('ext'=>$ext,'name'=>$name);
    }
}