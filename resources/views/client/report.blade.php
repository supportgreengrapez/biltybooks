@extends('client.layout.app')
@section('content') 
<style>
/* The container */
.containers {
    display: block;
    position: relative;
    padding-left: 27px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-top: 10px;
}

/* Hide the browser's default checkbox */
.containers input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #fff;
  box-shadow: 2px 0px 5px 0 rgba(0,0,0,.2), 0 1px 10px 0 rgba(0,0,0,.19);

}

/* On mouse-over, add a grey background color */
.containers:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containers input:checked ~ .checkmark {
  background-color: #f9a848;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.containers input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.containers .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="content_salogan">
        <h2>Reports</h2>
      </div>
      <div class="bgorange">
        <div class="litorange">
          <form class="form-horizontal" method="post" action="{{url('/')}}/search-in-report">
              {{csrf_field()}}
            <div class="row">
              <!--<div class="col-lg-4">-->
                <!--<label><input type="checkbox" name="bilty_no_check" value="1" > Bilty No</label>-->
                <!--<div class="row">-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">Start</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="bilty_no_from" id="bnfrom">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">End</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No"  name="bilty_no_to" id="bnto" >-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<label><input type="checkbox" name="bundle_check" value="1">Bundle</label>-->
                <!--<div class="row">-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">Start</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="bundle_from" id="bfrom">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">End</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="bundle_to" id="bto">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
              <!--  <label><input type="checkbox" name="date_of_booking_check" value="1">Date of Booking</label>-->
              <!--  <div class="row">-->
              <!--    <div class="col-lg-12">-->
              <!--      <div class="form-group">-->
              <!--        <label class="col-sm-3 control-label">Start</label>-->
              <!--        <div class="col-sm-9">-->
              <!--          <input type="date" class="date form-control" name="date_of_booking_from" id="dbfrom">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="col-lg-12">-->
              <!--      <div class="form-group">-->
              <!--        <label class="col-sm-3 control-label">End</label>-->
              <!--        <div class="col-sm-9">-->
              <!--          <input type="date" class="date form-control"  name="date_of_booking_to" id="dbto">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
                
                
              <!--    <label><input type="checkbox" value="1" name="bilty_type_check" >bilty_type</label>-->
              <!--  <div class="row">-->
              <!--  <div class="col-lg-12">-->
              <!--      <div class="form-group">-->
              <!--      <select class="form-control" name="bilty_type" required>-->
              <!--              <option></option>-->
              <!--              <option value="in">in</option>-->
              <!--              <option value="out">out</option>-->
              <!--            </select>-->
              <!--            </div>-->
              <!--    </div>-->
              <!--    </div>-->
                  
              <!--    <label><input type="checkbox" value="1" name="bilty_type_check" >Bilty No</label>-->
              <!--    <div class="row">-->
                      
              <!--    <div class="col-lg-12">-->
              <!--        <div class="form-group">-->
              <!--      <input type="number" class="form-control" placeholder="Enter No">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    </div>-->
                  
              <!--    <label><input type="checkbox" value="1" name="bilty_type_check" >Bundle</label>-->
              <!--    <div class="row">-->
                  
              <!--    <div class="col-lg-12">-->
              <!--        <div class="form-group">-->
              <!--      <input type="number" class="form-control" placeholder="Enter No">-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    </div>-->
                
              <!--</div>-->
              
              <div class="col-lg-4">
              
                <div class="row">
                
                      
                  <div class="col-lg-12">
                      <!--<label><input type="checkbox" value="1" name="bilty_type_check" >Bilty No</label>-->
                      <label class="containers">Bilty No
  <input type="checkbox" value="1" name="bilty_no_check">
  <span class="checkmark"></span>
</label>
                    <input type="number" class="form-control boxshadow2" placeholder="Enter No" name="bilty_no_from" id="bnfrom">
                  </div>
                  
                  <div class="col-lg-12">
                      <!--<label><input type="checkbox" name="bundle_check" value="1" >Bundle</label>-->
                      
                      <label class="containers">Bundle
  <input type="checkbox" name="bundle_check" value="1">
  <span class="checkmark"></span>
</label>
                    <input type="number" class="form-control boxshadow2" placeholder="Enter No" name="bundle_from" id="bfrom">
                  </div>
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" value="1" name="goods_company_check" >Goods Company</label>-->
                  <label class="containers">Goods Company
  <input type="checkbox" value="1" name="goods_company_check">
  <span class="checkmark"></span>
</label>
                    <select name="goods_company" class="form-control boxshadow2">
                      <option value="">Enter Goods Company</option>
                   @if(count($goods_company)>0)
                   @foreach($goods_company as $a)
                   <option value="{{$a->goods_company}}">{{$a->goods_company}}</option>
                   
                   @endforeach
                   @endif
                  </select>
                  </div>
                   </div>
                  
                  <div class="row">
                      <div class="col-lg-12 col-sm-12 col-xs-12">
                      <div class="boxshadow">
                       <div class="row">    
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" name="date_of_booking_check" value="1">Date of Booking</label>-->
                  
                  <label class="containers" style="color:#f9a848;">Date of Booking
  <input type="checkbox" name="date_of_booking_check" value="1">
  <span class="checkmark"></span>
</label>
                  </div>
                  </div>
                   <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Start</label>
                      <div class="col-sm-9">
                        <input  type="date" class="form-control" name="date_of_booking_from" id="dbfrom">
                      </div>
                    </div>
                  </div>
                   </div>
                   <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">End</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control"  name="date_of_booking_to" id="dbto">
                      </div>
                    </div>
                  </div>
                   </div>
                   </div>
                  </div>
                  </div>
               
              </div>
              <!--<div class="col-lg-4">-->
                <!--<label><input type="checkbox" value="1" name="bilty_charges_check" >Bilty Charges</label>-->
                <!--<div class="row">-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">Start</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="bilty_charges_from" id="bcfrom">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">End</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="bilty_charges_to" id="bcto">-->
                       
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<label><input type="checkbox" value="1" name="quantity_check" >Quantity</label>-->
                <!--<div class="row">-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">Start</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="quantity_from" id="qfrom">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="col-lg-6">-->
                <!--    <div class="form-group">-->
                <!--      <label class="col-sm-3 control-label">End</label>-->
                <!--      <div class="col-sm-9">-->
                <!--        <input type="number" class="form-control" placeholder="Enter No" name="quantity_to" id="qto">-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                
                
                
                
                
              <!--</div>-->
              <div class="col-lg-4">
              
                <div class="row">
<!--                <div class="col-lg-12">-->
                    <!--<label><input type="checkbox" value="1" name="bilty_type_check" >Charge To</label>-->
<!--                     <label class="containers">Charge To-->
<!--  <input type="checkbox" name="date_of_booking_check" value="1">-->
<!--  <span class="checkmark"></span>-->
<!--</label>-->
<!--                    <input type="number" class="form-control" placeholder="Enter No">-->
<!--                  </div>-->
                      
                  
                  <div class="col-lg-12">
                      <!--<label><input type="checkbox" value="1" name="bilty_type_check" >Quantity</label>-->
                       <label class="containers">Quantity
  <input type="checkbox" value="1" name="quantity_check">
  <span class="checkmark"></span>
</label>
                      
                    <input type="text" class="form-control boxshadow2" placeholder="Enter No" name="quantity_from" id="qfrom">
                  </div>
                  
                     
                  <div class="col-lg-12">
                       <!--<label><input type="checkbox"value="1" name="charges_to_check" >Charges To</label>-->
                       
                       <label class="containers">Charge To
  <input type="checkbox" value="1" name="bilty_charges_check">
  <span class="checkmark"></span>
</label>
                       
                   <input type="text" class="form-control boxshadow2" placeholder="Enter No" name="bilty_charges_to" id="bcto">
                  </div>
                  
                      
                     
                  <div class="col-lg-12">
                       <!--<label><input type="checkbox" value="1" name="to_record_check" >To Record</label>-->
                       
                       <label class="containers">To Record
  <input type="checkbox" value="1" name="to_record_check">
  <span class="checkmark"></span>
</label>
                    <input type="text" class="form-control boxshadow2" placeholder="Enter Value" name="to_record">
                  </div>
                  
                   </div>
                  
                   <div class="row">
                      <div class="col-lg-12 col-sm-12 col-xs-12">
                      <div class="boxshadow">
                          
                      <div class="row">     
                  <div class="col-lg-12">
                      <!--<label><input type="checkbox" name="date_of_receiving_check" value="1">Date of Receiving</label>-->
                      
                       <label class="containers" style="color:#f9a848;">Date of Receiving
  <input type="checkbox" name="date_of_receiving_check" value="1">
  <span class="checkmark"></span>
</label>
                      
                      </div>
                     </div>  
                      
                   <div class="row">   
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Start</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control"  name="date_of_receiving_from" id="drfrom">
                      </div>
                    </div>
                  </div>
                   </div> 
                  
                   <div class="row"> 
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">End</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control"  name="date_of_receiving_to" id="drto">
                      </div>
                    </div>
                  </div>
                  </div> 
                  
                  
                   </div>
                    </div>
                     </div>
                  
                  
                  
                  
                  
               
              </div>
              <div class="col-lg-4">
              
                <div class="row">
                
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" value="1" name="sender_name_check" >Sender Name</label>-->
                  
                   <label class="containers">Sender Name
  <input type="checkbox" value="1" name="sender_name_check" >
  <span class="checkmark"></span>
</label>
                  
                    <select name="sender_name" class="form-control boxshadow2">
                      <option value="">Enter Sender Name</option>
                     @if(count($sender_name)>0)
                   @foreach($sender_name as $a)
                   <option value="{{$a->sender_company}}">{{$a->sender_company}}</option>
                   
                   @endforeach
                   @endif
                  </select>
                  </div>
                  
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" value="1" name="receiver_name_check" >Receiver Name</label>-->
                  
                   <label class="containers">Receiver Name
  <input type="checkbox" value="1" name="receiver_name_check">
  <span class="checkmark"></span>
</label>
                  
                    <select name="receiver_name" class="form-control boxshadow2">
                      <option value="">Enter Receiver Name</option>
                      @if(count($receiver_name)>0)
                   @foreach($receiver_name as $a)
                   <option value="{{$a->receiver_company}}">{{$a->receiver_company}}</option>
                   
                   @endforeach
                   @endif
                  </select>
                  </div>
                  
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" value="1" name="sender_city_check" >Sender City</label>-->
                  
                  <label class="containers">Sender City
  <input type="checkbox" value="1" name="sender_city_check">
  <span class="checkmark"></span>
</label>
                    <select name="sender_city" class="form-control boxshadow2">
                      <option value="">Select City</option>
    <option value="Ahmadpur East">Ahmadpur East</option>
    <option value="Ahmadpur Sial">Ahmadpur Sial</option>
    <option value="Alipur">Alipur</option>
    <option value="Arifwala">Arifwala</option>
    <option value="Attock City">Attock City</option>
    <option value="Baddomalhi">Baddomalhi</option>
    <option value="Bahawalnagar">Bahawalnagar</option>
    <option value="Bahawalpur">Bahawalpur</option>
    <option value="Bakhri Ahmad Khan">Bakhri Ahmad Khan</option>
    <option value="Basirpur">Basirpur</option>
    <option value="Basti Dosa">Basti Dosa</option>
    <option value="Begowala">Begowala</option>
    <option value="Bhai Pheru">Bhai Pheru</option>
    <option value="Bhakkar">Bhakkar</option>
    <option value="Bhalwal">Bhalwal</option>
    <option value="Bhawana">Bhawana</option>
    <option value="Bhera">Bhera</option>
    <option value="Bhopalwala">Bhopalwala</option>
    <option value="Burewala">Burewala</option>
    <option value="Chak Azam Saffo">Chak Azam Saffo</option>
    <option value="Chak Two Hundred Forty-Nine TDA">Chak Two Hundred Forty-Nine TDA</option>
    <option value="Chakwal">Chakwal</option>
    <option value="Chawinda">Chawinda</option>
    <option value="Chichawatni">Chichawatni</option>
    <option value="Chiniot">Chiniot</option>
    <option value="Chishtian Mandi">Chishtian Mandi</option>
    <option value="Choa Saidan Shah">Choa Saidan Shah</option>
    <option value="Chuhar Kana">Chuhar Kana</option>
    <option value="Chunian">Chunian</option>
    <option value="Daira Din Panah">Daira Din Panah</option>
    <option value="Dajal">Dajal</option>
    <option value="Dandot RS">Dandot RS</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Daska">Daska</option>
    <option value="Daud Khel">Daud Khel</option>
    <option value="Daultala">Daultala</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhanot">Dhanot</option>
    <option value="Dhaunkal">Dhaunkal</option>
    <option value="Dijkot">Dijkot</option>
    <option value="Dinan Bashnoian Wala">Dinan Bashnoian Wala</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Dullewala">Dullewala</option>
    <option value="Dunga Bunga">Dunga Bunga</option>
    <option value="Dunyapur">Dunyapur</option>
    <option value="Eminabad">Eminabad</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Faqirwali">Faqirwali</option>
    <option value="Faruka">Faruka</option>
    <option value="Fazilpur">Fazilpur</option>
    <option value="Fort Abbas">Fort Abbas</option>
    <option value="Garh Maharaja">Garh Maharaja</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Hadali">Hadali</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Harnoli">Harnoli</option>
    <option value="Haru Zbad">Haru Zbad</option>
    <option value="Hasan Abdal">Hasan Abdal</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli">Haveli</option>
    <option value="Hazro City">Hazro City</option>
    <option value="Hujra">Hujra</option>
    <option value="Jahanian Shah">Jahanian Shah</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jalalpur Pirwala">Jalalpur Pirwala</option>
    <option value="Jampur">Jampur</option>
    <option value="Jand">Jand</option>
    <option value="Jandiala Sher Khan">Jandiala Sher Khan</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jatoi Shimali">Jatoi Shimali</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Jhang City">Jhang City</option>
    <option value="Jhang Sadr">Jhang Sadr</option>
    <option value="Jhawarian">Jhawarian</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Jhumra">Jhumra</option>
    <option value="Kabirwala">Kabirwala</option>
    <option value="Kahna">Kahna</option>
    <option value="Kahuta">Kahuta</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Kalaswala">Kalaswala</option>
    <option value="Kaleke Mandi">Kaleke Mandi</option>
    <option value="Kallar Kahar">Kallar Kahar</option>
    <option value="Kalur Kot">Kalur Kot</option>
    <option value="Kamalia">Kamalia</option>
    <option value="Kamar Mushani">Kamar Mushani</option>
    <option value="Kamir">Kamir</option>
    <option value="Kamoke">Kamoke</option>
    <option value="Kamra">Kamra</option>
    <option value="Kanganpur">Kanganpur</option>
    <option value="Karor">Karor</option>
    <option value="Kasur">Kasur</option>
    <option value="Keshupur">Keshupur</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khangah Dogran">Khangah Dogran</option>
    <option value="Khangarh">Khangarh</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khewra">Khewra</option>
    <option value="Khurrianwala">Khurrianwala</option>
    <option value="Khushab">Khushab</option>
    <option value="Kohror Pakka">Kohror Pakka</option>
    <option value="Kot Addu">Kot Addu</option>
    <option value="Kot Ghulam Muhammad">Kot Ghulam Muhammad</option>
    <option value="Kot Mumin">Kot Mumin</option>
    <option value="Kot Radha Kishan">Kot Radha Kishan</option>
    <option value="Kot Samaba">Kot Samaba</option>
    <option value="Kot Sultan">Kot Sultan</option>
    <option value="Kotli Loharan">Kotli Loharan</option>
    <option value="Kundian">Kundian</option>
    <option value="Kunjah">Kunjah</option>
    <option value="Ladhewala Waraich">Ladhewala Waraich</option>
    <option value="Lahore">Lahore</option>
    <option value="Lala Musa">Lala Musa</option>
    <option value="Lalian">Lalian</option>
    <option value="Layyah">Layyah</option>
    <option value="Liliani">Liliani</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Malakwal City">Malakwal City</option>
    <option value="Mamu Kanjan">Mamu Kanjan</option>
    <option value="Mananwala">Mananwala</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="Mangla">Mangla</option>
    <option value="Mankera">Mankera</option>
    <option value="Mehmand Chak">Mehmand Chak</option>
    <option value="Mian Channun">Mian Channun</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Minchinabad">Minchinabad</option>
    <option value="Mitha Tiwana">Mitha Tiwana</option>
    <option value="Moza Shahwala">Moza Shahwala</option>
    <option value="Multan">Multan</option>
    <option value="Muridke">Muridke</option>
    <option value="Murree">Murree</option>
    <option value="Mustafabad">Mustafabad</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Nankana Sahib">Nankana Sahib</option>
    <option value="Narang">Narang</option>
    <option value="Narowal">Narowal</option>
    <option value="Naushahra Virkan">Naushahra Virkan</option>
    <option value="Nazir Town">Nazir Town</option>
    <option value="Okara">Okara</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pasrur">Pasrur</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Phalia">Phalia</option>
    <option value="Pind Dadan Khan">Pind Dadan Khan</option>
    <option value="Pindi Bhattian">Pindi Bhattian</option>
    <option value="Pindi Gheb">Pindi Gheb</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qadirpur Ran">Qadirpur Ran</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Raja Jang">Raja Jang</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rasulnagar">Rasulnagar</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Rojhan">Rojhan</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sambrial">Sambrial</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sanjwal">Sanjwal</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sarai Sidhu">Sarai Sidhu</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shahkot">Shahkot</option>
    <option value="Shahpur">Shahpur</option>
    <option value="Shahr Sultan">Shahr Sultan</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sharqpur">Sharqpur</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Shujaabad">Shujaabad</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sillanwali">Sillanwali</option>
    <option value="Sodhra">Sodhra</option>
    <option value="Sukheke Mandi">Sukheke Mandi</option>
    <option value="Surkhpur">Surkhpur</option>
    <option value="Talagang">Talagang</option>
    <option value="Talamba">Talamba</option>
    <option value="Tandlianwala">Tandlianwala</option>
    <option value="Taunsa">Taunsa</option>
    <option value="Toba Tek Singh">Toba Tek Singh</option>
    <option value="Vihari">Vihari</option>
    <option value="Warburton">Warburton</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="Yazman">Yazman</option>
    <option value="Zafarwal">Zafarwal</option>
    <option value="Zahir Pir">Zahir Pir</option>
        <option value="Adilpur">Adilpur</option>
    <option value="Badin">Badin</option>
    <option value="Bagarji">Bagarji</option>
    <option value="Bandhi">Bandhi</option>
    <option value="Berani">Berani</option>
    <option value="Bhan">Bhan</option>
    <option value="Bhiria">Bhiria</option>
    <option value="Bhit Shah">Bhit Shah</option>
    <option value="Bozdar">Bozdar</option>
    <option value="Bulri">Bulri</option>
    <option value="Chak">Chak</option>
    <option value="Chambar">Chambar</option>
    <option value="Chhor">Chhor</option>
    <option value="Chuhar Jamali">Chuhar Jamali</option>
    <option value="Dadu">Dadu</option>
    <option value="Daro Mehar">Daro Mehar</option>
    <option value="Darya Khan Marri">Darya Khan Marri</option>
    <option value="Daulatpur">Daulatpur</option>
    <option value="Daur">Daur</option>
    <option value="Dhoro Naro">Dhoro Naro</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Gambat">Gambat</option>
    <option value="Garhi Yasin">Garhi Yasin</option>
    <option value="Gharo">Gharo</option>
    <option value="Ghauspur">Ghauspur</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Goth Garelo">Goth Garelo</option>
    <option value="Hala">Hala</option>
    <option value="Hingorja">Hingorja</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jam Sahib">Jam Sahib</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jati">Jati</option>
    <option value="Jhol">Jhol</option>
    <option value="Johi">Johi</option>
    <option value="Kadhan">Kadhan</option>
    <option value="Kambar">Kambar</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiari">Kandiari</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Karaundi">Karaundi</option>
    <option value="Kario">Kario</option>
    <option value="Kashmor">Kashmor</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khadro">Khadro</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Khairpur Nathan Shah">Khairpur Nathan Shah</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kot Diji">Kot Diji</option>
    <option value="Kotri">Kotri</option>
    <option value="Kunri">Kunri</option>
    <option value="Lakhi">Lakhi</option>
    <option value="Larkana">Larkana</option>
    <option value="Madeji">Madeji</option>
    <option value="Malir Cantonment">Malir Cantonment</option>
    <option value="Matiari">Matiari</option>
    <option value="Matli">Matli</option>
    <option value="Mehar">Mehar</option>
    <option value="Miro Khan">Miro Khan</option>
    <option value="Mirpur Batoro">Mirpur Batoro</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mirpur Mathelo">Mirpur Mathelo</option>
    <option value="Mirpur Sakro">Mirpur Sakro</option>
    <option value="Mirwah Gorchani">Mirwah Gorchani</option>
    <option value="Mithi">Mithi</option>
    <option value="Moro">Moro</option>
    <option value="Nabisar">Nabisar</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Naudero">Naudero</option>
    <option value="Naukot">Naukot</option>
    <option value="Naushahro Firoz">Naushahro Firoz</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="New Badah">New Badah</option>
    <option value="Pad Idan">Pad Idan</option>
    <option value="Pano Aqil">Pano Aqil</option>
    <option value="Phulji">Phulji</option>
    <option value="Pir Jo Goth">Pir Jo Goth</option>
    <option value="Pithoro">Pithoro</option>
    <option value="Radhan">Radhan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Rustam">Rustam</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Samaro">Samaro</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Sann">Sann</option>
    <option value="Sehwan">Sehwan</option>
    <option value="Setharja Old">Setharja Old</option>
    <option value="Shahdad Kot">Shahdad Kot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpur">Shikarpur</option>
    <option value="Sinjhoro">Sinjhoro</option>
    <option value="Sita Road">Sita Road</option>
    <option value="Sobhodero">Sobhodero</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Talhar">Talhar</option>
    <option value="Tando Adam">Tando Adam</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Bago">Tando Bago</option>
    <option value="Tando Ghulam Ali">Tando Ghulam Ali</option>
    <option value="Tando Jam">Tando Jam</option>
    <option value="Tando Mittha Khan">Tando Mittha Khan</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tharu Shah">Tharu Shah</option>
    <option value="Thatta">Thatta</option>
    <option value="Thul">Thul</option>
    <option value="Ubauro">Ubauro</option>
    <option value="Umarkot">Umarkot</option>
    <option value="Warah">Warah</option>
        <option value="Abbottabad">Abbottabad</option>
    <option value="Akora">Akora</option>
    <option value="Alpurai">Alpurai</option>
    <option value="Aman Garh">Aman Garh</option>
    <option value="Amirabad">Amirabad</option>
    <option value="Ashanagro Koto">Ashanagro Koto</option>
    <option value="Baffa">Baffa</option>
    <option value="Bannu">Bannu</option>
    <option value="Bat Khela">Bat Khela</option>
    <option value="Battagram">Battagram</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Cherat Cantonement">Cherat Cantonement</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dasu">Dasu</option>
    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Havelian">Havelian</option>
    <option value="Kakad Wari Dir Upper">Kakad Wari Dir Upper</option>
    <option value="Karak">Karak</option>
    <option value="Khalabat">Khalabat</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lachi">Lachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Malakand">Malakand</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mingora">Mingora</option>
    <option value="Noorabad">Noorabad</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Nowshera Cantonment">Nowshera Cantonment</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Risalpur Cantonment">Risalpur Cantonment</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Sarai Naurang">Sarai Naurang</option>
    <option value="Shabqadar">Shabqadar</option>
    <option value="Shingli Bala">Shingli Bala</option>
    <option value="Shorko">Shorko</option>
    <option value="Swabi">Swabi</option>
    <option value="Tal">Tal</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Timargara">Timargara</option>
    <option value="Topi">Topi</option>
    <option value="Upper Dir">Upper Dir</option>
    <option value="Utmanzai">Utmanzai</option>
    <option value="Zaida">Zaida</option>
    <option value="Islamabad">Islamabad</option>
                  </select>
                  </div>
                  
                  <div class="col-lg-12">
                  <!--<label><input type="checkbox" value="1" name="receiver_city_check" >Receiver City</label>-->
                  
                  <label class="containers">Receiver City
  <input type="checkbox" value="1" name="receiver_city_check">
  <span class="checkmark"></span>
</label>
                    <select name="receiver_city" class="form-control boxshadow2">
                      <option value="">Select City</option>
    <option value="Ahmadpur East">Ahmadpur East</option>
    <option value="Ahmadpur Sial">Ahmadpur Sial</option>
    <option value="Alipur">Alipur</option>
    <option value="Arifwala">Arifwala</option>
    <option value="Attock City">Attock City</option>
    <option value="Baddomalhi">Baddomalhi</option>
    <option value="Bahawalnagar">Bahawalnagar</option>
    <option value="Bahawalpur">Bahawalpur</option>
    <option value="Bakhri Ahmad Khan">Bakhri Ahmad Khan</option>
    <option value="Basirpur">Basirpur</option>
    <option value="Basti Dosa">Basti Dosa</option>
    <option value="Begowala">Begowala</option>
    <option value="Bhai Pheru">Bhai Pheru</option>
    <option value="Bhakkar">Bhakkar</option>
    <option value="Bhalwal">Bhalwal</option>
    <option value="Bhawana">Bhawana</option>
    <option value="Bhera">Bhera</option>
    <option value="Bhopalwala">Bhopalwala</option>
    <option value="Burewala">Burewala</option>
    <option value="Chak Azam Saffo">Chak Azam Saffo</option>
    <option value="Chak Two Hundred Forty-Nine TDA">Chak Two Hundred Forty-Nine TDA</option>
    <option value="Chakwal">Chakwal</option>
    <option value="Chawinda">Chawinda</option>
    <option value="Chichawatni">Chichawatni</option>
    <option value="Chiniot">Chiniot</option>
    <option value="Chishtian Mandi">Chishtian Mandi</option>
    <option value="Choa Saidan Shah">Choa Saidan Shah</option>
    <option value="Chuhar Kana">Chuhar Kana</option>
    <option value="Chunian">Chunian</option>
    <option value="Daira Din Panah">Daira Din Panah</option>
    <option value="Dajal">Dajal</option>
    <option value="Dandot RS">Dandot RS</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Daska">Daska</option>
    <option value="Daud Khel">Daud Khel</option>
    <option value="Daultala">Daultala</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhanot">Dhanot</option>
    <option value="Dhaunkal">Dhaunkal</option>
    <option value="Dijkot">Dijkot</option>
    <option value="Dinan Bashnoian Wala">Dinan Bashnoian Wala</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Dullewala">Dullewala</option>
    <option value="Dunga Bunga">Dunga Bunga</option>
    <option value="Dunyapur">Dunyapur</option>
    <option value="Eminabad">Eminabad</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Faqirwali">Faqirwali</option>
    <option value="Faruka">Faruka</option>
    <option value="Fazilpur">Fazilpur</option>
    <option value="Fort Abbas">Fort Abbas</option>
    <option value="Garh Maharaja">Garh Maharaja</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Hadali">Hadali</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Harnoli">Harnoli</option>
    <option value="Haru Zbad">Haru Zbad</option>
    <option value="Hasan Abdal">Hasan Abdal</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli">Haveli</option>
    <option value="Hazro City">Hazro City</option>
    <option value="Hujra">Hujra</option>
    <option value="Jahanian Shah">Jahanian Shah</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jalalpur Pirwala">Jalalpur Pirwala</option>
    <option value="Jampur">Jampur</option>
    <option value="Jand">Jand</option>
    <option value="Jandiala Sher Khan">Jandiala Sher Khan</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jatoi Shimali">Jatoi Shimali</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Jhang City">Jhang City</option>
    <option value="Jhang Sadr">Jhang Sadr</option>
    <option value="Jhawarian">Jhawarian</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Jhumra">Jhumra</option>
    <option value="Kabirwala">Kabirwala</option>
    <option value="Kahna">Kahna</option>
    <option value="Kahuta">Kahuta</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Kalaswala">Kalaswala</option>
    <option value="Kaleke Mandi">Kaleke Mandi</option>
    <option value="Kallar Kahar">Kallar Kahar</option>
    <option value="Kalur Kot">Kalur Kot</option>
    <option value="Kamalia">Kamalia</option>
    <option value="Kamar Mushani">Kamar Mushani</option>
    <option value="Kamir">Kamir</option>
    <option value="Kamoke">Kamoke</option>
    <option value="Kamra">Kamra</option>
    <option value="Kanganpur">Kanganpur</option>
    <option value="Karor">Karor</option>
    <option value="Kasur">Kasur</option>
    <option value="Keshupur">Keshupur</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khangah Dogran">Khangah Dogran</option>
    <option value="Khangarh">Khangarh</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khewra">Khewra</option>
    <option value="Khurrianwala">Khurrianwala</option>
    <option value="Khushab">Khushab</option>
    <option value="Kohror Pakka">Kohror Pakka</option>
    <option value="Kot Addu">Kot Addu</option>
    <option value="Kot Ghulam Muhammad">Kot Ghulam Muhammad</option>
    <option value="Kot Mumin">Kot Mumin</option>
    <option value="Kot Radha Kishan">Kot Radha Kishan</option>
    <option value="Kot Samaba">Kot Samaba</option>
    <option value="Kot Sultan">Kot Sultan</option>
    <option value="Kotli Loharan">Kotli Loharan</option>
    <option value="Kundian">Kundian</option>
    <option value="Kunjah">Kunjah</option>
    <option value="Ladhewala Waraich">Ladhewala Waraich</option>
    <option value="Lahore">Lahore</option>
    <option value="Lala Musa">Lala Musa</option>
    <option value="Lalian">Lalian</option>
    <option value="Layyah">Layyah</option>
    <option value="Liliani">Liliani</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Malakwal City">Malakwal City</option>
    <option value="Mamu Kanjan">Mamu Kanjan</option>
    <option value="Mananwala">Mananwala</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="Mangla">Mangla</option>
    <option value="Mankera">Mankera</option>
    <option value="Mehmand Chak">Mehmand Chak</option>
    <option value="Mian Channun">Mian Channun</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Minchinabad">Minchinabad</option>
    <option value="Mitha Tiwana">Mitha Tiwana</option>
    <option value="Moza Shahwala">Moza Shahwala</option>
    <option value="Multan">Multan</option>
    <option value="Muridke">Muridke</option>
    <option value="Murree">Murree</option>
    <option value="Mustafabad">Mustafabad</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Nankana Sahib">Nankana Sahib</option>
    <option value="Narang">Narang</option>
    <option value="Narowal">Narowal</option>
    <option value="Naushahra Virkan">Naushahra Virkan</option>
    <option value="Nazir Town">Nazir Town</option>
    <option value="Okara">Okara</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pasrur">Pasrur</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Phalia">Phalia</option>
    <option value="Pind Dadan Khan">Pind Dadan Khan</option>
    <option value="Pindi Bhattian">Pindi Bhattian</option>
    <option value="Pindi Gheb">Pindi Gheb</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qadirpur Ran">Qadirpur Ran</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Raja Jang">Raja Jang</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rasulnagar">Rasulnagar</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Rojhan">Rojhan</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sambrial">Sambrial</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sanjwal">Sanjwal</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sarai Sidhu">Sarai Sidhu</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shahkot">Shahkot</option>
    <option value="Shahpur">Shahpur</option>
    <option value="Shahr Sultan">Shahr Sultan</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sharqpur">Sharqpur</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Shujaabad">Shujaabad</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sillanwali">Sillanwali</option>
    <option value="Sodhra">Sodhra</option>
    <option value="Sukheke Mandi">Sukheke Mandi</option>
    <option value="Surkhpur">Surkhpur</option>
    <option value="Talagang">Talagang</option>
    <option value="Talamba">Talamba</option>
    <option value="Tandlianwala">Tandlianwala</option>
    <option value="Taunsa">Taunsa</option>
    <option value="Toba Tek Singh">Toba Tek Singh</option>
    <option value="Vihari">Vihari</option>
    <option value="Warburton">Warburton</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="Yazman">Yazman</option>
    <option value="Zafarwal">Zafarwal</option>
    <option value="Zahir Pir">Zahir Pir</option>
        <option value="Adilpur">Adilpur</option>
    <option value="Badin">Badin</option>
    <option value="Bagarji">Bagarji</option>
    <option value="Bandhi">Bandhi</option>
    <option value="Berani">Berani</option>
    <option value="Bhan">Bhan</option>
    <option value="Bhiria">Bhiria</option>
    <option value="Bhit Shah">Bhit Shah</option>
    <option value="Bozdar">Bozdar</option>
    <option value="Bulri">Bulri</option>
    <option value="Chak">Chak</option>
    <option value="Chambar">Chambar</option>
    <option value="Chhor">Chhor</option>
    <option value="Chuhar Jamali">Chuhar Jamali</option>
    <option value="Dadu">Dadu</option>
    <option value="Daro Mehar">Daro Mehar</option>
    <option value="Darya Khan Marri">Darya Khan Marri</option>
    <option value="Daulatpur">Daulatpur</option>
    <option value="Daur">Daur</option>
    <option value="Dhoro Naro">Dhoro Naro</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Gambat">Gambat</option>
    <option value="Garhi Yasin">Garhi Yasin</option>
    <option value="Gharo">Gharo</option>
    <option value="Ghauspur">Ghauspur</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Goth Garelo">Goth Garelo</option>
    <option value="Hala">Hala</option>
    <option value="Hingorja">Hingorja</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jam Sahib">Jam Sahib</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jati">Jati</option>
    <option value="Jhol">Jhol</option>
    <option value="Johi">Johi</option>
    <option value="Kadhan">Kadhan</option>
    <option value="Kambar">Kambar</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiari">Kandiari</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Karaundi">Karaundi</option>
    <option value="Kario">Kario</option>
    <option value="Kashmor">Kashmor</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khadro">Khadro</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Khairpur Nathan Shah">Khairpur Nathan Shah</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kot Diji">Kot Diji</option>
    <option value="Kotri">Kotri</option>
    <option value="Kunri">Kunri</option>
    <option value="Lakhi">Lakhi</option>
    <option value="Larkana">Larkana</option>
    <option value="Madeji">Madeji</option>
    <option value="Malir Cantonment">Malir Cantonment</option>
    <option value="Matiari">Matiari</option>
    <option value="Matli">Matli</option>
    <option value="Mehar">Mehar</option>
    <option value="Miro Khan">Miro Khan</option>
    <option value="Mirpur Batoro">Mirpur Batoro</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mirpur Mathelo">Mirpur Mathelo</option>
    <option value="Mirpur Sakro">Mirpur Sakro</option>
    <option value="Mirwah Gorchani">Mirwah Gorchani</option>
    <option value="Mithi">Mithi</option>
    <option value="Moro">Moro</option>
    <option value="Nabisar">Nabisar</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Naudero">Naudero</option>
    <option value="Naukot">Naukot</option>
    <option value="Naushahro Firoz">Naushahro Firoz</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="New Badah">New Badah</option>
    <option value="Pad Idan">Pad Idan</option>
    <option value="Pano Aqil">Pano Aqil</option>
    <option value="Phulji">Phulji</option>
    <option value="Pir Jo Goth">Pir Jo Goth</option>
    <option value="Pithoro">Pithoro</option>
    <option value="Radhan">Radhan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Rustam">Rustam</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Samaro">Samaro</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Sann">Sann</option>
    <option value="Sehwan">Sehwan</option>
    <option value="Setharja Old">Setharja Old</option>
    <option value="Shahdad Kot">Shahdad Kot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpur">Shikarpur</option>
    <option value="Sinjhoro">Sinjhoro</option>
    <option value="Sita Road">Sita Road</option>
    <option value="Sobhodero">Sobhodero</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Talhar">Talhar</option>
    <option value="Tando Adam">Tando Adam</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Bago">Tando Bago</option>
    <option value="Tando Ghulam Ali">Tando Ghulam Ali</option>
    <option value="Tando Jam">Tando Jam</option>
    <option value="Tando Mittha Khan">Tando Mittha Khan</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tharu Shah">Tharu Shah</option>
    <option value="Thatta">Thatta</option>
    <option value="Thul">Thul</option>
    <option value="Ubauro">Ubauro</option>
    <option value="Umarkot">Umarkot</option>
    <option value="Warah">Warah</option>
        <option value="Abbottabad">Abbottabad</option>
    <option value="Akora">Akora</option>
    <option value="Alpurai">Alpurai</option>
    <option value="Aman Garh">Aman Garh</option>
    <option value="Amirabad">Amirabad</option>
    <option value="Ashanagro Koto">Ashanagro Koto</option>
    <option value="Baffa">Baffa</option>
    <option value="Bannu">Bannu</option>
    <option value="Bat Khela">Bat Khela</option>
    <option value="Battagram">Battagram</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Cherat Cantonement">Cherat Cantonement</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dasu">Dasu</option>
    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Havelian">Havelian</option>
    <option value="Kakad Wari Dir Upper">Kakad Wari Dir Upper</option>
    <option value="Karak">Karak</option>
    <option value="Khalabat">Khalabat</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lachi">Lachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Malakand">Malakand</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mingora">Mingora</option>
    <option value="Noorabad">Noorabad</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Nowshera Cantonment">Nowshera Cantonment</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Risalpur Cantonment">Risalpur Cantonment</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Sarai Naurang">Sarai Naurang</option>
    <option value="Shabqadar">Shabqadar</option>
    <option value="Shingli Bala">Shingli Bala</option>
    <option value="Shorko">Shorko</option>
    <option value="Swabi">Swabi</option>
    <option value="Tal">Tal</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Timargara">Timargara</option>
    <option value="Topi">Topi</option>
    <option value="Upper Dir">Upper Dir</option>
    <option value="Utmanzai">Utmanzai</option>
    <option value="Zaida">Zaida</option>
    <option value="Islamabad">Islamabad</option>
                  </select>
                  </div>
                  
                  <div class="col-lg-12">
                    
                    <label class="containers">Bilty Type
  <input type="checkbox" value="1" name="bilty_type_check" checked="checked">
  <span class="checkmark"></span>
</label>
                    
                     <!--<label><input type="checkbox" value="1" name="bilty_type_check" >bilty_type</label>-->
                    <select class="form-control boxshadow2" name="bilty_type" required>
                            <option value="out">out</option>
                            <option value="in">in</option>
                          </select>
                  </div>
                  
                  
                  
                  
                   
                  
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-20">
                    <div class="form-group">
              <div class="col-sm-10">
                  <label></label>
                <button type="submit" class="btn btn-default btnn" style="margin-top:10px;"><i class="fa fa-search"></i> Quick Search</button>
              </div>
            </div>
                </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="info">
        <p><strong>Info!</strong> Please print report in landscape format and select the legal page.</p>
      </div>
      <div class="table-responsive" id="order_form">
        <table id="example1" class="table table-striped table-bordered display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Bilty No</th>
              <th>Bilty Type</th>
              <th>Bilty Charges</th>
              <th>Sender Name</th>
              <th>Reciver Name</th>
              <th>Sender City</th>
              <th>Receiver City</th>
              <th>Bundles</th>
              <th>Goods Company</th>
              <th>Date Receiving</th>
              <th>Date Booking</th>
              <th>Charge To</th>
              <th>To Record</th>
              <th>Quantity</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
          
          @if(count($records)>0)
          @foreach($records as $r)
          <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->bilty_number}}</td>
            <td>{{$r->bilty_type}}</td>
            <td>{{$r->bilty_charges}}</td>
            <td>{{$r->sender_company}}</td>
            <td>{{$r->receiver_company}}</td>
            <td>{{$r->sender_city}}</td>
            <td>{{$r->receiver_city}}</td>
            <td>{{$r->bundles}}</td>
            <td>{{$r->goods_company}}</td>
            @if($r->date_of_receiving == "")
            <td>{{$r->date_of_receiving}}</td>
            @else
            <td>{{ Carbon\Carbon::parse($r->date_of_receiving)->format('d-m-y')}}</td>
            @endif
            @if($r->date_of_booking == "")
            <td>{{$r->date_of_booking}}</td>
            @else
            <td>{{ Carbon\Carbon::parse($r->date_of_booking)->format('d-m-y')}}</td>
            @endif
            <td>{{$r->charge_to}}</td>
            <td>{{$r->to_record}}</td>
            <td>{{$r->quantity}}</td>
            <td>{{$r->description}}</td>
          </tr>
          @endforeach
          @endif
            </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script> 
@endsection