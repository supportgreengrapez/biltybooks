@extends('layout.app')
@section('content')
<!--<div class="bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <div class="how">
          <h1>How its Work</h1>
          <p>Secure access any time, on any device:your data is completely secure in the cloud,allowing you to run your business from your Mac,PC,tablate or Phone.Easily track cash fellow:Send quotes and invoice,track sales and expenses and scan receipts.Reports and insights:create accounting reports, like balance sheets profit & loss reports so you ready for tex time.</p> 
          
          </div>
        </div>
      </div>
    </div>
  </div>-->
 <div class="container">
 <div class="row">
<div class="col-lg-12">
<div class="content_heading">
        <h2><strong>Process</strong></h2>
        </div>
</div>
</div>
  <div class="row">
    <div class="col-lg-12">
      <ul class="timeline">
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="{{url('/')}}/img/.1.png" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Goods In:</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                Whenever a shipment comes to your store,warehouse or factory, you can record that entry into your BiltyBooks. A bilty invoice/record has to be created.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="{{url('/')}}/img/.2.png" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Record Goods In:</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
            As a business owner you don’t even need to do it yourself, just tell your data entry operator to do so. Easy, right? 
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="{{url('/')}}/img/.3.png" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Goods Out:</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                Goods out, means when you are delivering goods to your customers. This means that the goods have to get out of your factory/warehouse/store. 
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="{{url('/')}}/img/.4.png" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Record Goods Out:</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                Recording the goods that get out of your store/warehouse/factory. This will create a Bilty Record on BiltyBooks Software.
              </p>
            </div>
          </div>
        </li>
        
      </ul>
    </div>
  </div>
</div>

@endsection