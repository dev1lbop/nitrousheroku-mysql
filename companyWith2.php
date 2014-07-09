<?php
/*

*	File:			companyWith2.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script uses a dropdown to select a company from tCompany
*		tests it with isset and displays company details
*		with a list of people associated
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../../htconfig/dbConfig.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
		if (!isset($_POST["companyID"])) {
		 $_POST["companyID"] = -99; 
		 }
		$companyID = $_POST["companyID"];
	//if (isset($companyID) AND $companyID > 0){

			//  vvvvvvv  This is most of the contents of  vvvvvvv
			//  vv            companyListPeople.php            vv  
			
			{	//  Get the details of the company selected 
										
					$tCompany_SQLselect = "SELECT * ";
					$tCompany_SQLselect .= "FROM ";
					$tCompany_SQLselect .= "tCompany ";
					$tCompany_SQLselect .= "WHERE ID = '".$companyID."' ";
					
					$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
					
					while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
						$preName = $row['preName'];
						$companyName = $row['Name'];
						$RegType = $row['RegType'];
						
						$fullCoyName = trim( "$companyName");
						$StreetA = $row['StreetA'];
				}
					
					mysql_free_result($tCompany_SQLselect_Query);			
			}
			
			{	//  Get the details of all associated Person records
				//		and store in array:  personArray  with key >$indx
				 
					$indx = 0;
				
					$tPerson_SQLselect = "SELECT * ";
					$tPerson_SQLselect .= "FROM ";
					$tPerson_SQLselect .= "tPerson ";
					$tPerson_SQLselect .= "WHERE companyID = '".$companyID."' ";
					
					$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);	
					
					while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
						
						$personArray[$indx]['Population'] = $row['Population'];
						$personArray[$indx]['Policies'] = $row['Policies'];
						$personArray[$indx]['Points of Contact'] = $row['Points of Contact'];
						$personArray[$indx]['Companies in Energy'] = $row['Companies in Energy'];
							
						$indx++;			 
					}
					
					mysql_free_result($tPerson_SQLselect_Query);			
			}
			
			{	//		Output 
				//		Remember ^^   these braces are for teaching purposes only
				//							and are not a necessary part of the php code
				
					$tdOdd = 'style = "background-color: #FF8F8F;"';
					$tdEven = 'style = "background-color: #76E9FF;"';
				//	$table1Name = 'Burkina Faso';
					echo '<div style=" font-family: arial, helvetica, sans-serif; ">';
		
							echo 	  '<table>
											<tr valign="top">								
												<td style=" font-size: 24; 
																font-weight: bold;" 
																>
														'.$fullCoyName.'
												</td>
												
											</tr>
										</table>';
							  echo '<div style="margin-left: 100; ">';
								echo '<table border="1" padding="5">';
								echo '<tr>
											<td>Population</td>
											<td>FirstName</td>
											<td>LastName</td>
											<td>Telephone</td>
										</tr>	';	
									//	$indx = 0;		
											$numPersons = sizeof($personArray);
								for ($indx = 0; $indx < $numPersons; $indx++) {
								if (($indx % 2) == 1) {$rowClass = $tdOdd; } else{ $rowClass = $tdEven;}  
		 							echo '<tr '.$rowClass.'>
												<td>
												'.$personArray[$indx]['Population'].'
												</td>
												
												<td>
												'.$personArray[$indx]['Policies'].'
												</td>
		
												<td>
												'.$personArray[$indx]['Points of Contact'].'
												</td>
		
												<td>
												'.$personArray[$indx]['Companies in Energy'].'
												</td>
												
											</tr>	';			     
								}
								
								echo '</table>';
							echo '</div>';		//		END:  <div style="margin-left: 100; ">
					echo '</div>';				//		END:	<div style=" font-family...">
						}					
					//		END: first Output section 
														
			//  vvvvvvv  This is exactly the contents of  vvvvvvv
			//  vv            companySelect.php            vv  

			{	//	Select company from dropdowm
				
				$tCompany_SQLselect = "SELECT  ";
				$tCompany_SQLselect .= "ID, preName, Name ";	
				$tCompany_SQLselect .= "FROM ";
				$tCompany_SQLselect .= "tCompany ";
				$tCompany_SQLselect .= "Order By Name ";
				$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
				
				echo '<form action="companyWith2.php" method="post">';
				
				echo '<select name="companyID">';
				
					echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';
			 			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
						    $ID = $row['ID'];
						    $preName = $row['preName'];
						    $companyName = $row['Name'];
						    $RegType = $row['RegType'];
						    
						    $fullCoyName = trim("$companyName");
						    
						    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>';
						}
					
						mysql_free_result($tCompany_SQLselect_Query);		
				
						echo '</select>';
							
						echo '<input type="submit" />';
						
				echo '</form>';
				//	END:  Select company from dropdowm
			}
		}		
		//		END:	if ($dbSuccess)
echo "<br /><hr /><br />";
unset($companyID);
echo '<a href="companyWithPeople.php">Select Another</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="../index.php">Quit - to homepage</a>';



?>