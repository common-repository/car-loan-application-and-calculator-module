// JavaScript Document

jQuery(document).ready(function($){
	
		$("#change-image").click(function(e){
			
			//e.preventDefault();
			
		});
	
		
		$("#loan_app_form").submit(function(e){
			
			e.preventDefault();
			
			var serializeData = $(this).serialize();
			
			if( !document.getElementById("clm_agreement").checked )
			{
				alert('Please check the agreement!');
				return;
			}
			
			if( !checkMail(loan_app_form.email.value) )
			{
				alert('Invalid Email Format!');
				return;
			}
			
			if( loan_app_form.captcha_code.value == '' )
			{
				alert('Please enter security code!');
				return;
			}
			
			if( loan_app_form.co_buyer_bool.value == 'yes' )
			{
			
				if( !checkMail(loan_app_form.co_email.value) )
				{
					alert('Invalid Co-buyer Email Format!');
					return;
				}
				
			}
			
			$("#ajax_loader").show();
			
			$.post(ajaxURL, serializeData, function(response) {
				
				$("#ajax_loader").hide();
				
				
				if(response == 0)
				{
					alert('Invalid Captcha!');
					return;
				}
	
				$("#clm_result").html(response);
				
				$("html, body").animate({scrollTop: 0},1000);
				
			});
			
		});
		
		if( $("#co_buyer_bool").val() == 'yes' )
		{
			
			$("#co_buyer_form").show();
			
		} else {
			
			$("#co_buyer_form").hide();
			
		}
		
		$('.input_num_only').keyup(function(){
			
			if( isNaN( $(this).val() ) )
			{
				$(this).val("");
			}
			
		});
		
	
});

function coBuyer()
{
	
	if( jQuery("#co_buyer_bool").val() == 'yes' )
	{
		
		jQuery("#co_buyer_form").fadeIn( "medium" );
		
	} else {
		
		jQuery("#co_buyer_form").fadeOut( "medium" );
		
	}
	
}

function checkMail(email)
{
	var x = email;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x)){
		return true;
	} else {
		return false;
	}
}



/*
*
* Calculator script Module
* -------------------------------------------------------------------------------------------
*
*
*********************************************/
formulaA = new Array

formulaA[0] = 10

formulaA[1] = 9

formulaA[2] = 8

formulaA[3] = 7





formulaB = new Array

formulaB[0] = 50

formulaB[1] = 45

formulaB[2] = 40

formulaB[3] = 35





absMinLoan = new Array

absMinLoan[0] = 45000

absMinLoan[1] = 35000

absMinLoan[2] = 25000

absMinLoan[3] = 20000





factorA=0

factorB=0

factor_i=0

factor_n=0

crLevel=0



//year term

year_term = new Array

year_term[0] = 6

year_term[1] = 6

year_term[2] = 5

year_term[3] = 5



//interest rate

interest = new Array

interest[0] = 20//Excellent

interest[1] = 10 //Good

interest[2] = 15//Average

interest[3] = 13//Below Average





// BEGINNING OF NEW FOR LOAN CALCULATOR COMPUTATION



// Qualified Monthly Payment

formula_qmp = new Array

formula_qmp[0] = .20		// Excellent Credit

formula_qmp[1] = .20		// Good Credit		

formula_qmp[2] = .15		// Average Credit

formula_qmp[3] = .13		// Below Average Credit



//Qualified Auto Loan Amount - VALUE OF i

formula_i = new Array

formula_i[0] = .00625		// Excellent Credit

formula_i[1] = .00875		// Good Credit		

formula_i[2] = .0125		// Average Credit

formula_i[3] = .0158		// Below Average Credit



//Qualified Auto Loan Amount - VALUE OF n

formula_n = new Array

formula_n[0] = 72			// Excellent Credit

formula_n[1] = 72			// Good Credit

formula_n[2] = 60			// Average Credit

formula_n[3] = 60			// Below Average Credit



//Estimate out-of-pocket costs

out_of_pocket = new Array

out_of_pocket[0] = .10		// Excellent Credit

out_of_pocket[1] = .10		// Good Credit

out_of_pocket[2] = .15		// Average Credit

out_of_pocket[3] = .25		// Below Average Credit



// ENDING OF New Formula for Qualified Auto Loan Amount





minterest=0

myearterm=0

principal=0

mout_of_pocket = 0

function creditTypeChanged(crForm) {

	principal = crForm.income.value;

	return

}

function IncomeChanged(crForm) {

	var A;

	var PMT;

	var PMT_compute_i;

	var PMT_TOTAL;

	var PVA;

	var PVA_total;

	var total_qmp;

	var compute_a;

	var compute_b;

	var compute_c;

	var compute_c_total;	

	var compute_d;

	var compute_d_total;	

	var compute_e;

	var compute_e_total;

	var estimate_pocket_costs;

	var estimate_pocket_costs_total;

	

	

	A = crForm.income.value;

	PMT = A * factor_qmp;

	total_qmp = factor_qmp * A;

	

	// BOF Qualified Auto Loan Amount

	compute_a = total_qmp / factor_i;

	compute_b = 1 + factor_i;

	compute_c = Math.pow(compute_b, factor_n);

	compute_c_total = Math.round(compute_c * 1000) / 1000;

	compute_d = 1 / compute_c_total;

	compute_e = 1 - compute_d;

	

	PVA = Math.round(compute_a) * compute_e;

	PVA_total =	Math.round(PVA);

	// EOF Qualified Auto Loan Amount

	

	

	// BOF Qualified Monthly Payment

	PMT_compute_i = PMT / factor_i;

	PMT_TOTAL = PMT_compute_i * compute_e;

	//alert (PMT);

	// EOF Qualified Auto Loan Amount

	

	maxLoanA = crForm.income.value * factorA;

	halfIncome = crForm.income.value / 2;



	//q2 = halfIncome - crForm.mortgage.value

	//q2 = q2 - crForm.CCPayments.value

	//q2 = q2 - crForm.garnishments.value

	//q2 = q2 - crForm.other.value

	q2 = halfIncome



	maxLoanB = q2 * factorB



	if (maxLoanA < maxLoanB) {

		minLoan = maxLoanA

	}

	else {

		minLoan = maxLoanB

	}

	if (minLoan > absMinLoan[crLevel]){

		minLoan = absMinLoan[crLevel]

	}

	var x = Math.pow(1 + minterest, myearterm);

    

	var monthly = (minLoan*x*minterest)/(x-1);

	

	//BOF Estimate out-of-pocket costs

	//mout_of_pocket = mout_of_pocket * minLoan

	estimate_pocket_costs = mout_of_pocket * PVA

	estimate_pocket_costs_total = Math.round(estimate_pocket_costs);

	//EOF Estimate out-of-pocket costs

	

	td1 = document.getElementById("qualified_auto_loan_amount")

	td2 = document.getElementById("qualified_monthly_payment")

	td3 = document.getElementById("estimate_out_of_pocket_costs")

	

	if (!isNaN(monthly) && 

        (monthly != Number.POSITIVE_INFINITY) &&

        (monthly != Number.NEGATIVE_INFINITY)){

		td2.innerHTML = "<font size='2'><b>"+"$ "+round(PMT)+"</b>" //Qualified Monthly Payment

		

		

	}else

	{

		td2.innerHTML = "<font size='2'><b>"+"$0</b>"

		

	}

		//td1.innerHTML = "<font size='2'><b>"+"$"+round(minLoan)+"</b>" //Qualified Auto Loan Amount

		

		td1.innerHTML = "<font size='2'><b>"+"$ "+round(PVA_total)+"</b>" //Qualified Auto Loan Amount

		td3.innerHTML = "<font size='2'><b>"+"$ "+round(estimate_pocket_costs_total)+"</b>" //Estimate out-of-pocket costs

		//alert (monthly);

	

}



function calculate(crForm) {

    // Get the user's input from the form. Assume it is all valid.

    // Convert interest from a percentage to a decimal, and convert from

    // an annual rate to a monthly rate. Convert payment period in years

    // to the number of monthly payments.

    //var test;

	l1 = crForm.length

	for (i=0;i<crForm.Credit.length; i++) {

		if (crForm.Credit[i].checked) {

			factorA = formulaA[i]

			factorB = formulaB[i]

			factor_qmp = formula_qmp[i]			

			factor_i = formula_i[i]

			factor_n = formula_n[i]

			minterest = interest[i] / 100 / 12 		// Qualified Monthly Payment

			myearterm = year_term[i] * 12

			mout_of_pocket = out_of_pocket[i]		// Estimate out-of-pocket costs

			crLevel = i

		}

	}

	//minterest = (minterest / 100 )/ 12

	//alert(mout_of_pocket);

	IncomeChanged(crForm)

	return

}



// This simple method rounds a number to two decimal places.

function round(x) {

  return Math.round(x*100)/100;

}