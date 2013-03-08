<?php
	 FUNCTION DateSelector($inName, $useDate=0) 
    { 
        /* create array so we can name months */ 
        $monthName = ARRAY(1=> "1月", "2月", "3月", 
            "4月", "5月", "6月", "7月", "8月", 
            "9月", "10月", "11月", "12月"); 
 
        /* if date invalid or not supplied, use current time */ 
        IF($useDate == 0) 
        { 
            $useDate = TIME(); 
        } 
 
        /* make month selector */ 
        ECHO "<SELECT NAME=" . $inName . "Month>\n"; 
        FOR($currentMonth = 1; $currentMonth <= 12; $currentMonth++) 
        { 
            ECHO "<OPTION VALUE=\""; 
            ECHO INTVAL($currentMonth); 
            ECHO "\""; 
            IF(INTVAL(DATE( "m", $useDate))==$currentMonth) 
            { 
                ECHO " SELECTED"; 
            } 
            ECHO ">" . $monthName[$currentMonth] . "\n"; 
        } 
        ECHO "</SELECT>"; 
 
        /* make day selector */ 
        ECHO "<SELECT NAME=" . $inName . "Day>\n"; 
        FOR($currentDay=1; $currentDay <= 31; $currentDay++) 
        { 
            ECHO "<OPTION VALUE=\"$currentDay\""; 
            IF(INTVAL(DATE( "d", $useDate))==$currentDay) 
            { 
                ECHO " SELECTED"; 
            } 
            ECHO ">$currentDay\n"; 
        } 
        ECHO "</SELECT>"; 
 
        /* make year selector */ 
        ECHO "<SELECT NAME=" . $inName . "Year>\n"; 
        $startYear = DATE( "Y", $useDate); 
        FOR($currentYear = $startYear - 2; $currentYear <= $startYear+5;$currentYear++) 
        { 
            ECHO "<OPTION VALUE=\"$currentYear\""; 
            IF(DATE( "Y", $useDate)==$currentYear) 
            { 
                ECHO " SELECTED"; 
            } 
            ECHO ">$currentYear\n"; 
        } 
        ECHO "</SELECT>"; 
 
    } 

?>