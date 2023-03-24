<?php 
function recorded_data($tableName, $cacheSeconds = 10) {

    if(Cache::has('recordedData_' . $tableName)) {
        return Cache::get('recordedData_' . $tableName);
    } else {
        $recordedData = db($tableName)->get()->toArray();
        $refactoringRecordedData = [];
        foreach($recordedData AS $row => $data) {
            foreach($data AS $column => $value) {
                if(!isset($refactoringRecordedData[$column])) {
                    $refactoringRecordedData[$column] = [];
                } else {
                    if($value!="") {
                        if(!in_array($value, $refactoringRecordedData[$column])) {
                            $refactoringRecordedData[$column][] = $value;
                        }
                    }
                }
            }
            
            
        }
    
        Cache::put('recordedData_' . $tableName, $refactoringRecordedData, $seconds = $cacheSeconds);
        return $refactoringRecordedData;

    }
    

    
    
}
?>