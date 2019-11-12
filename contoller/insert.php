
<?php

include_once 'db.php';

class insert extends dbconnect
{



	//function date validates input against special character
	public function input_validation($input)
	{
		return htmlentities(htmlspecialchars(stripcslashes(trim($input))));
	}
	
	//function that registers members
	public function registerNewMember()
	{
			if(isset($_POST['signup'])):
				 //$admin_status = "main admin";
				 $member_id = 'AE-Funai'.'/'.'Coop'.'/'.rand(0,1000);
				// $member_status = "fully ";
				 $fname = $this->input_validation($_POST["m_name"]);
				 $email = $this->input_validation($_POST['m_email']);
				 $password = $this->input_validation($_POST['m_pass']);
				 $phone = $this->input_validation($_POST['m_phone']);
				  $newpass = password_hash($password , PASSWORD_DEFAULT);
				  $queryForSelect = "SELECT 1 FROM registered_members WHERE member_email = :email";
				  $sqlForSelect = $this->conn->prepare($queryForSelect);
				  $sqlForSelect->execute([':email' => $email ]);

				 
				  if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
				  }else{
				  	$query = "INSERT INTO registered_members(member_id,member_name,member_email,member_password,member_phone) VALUES(?,?,?,?,?)";
					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$member_id,$fname, $email, $newpass, $phone]);
					 if ( $feedback) {
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }

				  }
			endif;
			 
	}


	//function that checks if user exit and  send a reset link to the user email to change password
	public function ResetPassword()
	{
		if (isset($_POST['reset'])):
		
		$member_email = $_POST['member_email'];	

		$queryForSelect = "SELECT 1 FROM registered_members WHERE member_email  = ?";
		  $sqlForSelect = $this->conn->prepare($queryForSelect);
		  $sqlForSelect->execute([$member_email]);	
		  $res = $sqlForSelect->fetchColumn();	  
			if ($res):

				//$link = '<a href="changepassword.php?change=$res["member_id"]">change password</a>';

				// $emailfrom = "FunaiCoop@gmail.com";
				// 	$EmailTo = $member_email;
				// 	$Subject = "FUNAI COOP PLATFORM";
				//	$message = "Click the link to reset your password ".$link;
				// 	// prepare email body text
				// 	$Body = "";
				// 	$Body .= "Identification: ";
				// 	$Body .= $res[member_id];
				// 	$Body .= "\n";
				// 	$Body .= "Email: ";
				// 	$Body .= $emailfrom;
				// 	$Body .= "\n";
				// 	$Body .= "Subject: ";
				// 	$Body .= $Subject;
				// 	$Body .= "\n";
				// 	$Body .= "Message: ";
				// 	$Body .= $message;
				// 	$Body .= "\n";

				 //mail($EmailTo, $Subject, $Body, "From:".$emailfrom);
				
				return "user_registered";

		  	else:

		  		return "not_registered"; 
		  		
		  	endif;

		 endif;
	}


	//function that updates user password
	public function	newPassword($id){

		if (isset($_POST['new_pass'])) {

			$newpass = $_POST['new_password'];

			 $newpassword = password_hash($newpass , PASSWORD_DEFAULT);

			$sql = "UPDATE registered_members SET member_password = '$newpassword' WHERE member_id = '$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{

				return 'failed';
				echo error();
			}
		}
	}


		// function for admin registeration 
	public function registerAdmin()
	{
			if(isset($_POST['signup'])):
				 //$admin_status = "main admin";
				 $member_id = 'AE-Funai'.'/'.'Coop'.'/'.'Admin'.'/'.rand(0,1000);
				// $member_status = "fully ";
				 $fname = $this->input_validation($_POST["m_name"]);
				 $email = $this->input_validation($_POST['m_email']);
				 $password = $this->input_validation($_POST['m_pass']);
				 $phone = $this->input_validation($_POST['m_phone']);
				  $newpass = password_hash($password , PASSWORD_DEFAULT);
				  $queryForSelect = "SELECT 1 FROM registered_admin WHERE admin_email = :email";
				  $sqlForSelect = $this->conn->prepare($queryForSelect);
				  $sqlForSelect->execute([':email' => $email]);

				  $status = "main admin";

				 
				  if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
				  }else{
				  	$query = "INSERT INTO registered_admin(admin_id, admin_name, admin_email, admin_password, admin_phone, admin_status) VALUES (?,?,?,?,?,?)";

					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$member_id,$fname, $email, $newpass, $phone, $status]);
					 if ( $feedback) {
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }

				  }
			endif;
			 
	}



	// funtion that allows users to become full registered member	
	public function add_member($member_id){

				if (isset($_POST['add_member'])) {

					$member_name = $_POST['m_name'];

					$member_gender = $_POST['m_gender'];

					$member_department = $_POST['m_dapart'];

					$member_designation = $_POST['m_desg'];

					$member_phone = $_POST['m_phone'];

					$member_category = $_POST['m_categ'];

					$member_next_of_kin_name = $_POST['m_nok'];

					$member_next_of_kin_occupation = $_POST['m_ocup'];


					$member_next_of_kin_address  = $_POST['m_aonok'];

					$member_next_of_kin_phone =$_POST['m_nok_phone'];

					//$member_passport = $_POST['m_passport'];

					$member_passport_name = $_FILES['m_passport']['name'];

					$member_passport_size = $_FILES['m_passport']['size'];

					$member_passport_tmp = $_FILES['m_passport']['tmp_name'];
					
					$target_file = "./member_passport/".$_FILES['m_passport']['name'];


					$member_deduce_amount = $_POST['m_d_amount'];

					$member_signature = $_POST['m_signature'];

					 if($member_passport_size > 50000):

						return "too_large";

					  	else:
						  	$query = "INSERT INTO fully_regitered_members(member_name,member_gender,member_department,member_designation,member_phone,member_category, member_next_of_kin_name,member_next_of_kin_occupation,member_next_of_kin_address,member_next_of_kin_phone, member_passport, member_deduce_amount,member_signature,member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
							 $sql = $this->conn->prepare($query);
							 $feedback = $sql->execute([$member_name,$member_gender,$member_department,$member_designation,$member_phone,$member_category,$member_next_of_kin_name,$member_next_of_kin_occupation,$member_next_of_kin_address,$member_next_of_kin_phone,$member_passport_name,$member_deduce_amount,$member_signature,$member_id]);
							 if ( $feedback) {
							 	move_uploaded_file($member_passport_tmp, $target_file);
							 	header('location:index.php'.'?'.'message=success');
							 	return 'success';
							 }else{

							 	echo error();
							 	return 'failed to upload';

							 }

						endif;
					  		
					 }
	}


//function that allows admin to register users

public function admin_add_member(){

				if (isset($_POST['add_member'])) {

				
				 	$email = $this->input_validation($_POST['m_email']);
				 	$password = $this->input_validation($_POST['m_pass']);
				 
					 $newpass = password_hash($password , PASSWORD_DEFAULT);
					 

					$member_id = 'AE-Funai'.'/'.'Coop'.'/'.rand(0,1000);

					$member_name = $_POST['m_name'];

					$member_gender = $_POST['m_gender'];

					$member_department = $_POST['m_dapart'];

					$member_designation = $_POST['m_desg'];

					$member_phone = $_POST['m_phone'];

					$member_category = $_POST['m_categ'];

					$member_next_of_kin_name = $_POST['m_nok'];

					$member_next_of_kin_occupation = $_POST['m_ocup'];


					$member_next_of_kin_address  = $_POST['m_aonok'];

					$member_next_of_kin_phone =$_POST['m_nok_phone'];

					//$member_passport = $_POST['m_passport'];

					$member_passport_name = $_FILES['m_passport']['name'];

					$member_passport_size = $_FILES['m_passport']['size'];

					$member_passport_tmp = $_FILES['m_passport']['tmp_name'];
					
					$target_file = "./member_passport/".$_FILES['m_passport']['name'];


					$member_deduce_amount = $_POST['m_d_amount'];

					$member_signature = $_POST['m_signature'];

					 $queryForSelect = "SELECT 1 FROM registered_members WHERE member_email = :email";
					  $sqlForSelect = $this->conn->prepare($queryForSelect);
					  $sqlForSelect->execute([':email' => $email ]);


					 if($member_passport_size > 50000):

						return "too_large";

					  	else:


					  		 if ($sqlForSelect->fetchColumn()) {
							  	return "userfound";
							  }else{
							  	$query = "INSERT INTO registered_members(member_id,member_name,member_email,member_password,member_phone) VALUES(?,?,?,?,?)";
								 $sql = $this->conn->prepare($query);
								 $feedback = $sql->execute([$member_id,$member_name, $email, $newpass, $member_phone]);
								 if ( $feedback) {
								 		$query = "INSERT INTO fully_regitered_members(member_name,member_gender,member_department,member_designation,member_phone,member_category, member_next_of_kin_name,member_next_of_kin_occupation,member_next_of_kin_address,member_next_of_kin_phone, member_passport, member_deduce_amount,member_signature,member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
										 $sql = $this->conn->prepare($query);
										 $getfeedback = $sql->execute([$member_name,$member_gender,$member_department,$member_designation,$member_phone,$member_category,$member_next_of_kin_name,$member_next_of_kin_occupation,$member_next_of_kin_address,$member_next_of_kin_phone,$member_passport_name,$member_deduce_amount,$member_signature,$member_id]);
										 if ($getfeedback) {
										 	move_uploaded_file($member_passport_tmp, $target_file);
										 	//header('location:index.php'.'?'.'message=success');
										 	return 'success';
										 }else{
										 	return 'failed';
										 }
								 	}else{		

								 	return 'nope';
								 }

							  }
						 endif; 	
					}  		
			 
	}


	//funtion that allows users to apply for mandate

	public function mandate_form()
	{

		if (isset($_POST['submit_mandate_form'])):

		$member_name = $_POST['member_name'];

		$member_id = $_POST['member_id'];

		$member_department = $_POST['member_department'];

		$member_dof_joining =$_POST['member_dof_joining'];

		$member_salary_grade_level = $_POST['member_grade_level'];

		$member_paying_subs_load = $_POST['member_subs_load'];

		$member_balance = $_POST['member_balance'];

		$member_prev_deduction = $_POST['member_prev_deduction'];

		$member_new_mandate = $_POST['member_new_mandate'];

		$member_signature = $_POST['member_signature'];

		$status = 'Pending';


			
		$query = "INSERT INTO mandate_form(member_name, member_id, member_department, member_dof_joining, member_salary_grade_level, member_paying_subs_load, member_balance, member_prev_deduction, member_new_mandate, member_signature,mandate_status)VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		 $sql = $this->conn->prepare($query);
		 $feedback = $sql->execute([$member_name,$member_id,$member_department,$member_dof_joining,$member_salary_grade_level,$member_paying_subs_load,$member_balance,$member_prev_deduction,$member_new_mandate,$member_signature,$status]);

		 if ($feedback) {
		 	
		 	return 'success';
		 }else{
		 	return 'nope';
		 	echo error();
		 }

		endif;
	}


	//funtion that allows users to apply for thrift form
	public function submit_thrift_form()
	{

		if (isset($_POST['submit_thrift_form'])):

		$member_name = $_POST['member_name'];

		$member_department = $_POST['member_department'];

		$member_phone = $_POST['member_phone'];

		$member_category = $_POST['member_category'];

		$member_designation = $_POST['member_designation'];

		$member_next_of_kin_name = $_POST['member_nof_kin_name'];

		$member_next_of_kin_add = $_POST['member_nof_kin_add'];

		$member_next_of_kin_phone = $_POST['member_nof_kin_phone'];

		$member_date_of_joining = $_POST['dof_of_joining'];

		$member_id = $_POST['member_id'];

		$member_salary_scale = $_POST['member_salary_scale'];

		$member_salary_scale_level = $_POST['member_salary_scale_level'];

		$member_salary_scale_step = $_POST['member_salary_scale_step'];

		$member_monthly_contribute = $_POST['member_monthly_contribute'];

		$member_month_to_start_contribution = $_POST['member_month_to_start_contribution'];

		$member_signnature = $_POST['member_sign'];


		$query = "INSERT INTO thrift_form(	member_name,member_department, member_phone, member_category, member_designation, member_next_of_kin_name, member_next_of_kin_add, member_next_of_kin_phone, member_date_of_joining, member_id, member_salary_scale, member_salary_scale_level, member_salary_scale_step, member_monthly_contribute, member_month_to_start_contribution, member_signnature) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		 $sql = $this->conn->prepare($query);
		 $feedback = $sql->execute([$member_name,$member_department,$member_phone,$member_category,$member_designation,$member_next_of_kin_name,$member_next_of_kin_add,$member_next_of_kin_phone,$member_date_of_joining,$member_id,$member_salary_scale,$member_salary_scale_level,$member_salary_scale_step,$member_monthly_contribute,$member_month_to_start_contribution,$member_signnature]);

		  if ($feedback) {
		 	
		 	return 'success';
		 }else{
		 	return 'nope';
		 	echo error();
		 }

		endif;
	}

   
	// function that allows admin to credit user account 
	public function credit_account($member_id,$member_email)
	{
		
		if (isset($_POST['credit'])):

		 $queryForSelect = "SELECT 1 FROM member_account  WHERE member_id  = ?";
					  $sqlForSelect = $this->conn->prepare($queryForSelect);
					  $sqlForSelect->execute([$member_id]);
		if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
		}else{

			$date_of_credit = date("Y".'-'."d".'-'."w");
		
			$amount = $_POST['amount'];
			$sql = "INSERT INTO member_account(member_id, amount_credited, date_of_credit) VALUES (?,?,?) ";
			$query = $this->conn->prepare($sql);
			$feedback = $query->execute([$member_id,$amount,$date_of_credit]);

			if ($feedback) {

			

			$sql = "UPDATE fully_regitered_members SET last_date_of_credit = ?";
			$query = $this->conn->prepare($sql);
			$query->execute([$date_of_credit]);


				// $emailfrom = "FunaiCoop@gmail.com";
				// 	$EmailTo = $member_email;
				// 	$Subject = "FUNAI COOP PLATFORM";
				// 	$message = "Credit alert, ".$member_id." Account Is Credited with ".$amount;
				// 	// prepare email body text
				// 	$Body = "";
				// 	$Body .= "Identification: ";
				// 	$Body .= $member_id;
				// 	$Body .= "\n";
				// 	$Body .= "Email: ";
				// 	$Body .= $emailfrom;
				// 	$Body .= "\n";
				// 	$Body .= "Subject: ";
				// 	$Body .= $Subject;
				// 	$Body .= "\n";
				// 	$Body .= "Message: ";
				// 	$Body .= $message;
				// 	$Body .= "\n";

				// mail($EmailTo, $Subject, $Body, "From:".$emailfrom);
				
				
				return 'success';
			}else{

				return 'nope';
			}
		}
		
		
		endif;

	}


	//function that allow users to apply for loan

	public function submit_loan_form($member_id,$member_signature)
	{

		if (isset($_POST['submit_loan_form'])):

			$member_new_mandate = $_POST['member_new_mandate'];

			$member_load_amount = $_POST['member_load_amount'];

			$member_load_repayment_plan = $_POST['member_load_repayment_plan'];

			$member_load_repayment_month = date("F".' - '."Y",strtotime($_POST['member_load_repayment_month']));

			$member_bank_name = $_POST['member_bank_name'];

			$member_bank_branch = $_POST['member_bank_branch'];


			$member_acc_name = $_POST['member_acc_name'];

			$member_acc_num = $_POST['member_acc_num'];

			//$member_signature = $_POST['member_signature'];

			$name_of_mem_first_guarantor = $_POST['name_of_mem_first_guarantor'];

			$sign_of_mem_first_guarantor = $_POST['sign_of_mem_first_guarantor'];

			$phone_of_mem_first_guarantor = $_POST['phone_of_mem_first_guarantor'];

			$name_of_mem_sec_guarantor = $_POST['name_of_mem_sec_guarantor'];

			$sign_of_mem_sec_guarantor = $_POST['sign_of_mem_sec_guarantor'];

			$phone_of_mem_sec_guarantor = $_POST['phone_of_mem_sec_guarantor'];

			$member_loan_satus = "Pending";




			
		$sql = "INSERT INTO loan_form(member_new_mandate, member_load_amount, member_load_repayment_plan, member_load_repayment_month, member_bank_name, member_bank_branch, member_acc_name, member_acc_num, member_signature, name_of_mem_first_guarantor, sign_of_mem_first_guarantor, phone_of_mem_first_guarantor, name_of_mem_sec_guarantor, sign_of_mem_sec_guarantor, phone_of_mem_sec_guarantor, member_loan_satus, member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$query = $this->conn->prepare($sql);

				        $feedback = $query->execute([$member_new_mandate,$member_load_amount,$member_load_repayment_plan,$member_load_repayment_month,$member_bank_name,$member_bank_branch,$member_acc_name,$member_acc_num,$member_signature,$name_of_mem_first_guarantor,$sign_of_mem_first_guarantor,$phone_of_mem_first_guarantor,$name_of_mem_sec_guarantor,$sign_of_mem_sec_guarantor,$phone_of_mem_sec_guarantor,$member_loan_satus,$member_id]);

						if ($feedback):
							
						  	return "success";
						else:

						
							return "nope";


			
						endif;

		endif;
	}

	
	//function that allows admin to approve loan for user
	public function	LoanIsApproved($l_id){

		if (isset($_POST['approve'])) {

			$status = 'Approved';

			$sql = "UPDATE loan_form SET member_loan_satus = '$status' WHERE id = '$l_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'successful';
			}
		}
	}

//function that allows admin to approve loan for user
	public function	changebadge($member_id){

		if (isset($_POST['changebadge'])) {

			$status = 'seen_by_member';

			$sql = "UPDATE message SET status = '$status' WHERE member_id = '$member_id'";
			$query = $this->conn->prepare($sql);
			 $query->execute();
			
		}
	}


//function that allows admin to approve mandate from for user
	public function	MandateIsApproved($id){

		if (isset($_POST['approve'])) {

			$status = 'Approved';

			$sql = "UPDATE mandate_form SET mandate_status = '$status' WHERE id = '$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{
				return 'nope';
			}
		}
	}

//function that allows admin to delete User
public function	Delete_user($id){

		if (isset($_POST['delete'])) {

			$sql = "DELETE FROM fully_regitered_members WHERE member_id='$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{
				return 'nope';
			}
		}
	}

//function that allow admin to decline a loan
public function	LoanIsDecline($l_id){

		if (isset($_POST['decline'])) {

			$status = 'Decline';

			$sql = "UPDATE loan_form SET member_loan_satus = '$status' WHERE id = '$l_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'decline';
			}
		}
	}

//function that allow admin to reply message
	public function	AdminReply($m_id){

		if (isset($_POST['reply'])) {

			$message = $_POST['message'];

			$status = 'seen';

			$sql = "UPDATE message SET admin_reply = '$message', status = '$status' WHERE id = '$m_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'successful';
			}else{
				return 'nope';
			}
		}
	}


	

//funtion that allows users to send message to admin
 public function messageAdmin($member_id,$member_name)
 {
 	if (isset($_POST['message'])) {

 		$status = 'new';

 		$member_message = $_POST['member_message'];

 		$Subject = $_POST['subject'];
 		
 		$sql = "INSERT INTO message(member_name, message_subject, member_message, status, member_id) VALUES (?,?,?,?,?)";
 		$query = $this->conn->prepare($sql);
 		$res = $query->execute([$member_name,$Subject,$member_message,$status,$member_id]);

 		if ($res):
 			return 'sent';
 		else:
 			return "failed";
 		endif;
 		
 	}
 }


	


}


?>