<?php
namespace App\Http\Controllers;
use Config;
use URL;
use Session;
use Carbon\Carbon;
use Crypt;
use Log;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Redirect;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Refund;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\Sale;
use DateTimeZone;

use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;



use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use \PayPal\Api\VerifyWebhookSignature;
use \PayPal\Api\WebhookEvent;

use PayPal\Api\Agreement;

use PayPal\Api\AgreementStateDescriptor;
class PayPalController extends Controller
{
   
    private $_api_context;
   
    public function __construct()
    {
     
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential('AUHObIaAO84I6MyMVnUZ1zLg6qnpg200Spc25nvkSsDTNEnLTRfrmKenFzon2putSaZJZqRDQGFHQU9J', 'EJf6izIdjpma8Fm7DmK28Ep7PoBw9-16vjIZRz4T0ozlMpECP1O-PT1CeECq76man28P-9V4GXprHHOr'));
        $this->_api_context->setConfig($paypal_conf['settings']);
       
    }
    
    public function complete_payment_webhook(Request $request)
    {
         $requestBody = $request->all();
$value = new PayPalModel($requestBody);
   
    $header = $request->header();

   
    Log::info("Request body");
    
        Log::info($requestBody);     

$signatureVerification = new VerifyWebhookSignature();
$signatureVerification->setAuthAlgo($header['paypal-auth-algo'][0]);
$signatureVerification->setTransmissionId($header['paypal-transmission-id'][0]);
$signatureVerification->setCertUrl($header['paypal-cert-url'][0]);
$signatureVerification->setWebhookId("35S13963JR127791Y"); // Note that the Webhook ID must be a currently valid Webhook that you created with your client ID/secret.
$signatureVerification->setTransmissionSig($header["paypal-transmission-sig"][0]);
$signatureVerification->setTransmissionTime($header['paypal-transmission-time'][0]);

$signatureVerification->setRequestBody($value);

try {
    /** @var \PayPal\Api\VerifyWebhookSignatureResponse $output */
    $output = $signatureVerification->post($this->_api_context);
} catch (Exception $ex) {
  
   exit(1);
}

   Log::info("Verification status: ".$output->getVerificationStatus());
 

    $json = $request->input('id');
   $output = \PayPal\Api\WebhookEvent::get($json, $this->_api_context);
    $output = $output->getResource();
    if(!empty($output->__get("amount")))
    {
     $result = DB::select("select* from bilty_transaction where agreement_id ='$output->billing_agreement_id'");
     $u = $result[0]->{'username'};
     
     $user = DB::select("select* from users where username = '$u'");
      //DB::delete("delete from bilty_transaction where agreement_id='$output->id'");
      $u_id = $user[0]->{'id'};
      $sub = $user[0]->{'subscription'};
      $tot  =$output->__get("amount")->total;
        DB::insert("insert into paypaltransactions (user_id,subscription,amount,status) values('$u_id','$sub','$tot','completed')");
     Log::info("this is amount ".$output->__get("amount")->total);
     Log::info("this is billing agreement id ".$output->billing_agreement_id);
     
    }
  Log::info("Subscription Cancelled: FAILLED"."   BILLINGID ".$output->id);
return "working";
        
    }
    public function webhook(Request $request)
    {
        
        if($request->input('event_type')!="PAYMENT.SALE.COMPLETED")
    {
    $requestBody = $request->all();
$value = new PayPalModel($requestBody);
   
    $header = $request->header();

   
    Log::info("Request body");
    
        Log::info($requestBody);     

$signatureVerification = new VerifyWebhookSignature();
$signatureVerification->setAuthAlgo($header['paypal-auth-algo'][0]);
$signatureVerification->setTransmissionId($header['paypal-transmission-id'][0]);
$signatureVerification->setCertUrl($header['paypal-cert-url'][0]);
$signatureVerification->setWebhookId("1X73721942027292M"); // Note that the Webhook ID must be a currently valid Webhook that you created with your client ID/secret.
$signatureVerification->setTransmissionSig($header["paypal-transmission-sig"][0]);
$signatureVerification->setTransmissionTime($header['paypal-transmission-time'][0]);

$signatureVerification->setRequestBody($value);

try {
    /** @var \PayPal\Api\VerifyWebhookSignatureResponse $output */
    $output = $signatureVerification->post($this->_api_context);
} catch (Exception $ex) {
  
    exit(1);
}

    Log::info("Verification status: ".$output->getVerificationStatus());
 

    $json = $request->input('id');
   $output = \PayPal\Api\WebhookEvent::get($json, $this->_api_context);
    $output = $output->getResource();
    if(!empty($output->id))
    {
     $result = DB::select("select* from bilty_transaction where agreement_id ='$output->id'");
     if(count($result)>0)
     {
         $u = $result[0]->{'username'};
         
        $t_result =  db::select("select* from bilty_transaction where username ='$u' ORDER BY id DESC LIMIT 1");
        
        if(count($t_result)>0)
             {
                 $a_id = $t_result[0]->{'agreement_id'};
                 
                 if($a_id==$output->id)
                 {
                     DB::update("update users set subscription_status='0' where username ='$u'");
                 }
             }
     
        
     Log::info("Subscription Cancelled: DONE"."   BILLINGID ".$output->id);
     }
     else
     {
         Log::info("Billing ID NOT FOUND"."   BILLINGID ".$output->id);
     }
    }
  Log::info("Subscription Cancelled: FAILLED"."   BILLINGID ".$output->id);
return "working";
    }
    }
    
    public function postPayment($freelancer_id,$project_id ,$project_title,$name,$due_date,$charge_fee,$instruction)
    {
        $this->freelancer_id = $freelancer_id ;
        PayPalController::$project_id = (int)$project_id;
        $this->project_title = $project_title;
        $this->name = $name;
        $this->due_date = $due_date;
        $this->charge_fee = (int)$charge_fee;
        $this->instruction = $instruction;
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($name) // item name
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($charge_fee); // unit price
       
        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $details = new Details();
        $details->setSubtotal($charge_fee);
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($charge_fee)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your Project ID#'.$project_id.' Milestone Payment Instructions: '.$instruction)
            ->setInvoiceNumber(uniqid());
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }
        return redirect('view/client/posted/jobs')
        ->with('error', 'Payment failed');
    }
    public function getPaymentStatus()
{

    
    
    // Get the payment ID before session clear
    $payment_id = Input::get('paymentId');
    // clear the session payment ID
    Session::forget('paypal_payment_id');
    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
       $project_title = session('title');
    $pid = session('pfid');
    
    return redirect("/client/project/view/milestone/list/".$pid."/".$project_title."/fail");
    }
    $payment = Payment::get($payment_id, $this->_api_context);
    // PaymentExecution object includes information necessary 
    // to execute a PayPal account payment. 
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site

    $payeer   = $payment->getPayer();
       $payeer_info = $payeer->getPayerInfo();
       $fname = $payeer_info->getFirstName();
       $lname = $payeer_info->getLastName();
       $email = $payeer_info->getEmail();
        

    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));
    $payeer_id = Input::get('PayerID');
    //Execute the payment
    $result = $payment->execute($execution, $this->_api_context);
   
    $transactions =$result->getTransactions();
$related_resources = $transactions[0]->getRelatedResources();
$sale = $related_resources[0]->getSale();
$sale_id = $sale->getId();
  
  $sale_state=  $sale->getState();
  Session::put('transaction.payment_id',$payment_id);
  Session::put('transaction.payeer_id',$payeer_id);
  Session::put('transaction.sale_id',$sale_id);
  Session::put('transaction.sale_state',$sale_state);
  Session::put('transaction.buyer_first_name',$fname);
  Session::put('transaction.buyer_last_name',$lname);
  Session::put('transaction.buyer_email',$email);
   
    if ($result->getState() == 'approved') { // payment made
        
        return redirect('/client/project/milestone/pay');
    }
    $project_title = session('title');
    $pid = session('pfid');
    
    return redirect("/client/project/view/milestone/list/".$pid."/".$project_title."/fail");
}
public function getSale($sale_id='')
{
    
    try {
     
      
      
      //  $payments = Payment::get('PAY-5VE440809E1740635LK6JEDQ', $this->_api_context);
        ;
        $payments = Sale::get('3G257975L96340342', $this->_api_context);
        ;
        dd($payments);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printError("List Payments", "Payment", null, $params, $ex);
        exit(1);
    }
}
public function getPaymentDetails($payment_id='')
{
    
    try {
     
      
       
       $payments = Payment::get('PAY-0Y455937UU369481NLLCGXOI', $this->_api_context);
       $payeer   = $payments->getPayer();
       $payeer_info = $payeer->getPayerInfo();
       $fname = $payeer_info->getFirstName();
       $lname = $payeer_info->getLastName();
       $email = $payeer_info->getEmail();
        echo $fname.' '.$lname.' '.$email;
        dd($payments);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printError("List Payments", "Payment", null, $params, $ex);
        exit(1);
    }
}
public function refundSale(Request $request,$sale_id,$total,$milestone_id)
{
   
    $amt = new Amount();
$amt->setTotal($total+($total*0.025))
  ->setCurrency('USD');

$refund = new Refund();
$refund->setAmount($amt);

$sale = new Sale();
$sale->setId($sale_id);
$reason = $request->input('reason');



try {
  $refundedSale = $sale->refund($refund, $this->_api_context);
  DB::update("update transactions set state='Refunded',refund_reason='$reason' where sale_id = '$sale_id'");
DB::update("update milestone set status='2',reason='$reason' where pk_id = '$milestone_id'");
  return redirect('/admin/transactions/complete/view');
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}
}

public function create_plan($pl)
{
    $p =0;
    if($pl == "BASIC")
    {
        $p = 9;
    }
    else if($pl=="ESSENTIAL")
    {
        $p=13;
    }
    else if($pl == "PRO")
    {
        $p = 16;
    }
    else
    {
        return redirect()->back();
    }
    session()->put('u_plan',$pl);
    $plan = new Plan();
    $plan->setName('BiltyBooks'. $pl .'Plan')
    ->setDescription('Testing')->setType('infinite');

    $paymentDefinition = new PaymentDefinition();

    $paymentDefinition->setName('Regular Payments')
    ->setType('REGULAR')
    ->setFrequency('Month')
    ->setFrequencyInterval("1")
    ->setCycles(0)
    ->setAmount(new Currency(array('value' => $p, 'currency' => 'USD')));
    

    $merchantPreferences = new MerchantPreferences();
$baseUrl = URL('/');


        $merchantPreferences->setReturnUrl(URL('/')."/paypal/execute/agreement/success/".$pl)
    ->setCancelUrl(URL('/')."/paypal/execute/agreement/cancel/")
   
    ->setAutoBillAmount("no")
    ->setInitialFailAmountAction("CANCEL")
    ->setMaxFailAttempts("1")
    ->setSetupFee(new Currency(array('value' => $p, 'currency' => 'USD')));
    
    

    $plan->setMerchantPreferences($merchantPreferences);
    $plan->setPaymentDefinitions(array($paymentDefinition));
    $request = clone $plan;
    
    try {
        $output = $plan->create($this->_api_context);
        
    }  catch (PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
      } catch (Exception $ex) {
        die($ex);
      }

    

      try {
        $patch = new Patch();
    
        $value = new PayPalModel('{
               "state":"ACTIVE"
             }');
    
        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);
    
        $output->update($patchRequest, $this->_api_context);
    
        $plan = Plan::get($output->getId(), $this->_api_context);
        
    } catch (Exception $ex) {
        ResultPrinter::printError("Updated the Plan to Active State", "Plan", null, $patchRequest, $ex);
    exit(1);
}

$agreement = new Agreement();
///$time = microtime(true);
// Determining the microsecond fraction
//$microSeconds = sprintf("%06d", ($time - floor($time)) * 1000000);
// Creating our DT object
//$tz = new DateTimeZone("Etc/UTC"); // NOT using a TZ yields the same result, and is actually quite a bit faster. This serves just as an example.
//$dt = new DateTime(date('Y-m-d H:i:s', $time), $tz);
// Compiling the date. Limiting to milliseconds, without rounding

// Formatting according to ISO 8601-extended
//$d= $dt->format("Y-m-d\TH:i:s\Z");
$result = DB::select("SELECT NOW()");

$dt =  date("Y-m-d\TH:i:s\Z",strtotime("+30 day",strtotime($result[0]->{'NOW()'})));
//$dt =  date("Y-m-d\TH:i:s\Z",strtotime($result[0]->{'NOW()'}));


$agreement->setName('BiltyBooks Agreement')
    ->setDescription('This agreement is between BiltyBooks and the buyer for the Premium Services that Biltybooks providing')
    ->setStartDate($dt);

    $plan = new Plan();
$plan->setId($output->getId());
$agreement->setPlan($plan);

$payer = new Payer();
$payer->setPaymentMethod('paypal');
$agreement->setPayer($payer);


try {
    $agreement = $agreement->create($this->_api_context);

    $approvalUrl = $agreement->getApprovalLink();
} catch (Exception $ex) {
    exit(1);
}
//return $approvalUrl;
return Redirect::away($approvalUrl);
//return $approvalUrl.'\n'.$agreement;



}
public function execute_plan($type,$plan="NONE")
{
  
  
    if ($type =="success") {
        $token = $_GET['token'];
        
        $agreement = new \PayPal\Api\Agreement();
        try {
            $agreement->execute($token, $this->_api_context);


            try {
                $agreement = \PayPal\Api\Agreement::get($agreement->getId(), $this->_api_context);
           
                $id = session('id');
                $username = session('username');
                $aid = $agreement->getId();
                $state = $agreement->getState();   
                $rc = $agreement->getAgreementDetails()->getCyclesRemaining();
                $cc =$agreement->getAgreementDetails()->getCyclesCompleted();
                $nb = $agreement->getAgreementDetails()->getNextBillingDate();
        
                $r = db::select("select* from bilty_transaction where username ='$username' ORDER BY id DESC LIMIT 1");
                if(count($r)>0)
                {
        
        
                   $agreementStateDescriptor = new AgreementStateDescriptor();
                   $agreementStateDescriptor->setNote("Cancelling the agreement");
                   $createdAgreement = Agreement::get( $r[0]->{'agreement_id'}, $this->_api_context);;
                  // $createdAgreement->reActivate($agreementStateDescriptor, $this->_api_context);
                  // $createdAgreement = Agreement::get('I-HLGK6DE9H654', $this->_api_context);;
                  // return $createdAgreement->getAgreementDetails()->getCyclesRemaining().' '.$createdAgreement->getAgreementDetails()->getCyclesCompleted().' '.$createdAgreement->getAgreementDetails()->getNextBillingDate();
                   try {
                   $u_id = session('id');
                       $createdAgreement->cancel($agreementStateDescriptor, $this->_api_context);
                       $t_id = $r[0]->{'id'};
                     // DB::delete("delete from bilty_transaction where id='$t_id'");
                       DB::insert("insert into bilty_transaction (agreement_id,username,state) values('$aid','$username','$state')");
                       $result = DB::select("select* from users where id = '$id'");
                       db::update("update users set subscription='$plan',mode_of_payment='paypal',s_created =CURRENT_TIMESTAMP(),subscription_status='1' where id ='$id'");
                      
                       session()->put('subscription',$plan);
                       
                       return redirect('/view-subscription')->with('message', 'Your Subscription has been successfully updated');;
                      
               } catch (Exception $ex) {
                   ResultPrinter::printError("Suspended the Agreement", "Agreement", null, $agreementStateDescriptor, $ex);
                   exit(1);
               }
            
                    
                }

               DB::insert("insert into bilty_transaction (agreement_id,username,state) values('$aid','$username','$state')");
                $result = DB::select("select* from users where id = '$id'");
                db::update("update users set subscription='$plan',mode_of_payment='paypal',s_created =CURRENT_TIMESTAMP(),subscription_status='1' where id ='$id'");
               
               
                session()->put('subscription',$plan);
                
                return redirect('/view-subscription')->with('message', 'You are Successfully Subscribed to '.$plan.' plan');
            } catch (Exception $ex) {
                ResultPrinter::printError("Get Agreement", "Agreement", null, null, $ex);
                exit(1);
            }



    } catch (Exception $ex) {
        ResultPrinter::printError("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $ex);
        exit(1);
    }
  
    //return $agreement->getId();
   // return $agreement;

} else {
   return redirect('/view-subscription')->with('message', 'You cancelled the Agreement');;
}


}

public function cancel_agreement($id)
{
 $agreementStateDescriptor = new AgreementStateDescriptor();
    $agreementStateDescriptor->setNote("Cancelling the agreement");
    $createdAgreement = Agreement::get($id, $this->_api_context);;
   // $createdAgreement->reActivate($agreementStateDescriptor, $this->_api_context);
   // $createdAgreement = Agreement::get('I-HLGK6DE9H654', $this->_api_context);;
   // return $createdAgreement->getAgreementDetails()->getCyclesRemaining().' '.$createdAgreement->getAgreementDetails()->getCyclesCompleted().' '.$createdAgreement->getAgreementDetails()->getNextBillingDate();
    try {
    $u_id = session('id');
        $createdAgreement->cancel($agreementStateDescriptor, $this->_api_context);
        
            DB::update("update users set subscription_status='0' where id ='$u_id'");
       // session()->put('subscription',"NONE");
        return redirect()->back()->with('message', 'Your Subscription has been Cancelled');
} catch (Exception $ex) {
    ResultPrinter::printError("Suspended the Agreement", "Agreement", null, $agreementStateDescriptor, $ex);
    exit(1);
}

return redirect()->back()->with('message', 'Some Error Occured');      
}
public function getAgreement()
{
    $params = array('start_date' => date('Y-m-d', strtotime('-15 years')), 'end_date' => date('Y-m-d', strtotime('+5 days')));
    $createdAgreement = Agreement::get('I-KBC1S3NSCEMH', $this->_api_context);
    //$createdAgreement = Agreement::searchTransactions('I-C01W8R06K4EL',$params, $this->_api_context);
   //return $createdAgreement->getAgreementDetails()->setFinalPaymentDate('2018-05-14T10:00:00Z');
  
$createdAgreement = Agreement::get('I-27TB7EP4SA7U', $this->_api_context);
   return dd($createdAgreement);
   //$output = \PayPal\Api\Webhook::getAll($this->_api_context);
    $output = \PayPal\Api\WebhookEventType::subscribedEventTypes('7B6039666T665894K', $this->_api_context);
    $output = \PayPal\Api\Webhook::get('7B6039666T665894K', $this->_api_context);

    $output = \PayPal\Api\WebhookEvent::get('WH-0AJ93006UJ461313Y-4CY9773247786653N', $this->_api_context);
    $output = $output->getResource();
    if(!empty($output->billing_agreement_id))
    return $output->billing_agreement_id;
    else
    return "this is not a billing agreement hook";
}


}