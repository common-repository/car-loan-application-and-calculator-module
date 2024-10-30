<?php


function clm_display_calc()
{
	
	$clm_model = new CLM_MODEL();
	
	$clm_model->check_js();
	
	?>

	<div id="clm_calc_app_wrapper">
    
        <div align="left" class="calctitle">
    
            <h2>Estimate the amount you can finance when you buy a car.</h2>
        
            <label>NOTICE: The payment/loan amounts given are just estimates. Actual payment/loan amount subject to change. Payment plus current monthly debt cannot exceed 50% of gross income.</label>
        
        </div>
    
        <form name="sky">
        
            <table>
            
                <tr>
                    
                    <td>
                        
                        <h5>1. Select a credit profile</h5>
                        
                    </td>
                
                </tr>
                
                <tr>
                
                    <td>
                        
                        <table>
                            
                            <tr>
                            
                                <td>
                                    <input name="Credit" value="G" onclick="creditTypeChanged(this.form)" type="radio" checked="checked" />
                                </td>
                                
                                <td>
                                    <b>Excellent Credit</b>
    
                                    <div style="padding:5px 5px 15px 22px;">On the bureau minimum of 5 years. Demonstrated paid as agreed on several installment loans. (ex:mortgage, auto). No slow pays, charge offs or collection items. Credit card balances are no more than 30% of credit limit.
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            
                            <tr>
                            
                                <td>
                                    <input name="Credit" value="F" onclick="creditTypeChanged(this.form)" type="radio" />
                                </td>
                                
                                <td>
                                    <b>Good Credit</b>
    
                                    <div style="padding:5px 5px 15px 22px;">On the bureau minimum of 3 years. Demonstrated paid as agreed on several installment loans. Slow pays are at least 12 months old. No charge offs or collection items. Credit card balances are no more than 60% of credit limit.
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            
                            <tr>
                            
                                <td>
                                    <input name="Credit" value="B" onclick="creditTypeChanged(this.form)" type="radio" />
                                </td>
                                
                                <td>
                                    <b>Average Credit</b>
    
                                    <div style="padding:5px 5px 15px 22px;">On the bureau minimum of 2 years. Demonstrated paid as agreed on at least one (1) installment loan of at least $5000.00 Has bought at least one automobile. Slow pays, charge offs and/or collection items at least 12 months old Have some credit card balances and demonstrated paid as agreed. No more than 1 Bankruptcy, repo, or foreclosure and is at least 12 months old.
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            
                            <tr>
                            
                                <td>
                                    <input name="Credit" value="R" onclick="creditTypeChanged(this.form)" type="radio" />
                                </td>
                                
                                <td>
                                    <b>Below Average Credit</b>
    
                                    <div style="padding:5px 5px 15px 22px;">On the bureau minimum of 2 years. Has installment loans but with very poor payment history. Bankruptcy, report, or foreclosure last than 12 months old and possible muliple as well. Credit card balances are max out with very poor payment history. Several slow pays, charge offs and/or collection items less than 12 months old.
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            
                        </table>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                    
                        <h5>2. Enter monthly income</h5>
                        
                        <div>
                        
                            <label>Total Monthly Income before taxes are deducted:</label>
                            
                            <input name="income" onchange="IncomeChanged(this.form)" size="10" class="input_num_only" />
                            
                            <input type="button" value="Calculate" onclick="calculate(this.form);" />
                            
                        </div>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td><b>Qualified Auto Loan Amount*</b></td>
    
                    <td><b>Qualified Monthly Payment*</b></td>
    
                    <td><b>Estimate out-of-pocket costs*</b></td>
                    
                </tr>
                
                <tr>
                
                    <td>
    
                        <div id="qualified_auto_loan_amount">$ 0</div>
    
                    </td>
    
                    <td>
    
                        <div id="qualified_monthly_payment">$ 0</div>
    
                    </td>
    
                    <td>
    
                        <div id="estimate_out_of_pocket_costs">$ 0</div>
    
                    </td>
                    
                </tr>
            
            </table>
        
        </form>
    
    </div>
    
    <?php
	
	unset( $clm_model );
	
}
add_shortcode('deploy_calculator','clm_display_calc');