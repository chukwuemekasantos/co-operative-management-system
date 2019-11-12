<?php
include_once 'db.php';

class select extends dbconnect
{
	
	//function that check user and admin for login
	public function loginUser()
	{
		if (isset($_POST['login'])) {

			$email  = $_POST['m_email'];
			$pass = $_POST['m_pass'];


			$query = "SELECT * FROM registered_members WHERE member_email = :email"; 

			$query_admin = "SELECT * FROM registered_admin WHERE admin_email = :email";

			$sql = $this->conn->prepare($query);
			$sql->execute([':email' => $email ]);
			$res = $sql->fetch();

			$sql_admin = $this->conn->prepare($query_admin);
			$sql_admin->execute([':email' => $email ]);
			$res_admin = $sql_admin->fetch();


		

				if ($email  == $res['member_email'] AND password_verify($pass,$res['member_password'])) {
				//$_SESSION['username'] = $res['username'];
				$_SESSION['members'] = $res;

				header('location:./member/index.php');



			}else{

					if ($email  == $res_admin['admin_email'] AND password_verify($pass,$res_admin['admin_password'])) {
				
					$_SESSION['admin'] = $res_admin;

					header('location:./admin/index.php');
				
					}else{
				
						return "invaliduser";
					}	

				}

			}
	}


	//function that select users info for profile
	public function userInfo($member_id)
	{
		$queryForSelect = "SELECT * FROM fully_regitered_members WHERE member_id  = ?";
		  $sqlForSelect = $this->conn->prepare($queryForSelect);
		  $sqlForSelect->execute([$member_id]);		  
			$res = $sqlForSelect->fetchAll(PDO::FETCH_ASSOC);
			
			if ($res) {
				
				return $res;
			}
				
	}

	//function that select all users  for admin
	public function reg_users()
	{
		$queryForSelect = "SELECT * FROM fully_regitered_members";
		  $sqlForSelect = $this->conn->prepare($queryForSelect);
		  $sqlForSelect->execute();		  
			$res = $sqlForSelect->fetchAll(PDO::FETCH_ASSOC);
			
			if ($res) {
				
				return $res;
			}
				
	}

	//function that checks if the user is fully registered
	public function checkIfMemberIsReg($member_id)
	{
		$queryForSelect = "SELECT 1 FROM fully_regitered_members WHERE member_id  = ?";
		  $sqlForSelect = $this->conn->prepare($queryForSelect);
		  $sqlForSelect->execute([$member_id]);		  
			if ($sqlForSelect->fetchColumn()):

				return "user_registered";

		  	else:

		  		return "not_registered"; 
		  		
		  	endif;
	}

	//function that select applied loan for admin approval
	public function SelectLoanFormForApproval($id){

		$query = "SELECT * FROM loan_form WHERE id = ?";
            $sql = $this->conn->prepare($query);
            $sql->execute([$id]);
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $res;

	}

	//function that counts approved loan by admin
	public function countApproveLoanForAdmin(){

			$loan_status = "Approved";

			$query = "SELECT count(*) FROM loan_form WHERE member_loan_satus = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$loan_status]);
            $res = $sql->fetchColumn();
            return $res;

	}

	//function that counts decline loan by admin
	public function countDeclineLoanForAdmin(){

			$loan_status = "Decline";

			$query = "SELECT count(*) FROM loan_form WHERE member_loan_satus = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$loan_status]);
            $res = $sql->fetchColumn();
            return $res;

	}

	//function that counts pending loan by admin
	public function countPendingLoanForAdmin(){

			$loan_status = "Pending";

			$query = "SELECT count(*) FROM loan_form WHERE member_loan_satus = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$loan_status]);
            $res = $sql->fetchColumn();
            return $res;

	}


//function that counts approved mandate by admin
	public function countApproveMandateForAdmin(){

			$status = "Approved";

			$query = "SELECT count(*) FROM mandate_form WHERE mandate_status = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$status]);
            $res = $sql->fetchColumn();
            return $res;

	}

//function that counts pending loan by admin
	public function countPendingMandateForAdmin(){

			$status = "Pending";

			$query = "SELECT count(*) FROM mandate_form WHERE mandate_status = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$status]);
            $res = $sql->fetchColumn();
            return $res;

	}

//function that counts decline loan by admin
	public function countDeclineMandateForAdmin(){

			$status = "Decline";

			$query = "SELECT count(*) FROM mandate_form WHERE mandate_status = ? ";
            $sql = $this->conn->prepare($query);
            $sql->execute([$status]);
            $res = $sql->fetchColumn();
            return $res;

	}

	
	//fuction that selects all mandate form for admin 
	public function SelectMandateInfo(){

		$status = 'Pending';

		$query = "SELECT * FROM mandate_form WHERE mandate_status = '$status'";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $res;

	}

	//fuction that selects all thriftform form for admin 
	public function SelectThriftInfo(){

		$query = "SELECT * FROM thrift_form";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $res;

	}
	
	//fuction that selects all messages sent by user for admin 
	public function SelectNewMessagesForAdmin(){

				$status = 'new';

			$query = "SELECT * FROM message WHERE status = ? ORDER BY id DESC";
            $sql = $this->conn->prepare($query);
            $sql->execute([$status]);
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $res;

	}

	//fuction that selects all messages replyed by admin for user 
	public function SelectReplyMessagesForUser($member_id){

		$status = 'seen_by_member';

			$query = "SELECT * FROM message WHERE status = ? AND member_id = ? ORDER BY id DESC";
            $sql = $this->conn->prepare($query);
            $sql->execute([$status,$member_id]);
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $res;

	}


		// function that selects all applied load info for admin to process 
	 public function SelectLoadInfo()
	{
		$pending = "Pending";

		$query = "SELECT fully_regitered_members.member_name, fully_regitered_members.member_phone,fully_regitered_members.member_id, loan_form.id, loan_form.member_load_amount, loan_form.member_load_repayment_plan, loan_form.member_load_repayment_month, loan_form.member_dof_load_apply FROM fully_regitered_members INNER JOIN loan_form ON fully_regitered_members.member_id = loan_form.member_id AND loan_form.member_loan_satus = ?";
		$sql = $this->conn->prepare($query);
		$sql->execute([$pending]);
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	//function that select registered user for admin to credit there account
	 public function SelectUserInfoForCredit()
	{		
		$date =  date('Y'."-"."d".'-'."w");
		//$date = $date + 30;
        $query = "SELECT fully_regitered_members.member_name,fully_regitered_members.member_id, registered_members.member_email  FROM fully_regitered_members INNER JOIN registered_members ON fully_regitered_members.member_id = registered_members.member_id WHERE fully_regitered_members.last_date_of_credit != ?";
		$sql = $this->conn->prepare($query);
		$sql->execute([$date]);
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	// function that generate user account info
	 public function generateReportForCredit($member_id)
	{		

		if (isset($_POST['generate'])) {
			
			$startdate = $_POST['startdate'];

			$enddate = $_POST['enddate'];

			// $query = "SELECT member_account.member_id, member_account.amount_credited FROM member_account FULL OUTER JOIN loan_form ON member_account.member_id = loan_form.member_id ";
		// //$date = $date + 30;
   //      	$query = "SELECT fully_regitered_members.member_name,fully_regitered_members.member_id, registered_members.member_email  FROM fully_regitered_members INNER JOIN registered_members ON fully_regitered_members.member_id = registered_members.member_id WHERE fully_regitered_members.last_date_of_credit != ?";
			$query = "SELECT * FROM member_account WHERE member_id = '$member_id' AND date_of_credit BETWEEN '$startdate' AND '$enddate' ";
		$sql = $this->conn->prepare($query);
		$sql->execute();
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);

		if ($res) {
			
			return $res;
			}else{

			return 'record_not_found';
				}
				
		}
		
	}

	//function that generate report account for approved loan
	 public function generateReportForLoan($member_id)
	{		

		if (isset($_POST['generate'])) {
			
			$startdate = $_POST['startdate'];

			$enddate = $_POST['enddate'];

			// $query = "SELECT member_account.member_id, member_account.amount_credited FROM member_account FULL OUTER JOIN loan_form ON member_account.member_id = loan_form.member_id ";
		// //$date = $date + 30;
   //      	$query = "SELECT fully_regitered_members.member_name,fully_regitered_members.member_id, registered_members.member_email  FROM fully_regitered_members INNER JOIN registered_members ON fully_regitered_members.member_id = registered_members.member_id WHERE fully_regitered_members.last_date_of_credit != ?";
			$query = "SELECT * FROM loan_form WHERE member_id = '$member_id' AND member_dof_load_apply BETWEEN '$startdate' AND '$enddate' ";
		$sql = $this->conn->prepare($query);
		$sql->execute();
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);

		if ($res) {
			
			return $res;
			}else{

			return 'record_not_found';
				}
				
		}
		
	}

	//function that selects approved loan for each user
	 public function SelectUserApprovedLoan($member_id)
	{
		$status = "Approved";

		$query = "SELECT fully_regitered_members.member_name, fully_regitered_members.member_phone,fully_regitered_members.member_id, loan_form.id, loan_form.member_load_amount, loan_form.member_load_repayment_plan, loan_form.member_load_repayment_month, loan_form.member_dof_load_apply FROM fully_regitered_members INNER JOIN loan_form ON fully_regitered_members.member_id = loan_form.member_id WHERE fully_regitered_members.member_id = '$member_id' AND member_loan_satus = '$status'";
		$sql = $this->conn->prepare($query);
		$sql->execute();
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

//function that selects approved mandate for each user
	 public function SelectUserApprovedMandate($member_id)
	{
		$status = "Approved";

		$query = "SELECT  fully_regitered_members.member_name, fully_regitered_members.member_id, fully_regitered_members.member_phone, mandate_form.id,  mandate_form.member_dof_joining, mandate_form.member_balance, mandate_form.member_prev_deduction, mandate_form.member_new_mandate, mandate_form.member_signature, mandate_form.member_dof_apply FROM fully_regitered_members INNER JOIN mandate_form ON fully_regitered_members.member_id = mandate_form.member_id WHERE fully_regitered_members.member_id = '$member_id' AND mandate_status = '$status'";
		$sql = $this->conn->prepare($query);
		$sql->execute();
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	//function that preview user approved loan for printing
	 public function SelectLoanInfoForPrint($member_id,$loan_id)
	{
		$status = "Approved";
		if(isset($_POST['print'])):
			$query = "SELECT fully_regitered_members.member_name, fully_regitered_members.member_phone,fully_regitered_members.member_id, loan_form.id, loan_form.member_load_amount, loan_form.member_load_repayment_plan, loan_form.member_load_repayment_month, loan_form.member_dof_load_apply FROM fully_regitered_members INNER JOIN loan_form ON fully_regitered_members.member_id = loan_form.member_id WHERE fully_regitered_members.member_id = '$member_id' AND member_loan_satus = '$status' AND loan_form.id = '$loan_id'";
			$sql = $this->conn->prepare($query);
			$sql->execute();
			$res = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		endif;
	}


	//function that selects the users mandate info for each user
	public function SelectInfoForMandateForm($member_id)
    {

            $query = "SELECT member_name, member_id, member_department,	member_reg_date, member_deduce_amount, member_signature, member_reg_date FROM fully_regitered_members WHERE member_id = '$member_id'";
            $sql = $this->conn->prepare($query);
            $sql->execute();
            $res = $sql->fetchAll(PDO::FETCH_NUM);
            return $res;
    } 


    //function that selects the users thrift info for each user
    public function SelectInfoForThriftForm($member_id)
    {


    	$query = "SELECT  member_name, member_department, member_designation, member_phone, member_category, member_next_of_kin_name, member_next_of_kin_occupation, member_next_of_kin_address, member_next_of_kin_phone, member_deduce_amount, member_signature, member_id, member_reg_date FROM fully_regitered_members WHERE member_id = '$member_id'";
    	$sql = $this->conn->prepare($query);
            $sql->execute();
            $res = $sql->fetchAll(PDO::FETCH_NUM);
            return $res;
    }


    //function that sums the total contributions of each user
    public function sumOfContribution($member_id){

    	 $stmt = $this->conn->prepare("SELECT SUM(amount_credited) AS sumOfAmount FROM member_account WHERE member_id = '$member_id'");
        $stmt->execute();
        $sum = $stmt->fetch(PDO::FETCH_ASSOC);
        return $sum['sumOfAmount'];

    }


    //function that counts the admin replyed message to each user 
     public function countReplyedMessage($member_id){
         
        
        $status = "seen"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM message WHERE member_id = ? AND status = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


    //function that counts the new message sent to admin
      public function countNewMessage(){
         
         
        $status = "new"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM message WHERE status = ?");
        $stmt->execute([$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


    //function that counts users pending loan
     public function countPendingLoan($member_id){
         
         
        $status = "Pending"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM loan_form WHERE member_id = ? AND member_loan_satus = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


// function that counts users approved loan
    public function countApproveLoan($member_id){
         
         
        $status = "Approved"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM loan_form WHERE member_id = ? AND member_loan_satus = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


    //function that counts users decline loan
    public function countDeclineLoan($member_id){
         
         
        $status = "Decline"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM loan_form WHERE member_id = ? AND member_loan_satus = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


     //function that counts users pending mandate
     public function countPendingMandate($member_id){
         
         
        $status = "Pending"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM mandate_form WHERE member_id = ? AND mandate_status = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


// function that counts users approved loan
    public function countApproveMandate($member_id){
         
         
        $status = "Approved"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM mandate_form WHERE member_id = ? AND mandate_status = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }


    //function that counts users decline loan
    public function countDeclineMandate($member_id){
         
         
        $status = "Decline"; 
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM mandate_form WHERE member_id = ? AND mandate_status = ?");
        $stmt->execute([$member_id,$status]);
        $count = $stmt->fetchColumn();
        return $count;
        
    }
    

    //function that counts total fullyregistered members
     public function countTotalMembers(){
         
        
        $stmt = $this->conn->query("SELECT count(*) FROM fully_regitered_members");
        $stmt->execute();
        $count = $stmt->fetchAll();
        return $count;
        
    }
    

    //function that counts the total male
     public function countTotalMale(){
         
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM fully_regitered_members WHERE member_gender = 'male'");
        $stmt->execute();
        $count = $stmt->fetchAll();
        return $count;
        
    }

     //function that counts the total female
     public function countTotalFemale(){
         
        
        $stmt = $this->conn->prepare("SELECT count(*) FROM fully_regitered_members WHERE member_gender = 'female'");
        $stmt->execute();
        $count = $stmt->fetchAll();
        return $count;
        
    }

  
}

?>